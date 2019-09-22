<template>
    <div class="Cover">
        <form @submit="formSubmit">
            <h5>Update Password</h5>
            <div class="form-group row">
                <label class="col-md-4" for="currentPassword">Current Password</label> 
                <input class="form-control col-md-6" id="currentPassword" type="password" v-model="form.currentPassword" required>
            </div>

            <div class="form-group row">
                <label class="col-md-4" for="newPassword">New Password</label> 
                <input class="form-control col-md-6" id="newPassword" type="password" v-model="form.newPassword" required>
            </div>

            <div class="form-group row">
                <label class="col-md-4" for="confirmPassword">Confirm Password</label> 
                <input class="form-control col-md-6" id="confirmPassword" type="password" v-model="form.confirmPassword" required>
            </div>

            <button :disabled="loading" class="btn btn-warning" type="submit"><RingLoader v-if="loading"></RingLoader>Update</button>
            <div :class="'mt-3 ' + setAlertClass()" v-if="alert.message !== ''">{{ alert.message }}</div>
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
                currentPassword: '',
                newPassword: '',
                confirmPassword: ''
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
            if(this.form.newPassword !== this.form.confirmPassword) {
                this.setAlert('Passwords do not match', true);
            }
            else {
                this.loading = true;
                let data = {
                    user_id: this.authuser.id,
                    password: this.form.currentPassword,
                    new_password: this.form.newPassword
                }
                axios.put('/api/user', data)
                    .then(res => {
                        console.log(res.data);
                        if(res.data > 0) {
                            this.setAlert('Password changed successfully.', false);
                        }
                        else {
                            this.setAlert('Incorrect password. Please try again.', true);
                        }
                    })
                    .catch(error => {
                        console.log(error.response);
                        this.setAlert('Request could not be sent. Please refresh the page and try again', true);
                    })
            }
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
            this.loading = false;
            this.clearForm();

        },
        setAlertClass() {
            return this.alert.isError ? 'alert alert-danger' : 'alert alert-success';
        }
    }
    
}
</script>

<style scoped>

</style>