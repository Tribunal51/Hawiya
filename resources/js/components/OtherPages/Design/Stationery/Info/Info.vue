<template>
    <div class="Cover">
        <p> {{ this.package }} / Package</p>

        <div class="row">
            <div class="col-md-3">
                <BlackBox>
                    <h5> {{ this.package }}</h5>
                </BlackBox>
            </div>
            <div class="col-md-9 borderBottomYellow"></div>
        </div>
        <form @submit="formSubmitted">
            <Post 
                v-on:file="updateFile"
                v-on:comment="updateComment"
            />

            <v-btn :disabled="buttonDisabled()" type="submit">Next</v-btn>
        </form>
    </div>
</template>

<script>
import ImageUpload from '../../../../UI/ImageUpload';
import Post from '../../../../UI/Post';
import BlackBox from '../../../../UI/BlackBox';

export default {
    components: {
        ImageUpload,
        Post,
        BlackBox
    },
    data() {
        return {
            comment: '',
            logo_photo: ''
        }
    },
    computed: {
        package() {
            return this.$store.state.stationery.package;
        }
    },
    methods: {
        updateFile(payload) {
            this.logo_photo = payload.file;
        },
        updateComment(text) {
            this.comment = text;
        },
        buttonDisabled() {
            return (this.comment === '' || this.logo_photo === '');
        },
        formSubmitted() {
            event.preventDefault();
            let data = {
                user_id: 1,
                logo_photo: this.logo_photo,
                comment: this.comment
            };
            console.log(data);
            // axios.post('http://hawiya.net/api/orders/stationery', data)
            // .then(response => console.log(response.data))
            // .catch(error => console.log(error.response));
        }
    }

}
</script>

<style scoped>

    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }

</style>