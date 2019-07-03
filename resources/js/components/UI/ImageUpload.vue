<template>
    <div id="cover">
        <input type="file" @change="onFileSelected" :multiple="type === 'multiple'" />        
        <div v-if="loading">
            Loading...
        </div>
        <div v-else>
            <div v-if="files.length > 0">
                <img 
                v-for="image in imageDisplays" 
                :src="image" 
                :key="image" 
                class="display" />
            </div>
        </div>
         <!-- <input type="submit" value="Upload" /> -->
         <!-- <button @click="buttonClicked" role="button">Click</button> -->
    </div>
</template>

<script>
export default {    
    data() {
        return {
            selectedFile: null,
            files: [],
            file:[],
            imageDisplays: [],
            dataURLs: [],
            loading: false,
            completed: false
        }
    },
    props: [
        "type"
    ],
    watch: {
        completed: function(newValue, oldValue) {
            if(newValue) {
                this.$emit('files', this.files);
                this.$emit('dataurls', this.dataURLs);
            }
        }
    },
    mounted() {
        this.completed = false;
    },
    methods: {
        onFileSelected(event) {
            //this.selectedFile = event.target.files[0]; 
            console.log(event);
            let self = this;
            this.files = Array.from(event.target.files);
            console.log(this.files);
            
            Array.from(this.files).forEach((file, index) => {
                var reader = new FileReader();
                reader.onloadstart = function(event) {
                    self.completed = false;
                    self.loading = true;
                }
                reader.onload = function(event) {
                    if(this.type !== 'multiple') {
                        self.imageDisplays[0] = event.target.result;
                        self.dataURLs[0] = reader.result;
                    }
                    else {
                        self.imageDisplays.push(event.target.result);
                        self.dataURLs.push(reader.result);
                    }
                    //console.log(reader.result);
                }
                
                reader.onloadend = function(event) {
                    // self.$emit('files', self.files);
                    // self.$emit('dataurls', self.dataURLs);
                    if(index === Array.from(self.files).length - 1) {
                        self.completed = true;
                    }
                    self.loading = false;
                    
                }
                reader.readAsDataURL(file);
            });
            console.log('DataURLS',this.dataURLs);
            
            
        },
        buttonClicked() {
            event.preventDefault();
            console.log(this.dataURLs);
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
    }

}
</script>

<style scoped>
    .display {
        width: 100px;
        height: 100px;
    }
</style>
