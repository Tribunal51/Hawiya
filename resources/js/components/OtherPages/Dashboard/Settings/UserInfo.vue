<i18n>
    {
        "en": {
            "User Settings": "User Settings",
            "Name": "Name",
            "Mobile": "Mobile",
            "Preferred Language": "Preferred Language",
            "Update": "Update",
            "success": "Account updated. Please wait for refresh.",
            "errorThen": "Account could not be updated. Please verify the details entered.",
            "errorCatch": "Request could not be sent. Please refresh and try again."
        },
        "ar": {
            "User Settings": "إعدادات المستخدم",
            "Name": "اسم",
            "Mobile": "التليفون المحمول",
            "Preferred Language": "اللغة المفضلة",
            "Update": "تحديث",
            "success": "تم تحديث الحساب. يرجى الانتظار للتحديث.",
            "errorThen": "لا يمكن تحديث الحساب. يرجى التحقق من التفاصيل المرسلة.",
            "errorCatch": "لا يمكن إرسال الطلب. يرجى تحديث وحاول مرة أخرى."
        }
    }
</i18n>

<template>
    <div class="Cover">
        <h3>{{ $t('User Settings') }}</h3>
        <form @submit="formSubmit">
            <div class="form-group row">
                <label class="col-md-2" for="name">{{ $t('Name') }}</label> 
                <input class="col-md-6 form-control" type="text" id="name" v-model="form.name" required /> 
            </div>

            <div class="form-group row">
                <label class="col-md-2" for="mobile">{{ $t('Mobile') }}</label> 
                <input class="col-md-6 form-control" type="tel" id="mobile" v-model="form.mobile" />
            </div>

            <div class="form-group row">
                <label class="col-md-2" for="lang">{{ $t('Preferred Language') }}</label> 
                <select class="col-md-6" v-model="form.lang" id="lang">
                    <option v-for="language in languages" :key="language.title" :value="language.value">{{ language.title }}</option>
                </select>
            </div>
            
            <button :disabled="loading" class="btn btn-warning" type="submit"><RingLoader v-if="loading"></RingLoader>{{ $t('Update')}}</button>
            <div :class="'mt-4 '+setAlertClass()" v-if="alert.message !== ''">{{ alert.message }}</div>
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
    mounted() {
        const { name, mobile, lang } = this.authuser;
        this.form = { name, mobile, lang };
    },
    methods: {
        formSubmit(event) {
            event.preventDefault();
            let data = {
                user_id: this.authuser.id,
                name: this.form.name,
                mobile: this.form.mobile,
                lang: this.form.lang
            }
            this.loading = true;
            axios.put('/api/user', data)
                .then(res => {
                    console.log(res.data);
                    if(res.data > 0) {
                        this.setAlert(this.$t('success'), false);
                        location.href="/lang/"+data.lang;
                    }   
                    else {
                        this.setAlert(this.$t('errorThen'), true);
                    }
                })
                .catch(error => {
                    console.log(error.response);
                    this.setAlert(this.$t('errorCatch'), true);
                });
           // alert('Form submit');
        },
        setAlert(message, isError) {
            this.alert.message = message;
            this.alert.error = isError;
            this.loading = false;
        },
        setAlertClass() {
            return this.alert.isError ? 'alert alert-danger' : 'alert alert-success';
        }
    },
    data() {
        return {
            form: {
                name: '',
                mobile: '',
                lang: ''
            },
            loading: false,
            alert: {
                isError: false,
                message: ''
            },
            languages: [
                {
                    title: 'English',
                    value: 'en'
                },
                {
                    title: 'عربى',
                    value: 'ar'
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>