<template>
    <div class="Cover">
        <form @submit="formSubmitted">
            <BlackBox>
                <h2>Stationery</h2>
            </BlackBox>
            <textarea v-model="comment" required></textarea>
            <ImageUpload v-on:dataurls="updateFile" required />
            <v-btn color="success" type="submit">ORDER</v-btn>
        </form>

    </div>
</template>

<script>
import ImageUpload from '../../../UI/ImageUpload';
import BlackBox from '../../../UI/BlackBox';
export default {
    components: {
        BlackBox,
        ImageUpload
    },
    data() {
        return {
            comment: '',
            logo_photo: ''
        }
    },
    methods: {
        updateFile(file) {
            this.logo_photo = file[0];
        },
        formSubmitted() {
            event.preventDefault();
            let data = {
                user_id: 1,
                logo_photo: this.logo_photo,
                comment: this.comment
            };
            console.log(data);
            axios.post('http://hawiya.net/api/orders/stationery', data)
            .then(response => console.log(response.data))
            .catch(error => console.log(error.response));
        }
    }

}
</script>

<style scoped>

    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }

</style>
