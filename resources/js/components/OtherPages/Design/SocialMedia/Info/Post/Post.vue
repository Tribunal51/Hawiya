<template>
    <div class="Cover">
        <ImageUpload v-on:dataurls="updateFileUrl" />
        <textarea type="text" v-model="comment" required></textarea>
        <hr>
    </div>
</template>

<script>
import ImageUpload from '../../../../../UI/ImageUpload';
export default {
    data() {
        return {
            comment: '',
            fileUrl: ''
        }
    },
    components: {
        ImageUpload
    },
    methods: {
        updateFileUrl(dataurls) {
            this.fileUrl = dataurls[0];
            this.$emit('file', this.fileUrl);
        }
    },
    watch: {
        comment: function(newValue, oldValue) {
            this.$emit('comment', this.comment);
        }
    }

}
</script>

<style scoped>

</style>
