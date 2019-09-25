<i18n>
    {
        "en": {
            "placeholders": {
                "name": "NAME (REQUIRED)",
                "email": "EMAIL (REQUIRED)",
                "phone": "PHONE",
                "subject": "SUBJECT (REQUIRED)",
                "message": "MESSAGE (REQUIRED)"
            },
            "alerts": {
                "success": "Form submitted. We will reach out to you soon.",
                "errorThen": "Please enter all mandatory fields.",
                "errorCatch": "There was an error in submitting the form. Please refresh or try again later."
            },
            "Submit": "Submit"
        },
        "ar": {
            "placeholders": {
                "name": "الاسم (مطلوب)",
                "email": "البريد الإلكتروني (مطلوب)",
                "phone": "هاتف",
                "subject": "الموضوع (مطلوب)",
                "message": "رسالة (مطلوب)"
            },
            "alerts": {
                "success": "نموذج مقدم. سوف نتواصل معك قريبا.",
                "errorThen": "الرجاء إدخال جميع الحقول الإلزامية.",
                "errorCatch": "حدث خطأ في إرسال النموذج. يرجى التحديث أو إعادة المحاولة لاحقًا."
            },
            "Submit": "تقديم"
        }
    }
</i18n>

<template>
    <div class="Cover">
        <form @submit="formSubmitted">
            <div class="formSection">
                <input class="input-bottom-border" type="text" :placeholder="$t('placeholders.name')" v-model="form.name" required/>
                <input class="input-bottom-border" type="email" :placeholder="$t('placeholders.email')" v-model="form.email" required />
                <input class="input-bottom-border" type="tel" :placeholder="$t('placeholders.phone')" v-model="form.phone" />
                <input class="input-bottom-border" type="text" :placeholder="$t('placeholders.subject')" v-model="form.subject" required />
                <textarea class="input-bottom-border" type="text" :placeholder="$t('placeholders.message')" v-model="form.message" required />
            </div>
            <button type="submit" class="btn btn-dark">{{ $t('Submit') }}</button>     
            <!-- <button type="submit" class="btn btn-dark" @click="submitButtonClicked">Submit</button> -->
        </form>

        <div v-if="submit">
            <div v-if="success">
                <div v-if="error === ''" class="alert alert-success py-2 my-2" role="alert">
                    {{ $t('alerts.success') }}
                </div>
                <div v-else class="alert alert-danger py-2 my-2" role="alert">
                    {{ $t('alerts.errorThen') }}
                </div>
            </div>
            <div v-else>
                {{ $t('alerts.errorCatch') }}
            </div>
            
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: '',
            },
            success: false,
            submit: false,
            error: ''
        }
    },
    methods: {
        formSubmitted(event) {
            event.preventDefault();
            // alert(this.$store.state.user_id);
            let data = {
                ...this.form,
                user_id: this.$store.state.user_id
            };
            axios.post("http://hawiya.net/api/query", data)
            .then(res => {
                this.submit = true;
                this.success = true;
                if(res.data > 0) {
                    this.clearForm();
                }
                else {
                    this.error = "Please enter all mandatory fields.";
                }
                console.log(res.data);
                this.clearForm();
            })
            .catch(error => {
                this.submit = true;
                this.success = false;
                this.error = error.response.data;
                console.log(error.response.data);
            });
            console.log(this.form);
            
        },
        clearForm() {
           Object.keys(this.form).forEach(key => {
               this.form[key] = '';
           });
        }
    }
}
</script>

<style scoped>
    .Cover {
        width: 100%;
        height: 100%;
    }

        html[dir="ltr"] .Cover {
            padding-right: 5% !important;
        }

        html[dir="rtl"] .Cover {
            padding-left: 5% !important;
        }
    /* .input-bottom-border {
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid black;
        width: 100%;
        display: block;
    } */

    .formSection {
        margin-bottom: 10px;
        font-family: 'LatoLight',sans-serif;
    }

    textarea {
        height: 100px;
        resize: none;
    }
    
    /* input:required:invalid, input:focus:invalid, textarea:required:invalid, textarea:focus:invalid {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAeVJREFUeNqkU01oE1EQ/mazSTdRmqSxLVSJVKU9RYoHD8WfHr16kh5EFA8eSy6hXrwUPBSKZ6E9V1CU4tGf0DZWDEQrGkhprRDbCvlpavan3ezu+LLSUnADLZnHwHvzmJlvvpkhZkY7IqFNaTuAfPhhP/8Uo87SGSaDsP27hgYM/lUpy6lHdqsAtM+BPfvqKp3ufYKwcgmWCug6oKmrrG3PoaqngWjdd/922hOBs5C/jJA6x7AiUt8VYVUAVQXXShfIqCYRMZO8/N1N+B8H1sOUwivpSUSVCJ2MAjtVwBAIdv+AQkHQqbOgc+fBvorjyQENDcch16/BtkQdAlC4E6jrYHGgGU18Io3gmhzJuwub6/fQJYNi/YBpCifhbDaAPXFvCBVxXbvfbNGFeN8DkjogWAd8DljV3KRutcEAeHMN/HXZ4p9bhncJHCyhNx52R0Kv/XNuQvYBnM+CP7xddXL5KaJw0TMAF8qjnMvegeK/SLHubhpKDKIrJDlvXoMX3y9xcSMZyBQ+tpyk5hzsa2Ns7LGdfWdbL6fZvHn92d7dgROH/730YBLtiZmEdGPkFnhX4kxmjVe2xgPfCtrRd6GHRtEh9zsL8xVe+pwSzj+OtwvletZZ/wLeKD71L+ZeHHWZ/gowABkp7AwwnEjFAAAAAElFTkSuQmCC);
        background-position: right top;
        background-repeat: no-repeat;
        -moz-box-shadow: none;
    }
    input:required:valid, textarea:required:valid {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAepJREFUeNrEk79PFEEUx9/uDDd7v/AAQQnEQokmJCRGwc7/QeM/YGVxsZJQYI/EhCChICYmUJigNBSGzobQaI5SaYRw6imne0d2D/bYmZ3dGd+YQKEHYiyc5GUyb3Y+77vfeWNpreFfhvXfAWAAJtbKi7dff1rWK9vPHx3mThP2Iaipk5EzTg8Qmru38H7izmkFHAF4WH1R52654PR0Oamzj2dKxYt/Bbg1OPZuY3d9aU82VGem/5LtnJscLxWzfzRxaWNqWJP0XUadIbSzu5DuvUJpzq7sfYBKsP1GJeLB+PWpt8cCXm4+2+zLXx4guKiLXWA2Nc5ChOuacMEPv20FkT+dIawyenVi5VcAbcigWzXLeNiDRCdwId0LFm5IUMBIBgrp8wOEsFlfeCGm23/zoBZWn9a4C314A1nCoM1OAVccuGyCkPs/P+pIdVIOkG9pIh6YlyqCrwhRKD3GygK9PUBImIQQxRi4b2O+JcCLg8+e8NZiLVEygwCrWpYF0jQJziYU/ho2TUuCPTn8hHcQNuZy1/94sAMOzQHDeqaij7Cd8Dt8CatGhX3iWxgtFW/m29pnUjR7TSQcRCIAVW1FSr6KAVYdi+5Pj8yunviYHq7f72po3Y9dbi7CxzDO1+duzCXH9cEPAQYAhJELY/AqBtwAAAAASUVORK5CYII=);
        background-position: right top;
        background-repeat: no-repeat;
    } */
    

</style>
