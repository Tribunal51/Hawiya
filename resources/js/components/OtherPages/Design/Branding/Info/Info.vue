<template>
    <div class="Cover">
        <textarea v-model="comment"></textarea>
        <ImageUpload 
        v-on:dataurls="updateFileUrls"
        v-on:files="updateFiles" 
        type="single" />
        <v-btn color="success" @click="nextButtonClicked" :disabled="isButtonDisabled()">Next</v-btn>
   </div>
</template>

<script>
import ImageUpload from '../../../../UI/ImageUpload';
export default {
    components: {
        ImageUpload
    },
    data() {
        return {
            comment: '',
            dataurls: '',
            files: ''
        }
    },
    mounted() {

    },
    methods: {
        updateFileUrls(urls) {
            this.dataurls = urls[0];
            console.log('Urls', this.dataurls);
        },
        updateFiles(files) {
            this.files = files[0];
            console.log('Files', this.files);
        },
        isButtonDisabled() {
            return this.files.length < 1;
        },
        nextButtonClicked() {
            console.log('Current Image: ',this.dataurls);


            let data = {
                user_id: 1,
                package: 'Test',
                logo_photo: this.dataurls,
                comment: this.comment
            };
            
            console.log('Data', data);
            axios.post('http://hawiya.net/api/orders/branding', data)
            .then(res => console.log(res.data))
            .catch(error => console.log(error.response));
        }
    }

}
</script>

<style scoped>

</style>
