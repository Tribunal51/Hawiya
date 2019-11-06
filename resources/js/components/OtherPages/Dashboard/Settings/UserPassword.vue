<i18n>
    {
        "en": {
            "Update Password": "Update Password",
            "Current Password": "Current Password",
            "New Password": "New Password",
            "Confirm Password": "Confirm Password",
            "Update": "Update",
            "noMatch": "Passwords do not match.",
            "success": "Password changed successfully.",
            "errorThen": "Incorrect Password. Please try again.",
            "errorCatch": "Request could not be sent. Please refresh and try again."
        },
        "ar": {
            "Update Password": "تطوير كلمة السر",
            "Current Password": "كلمة المرور الحالية",
            "New Password": "كلمة سر جديدة",
            "Confirm Password": "تأكيد كلمة المرور",
            "Update": "تحديث",
            "noMatch": "كلمة المرور غير مطابقة.",
            "success": "تم تغيير الرقم السري بنجاح.",
            "errorThen": "كلمة سر خاطئة. حاول مرة اخرى.",
            "errorCatch": "لا يمكن إرسال الطلب. يرجى تحديث وحاول مرة أخرى."
        }
    }
</i18n>

<template>
    <div class="Cover">
        <form @submit="formSubmit">
            <h5>{{ $t('Update Password') }}</h5>
            <div class="form-group row">
                <label class="col-md-2" for="currentPassword">{{ $t('Current Password') }}</label> 
                <input class="form-control col-md-6" id="currentPassword" type="password" v-model="form.currentPassword" required>
            </div>

            <div class="form-group row">
                <label class="col-md-2" for="newPassword">{{ $t('New Password') }}</label> 
                <input class="form-control col-md-6" id="newPassword" type="password" v-model="form.newPassword" required>
            </div>

            <div class="form-group row">
                <label class="col-md-2" for="confirmPassword">{{ $t('Confirm Password') }}</label> 
                <input class="form-control col-md-6" id="confirmPassword" type="password" v-model="form.confirmPassword" required>
            </div>

            <button :disabled="loading" class="btn btn-warning" type="submit"><RingLoader v-if="loading"></RingLoader>{{ $t('Update') }}</button>
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
                this.setAlert(this.$t('noMatch'), true);
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
                            this.setAlert(this.$t('success'), false);
                        }
                        else {
                            this.setAlert(this.$t('errorThen'), true);
                        }
                    })
                    .catch(error => {
                        console.log(error.response);
                        this.setAlert(this.$t('errorCatch'), true);
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