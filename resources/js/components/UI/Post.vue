<template>
    <div class="Cover">
            
        <div v-if="logo" class="row">
            <div class="col-md">
                <ImageUpload 
                    type="single" 
                    v-on:dataurls="updatePhoto($event, 'logo')"
                    :hideImage="true"
                    label="Upload your Logo"
                    
                />
            </div>
            <div class="col-md">
                <ImageUpload 
                    type="single" 
                    v-on:dataurls="updatePhoto($event, 'post')" 
                    :hideImage="true" 
                    label="Upload Image"
                    
                />
            </div>
        </div>
        <div v-else>
            <div class="imageSection">
                <ImageUpload 
                    v-on:dataurls="updatePhoto($event, 'post')" 
                    :hideImage="true"
                    
                />
            </div>
        </div>
        <div class="textSection">
            <textarea 
                class="input-textarea-gray" 
                v-model="comment" 
                :placeholder="placeholderText"
                required></textarea>
        </div>
       
    </div>
</template>

<script>
import ImageUpload from './ImageUpload';

export default {
    components: {
        ImageUpload
    },
    data() {
        return {
            logo_photo: '',
            post_photo: '',
            comment: ''
        }
    },
    props: [
        "post",
        "logo",
        "placeholderText"
    ],
    methods: {
        updatePhoto(urls, type) {
            let payload = {};
            switch(type) {
                case 'logo': 
                    if(urls === null) {
                        this.logo_photo = '';
                    } 
                    else {
                        this.logo_photo = urls[0];
                    }
                    payload = {
                        type: type,
                        file: this.logo_photo
                    }
                    this.$emit('file', payload);
                    break;

                case 'post':
                    if(urls === null) {
                        this.post_photo = '';
                    }
                    else {
                        this.post_photo = urls[0];
                    }
                    payload = {
                        type: type,
                        file: this.post_photo
                    };
                    this.$emit('file', payload);
                    break;

            }
        }
    },
    watch: {
        comment: function(newValue, oldValue) {
            if(newValue !== '') {
                this.$emit('comment', newValue);
            }
        }
    }

}
</script>

<style scoped>
    .input-textarea-gray {
        width: 100%;
        height: 200px;
    }
</style>
