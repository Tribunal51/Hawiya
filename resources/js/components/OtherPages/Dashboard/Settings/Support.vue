<template>
    <div class="Cover">
        <h3>Support</h3>
        <p>We will provide support for any issues you might have. Please enter information in the fields below to register an issue and we will get back to you soon.</p> 
        <form @submit="formSubmit">
            <div class="form-group row">
                <label for="title" class="col-md-4">Title</label>
                <input type="text" id="title" class="form-control col-md-6" v-model="form.title" required />
            </div>

            <div class="form-group row">
                <label for="issue" class="col-md-4">Issue</label>
                <textarea id="issue" class="form-control col-md-6" v-model="form.issue" required />
            </div>

            <button class="btn btn-warning" :disabled="loading"><RingLoader v-if="loading"></RingLoader>Register</button>
            <div :class="'mt-4 ' + assignAlertClass()" v-if="alert.message !== ''">{{ alert.message }}</div>
        </form>
    </div>
</template>

<script>
import RingLoader from 'vue-spinner/src/RingLoader';

export default {
    props: [
        "authuser"
    ],
    components: {
        RingLoader
    },
    data() {
        return {
            form: {
                title: '',
                issue: ''
            },
            loading: false,
            alert: {
                isError: false,
                message: ''
            }
        }
    },
    methods: {
        formSubmit(event) {
            event.preventDefault();
            let data = {
                user_id: this.authuser.id, 
                title: this.form.title,
                issue: this.form.issue
            }
            this.loading = true;
            axios.post('/api/issue', data)
                .then(res => {
                    
                    if(res.data > 0) {
                        this.setAlert('Issue registered successfully.', false);
                    }
                    else {
                        this.setAlert('Some problem occurred. Please try again.', true);
                    }
                })
                .catch(error => {
                    
                    console.log(error.response);
                    this.setAlert('Request could not be sent. Please refresh and try again.', true);
                });

        },
        clearForm() {
            for(var prop in this.form) {
                if(Object.prototype.hasOwnProperty.call(this.form, prop)) {
                    this.form[prop] = '';
                }
            }
        },
        setAlert(message, isError) {
            this.alert.message = message;
            this.alert.isError = isError;
            console.log(message, isError);
            this.loading = false;
            this.clearForm();
        },
        assignAlertClass() {
            return this.alert.isError ? 'alert alert-danger' : 'alert alert-success';
            //return 'alert ' + this.alert.isError ? 'alert-danger' : 'alert-success';
        }
    }
}
</script>

<style scoped>

</style>