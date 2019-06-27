<template>
    <div class="Cover">
        Ordering
    </div>
</template>

<script>
export default {
    props: [
        "authuser",
        "verified"
    ],
    data() {
        return {
            logodesign: false,
            branding: false,
            socialmedia: false,
            stationary: false,
            website: false
        }        
    },
    mounted() {
        console.log(this.$store.state.logodesign);
        console.log(this.authuser, this.verified);  
        this.checkUser();
        this.makeFiles();
        this.sendData();

        

    },
    methods: {
        checkUser() {
            if(this.authuser > 0) {
                this.$store.dispatch('setAuthUser', this.authuser);
            } else {
                window.location.href = '/';
            }
            if(this.verified > 0) {
                this.$store.dispatch('setVerifyUser', 1);
            } else {
               // window.location.href = '/home';
            }
        },
        dataURLtoBlob(dataurl) {
            console.log('Inside dataURLtoBlob');
           var arr = dataurl.split(',');
           var mime = arr[0].match(/:(.*?);/)[1];
           var bstr = atob(arr[1]);
           var n = bstr.length;
           var u8arr = new Uint8Array(n);
           
           while(n--) {
               u8arr[n] = bstr.charCodeAt(n);
           }
           return new Blob([u8arr], {type:mime});
        },
        sendData() {
            var bodyFormData = new FormData();
            let self = this;
            const dataToBeSent = {
                user_id: this.$store.state.user_id,
                package: this.$store.state.logodesign.package,
                logotype: [...this.$store.state.logodesign.logotype],
                style: {...this.$store.state.logodesign.style},
                color: [...this.$store.state.logodesign.color],
                brand_name: this.$store.state.logodesign.form.brand,
                tagline: this.$store.state.logodesign.form.tagline,
                business_field: this.$store.state.logodesign.form.business_field,
                description: this.$store.state.logodesign.form.description,
                files: {...this.$store.state.logodesign.files}
            }
            // console.log('dataToBeSent',dataToBeSent);

            
            
            Object.keys(dataToBeSent).forEach(key => {
                if(key === 'files') {                
                    console.log(dataToBeSent[key]);
                    let files = {...dataToBeSent[key]};
                    Object.keys(files).forEach(function(key, index) {
                        // console.log(files[key]);
                        let file = self.dataURLtoBlob(files[key]);
                        console.log('Constructed File', file);
                        bodyFormData.append('files[]', file);
                    });
                    
                }
                else {
                    console.log(key);
                    bodyFormData.append(key, dataToBeSent[key]);
                }
            });
            console.log('bodyFormData', bodyFormData);
            
            axios.post('http://hawiya.net/api/orders/logo-design', bodyFormData, {
                headers: {
                    'Content-Type':'multipart/form-data'
                }
            })
            .then(res => {
                console.log(res.data);
                let order_id = res.data;
                if(order_id < 0) {
                    alert('Could not register the order.');
                }
            })
            .catch(error => console.log(error.response));
            
        }
    }
}
</script>

<style scoped>

</style>
