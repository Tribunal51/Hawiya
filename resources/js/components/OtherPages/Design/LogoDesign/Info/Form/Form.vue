<i18n>
    {
        "en": {
            "Logo Information": "Logo Information",
            "Fill your Brand Information": "Fill your Brand Information",
            "placeholders": {
                "brand_name": "BRAND NAME (REQUIRED)",
                "tagline": "TAGLINE (OPTIONAL)",
                "business_field": "BUSINESS FIELD (REQUIRED)",
                "subject": "SUBJECT (REQUIRED)",
                "description": "DESCRIPTION OF YOUR BUSINESS (REQUIRED)"
            }
        },
        "ar": {
            "Logo Information": "معلومات الشعار",
            "Fill your Brand Information": "ملء معلومات العلامة التجارية الخاصة بك",
            "placeholders": {
                "brand_name": "اسم العلامة التجارية (مطلوب)",
                "tagline": "الشعار (اختياري)",
                "business_field": "مجال العمل (مطلوب)",
                "subject": "الموضوع (مطلوب)",
                "description": "وصف عملك (مطلوب)"
            }
        }
    }
</i18n>

<template>
    <div class="Cover">
        <SubHeader><h5><strong>{{ title ? title : $t('Logo Information') }}</strong></h5></SubHeader>
        <!-- <div class="row">
            <div class="col-md-4">
                <BlackBox>
                    <h5>Logo Information</h5>
                </BlackBox>
            </div>
            <div class="col-md-8 yellowLineSection">

            </div>
        </div> -->
        <div class="row">
            <div class="col-md mt-2 mb-2">
                <h5>{{ $t('Fill your Brand Information') }}</h5>
            </div>
        </div>
        
        <div class="form-group">
            <!-- <label for="brandName">*</label> -->
            <input 
                type="text" 
                class="input-bottom-border" 
                id="brandName" 
                :placeholder="$t('placeholders.brand_name')" 
                @input="updateForm($event.target.value, 'brand')"
                :value="this.Form.brand"
                required
                :readonly="readonly"
            />
            <!-- <small for="brandName" id="brandName" class="form-text text-muted">At least 3 characters</small> -->
        </div>

        <div class="form-group">
            <input 
                type="text" 
                class="input-bottom-border" 
                :placeholder="$t('placeholders.tagline')"
                @input="updateForm($event.target.value, 'tagline')"
                :value="this.Form.tagline"
                :readonly="readonly"
             />
        </div>


        <div class="form-group">
            <input 
                type="text" 
                class="input-bottom-border" 
                :placeholder="$t('placeholders.business_field')"  
                @input="updateForm($event.target.value, 'business_field')"
                :value="this.Form.business_field"
                required
                :readonly="readonly"
            />
        </div>

        <div class="form-group">
            <input 
                type="text" 
                class="input-bottom-border"
                :placeholder="$t('placeholders.subject')"
                @input="updateForm($event.target.value, 'subject')"
                :value="this.Form.subject" 
                required 
                :readonly="readonly"
            />

        </div>

        <div class="form-group">
            <textarea 
                type="text" 
                class="input-bottom-border" 
                :placeholder="$t('placeholders.description')" 
                @input="updateForm($event.target.value, 'description')"
                :value="this.Form.description" 
                required
                :readonly="readonly"
            />
        </div>        
    </div>
</template>

<script>
import BlackBox from '../../../../../UI/BlackBox';
import SubHeader from '../../../../../UI/SubHeader';

export default {
    props: [
        "Form",
        "title",
        "readonly"
    ],
    components: {
        BlackBox,
        SubHeader
    },
    data() {
        return {
            form: {...this.Form}
        }
    },
    mounted() {
        // if(this.$store.state.logodesign.form === null) {
        //     this.form = {...this.Form};
        // }
        // else {
        //     this.form = {...this.$store.state.logodesign.form};
        // }
    },
    methods: {
        updateForm(value, type) {
            switch(type) {
                case 'brand': this.form.brand = value;
                break;

                case 'tagline': this.form.tagline = value;
                break;

                case 'business_field': this.form.business_field = value;               
                break;

                case 'subject': this.form.subject = value;
                break;

                case 'description': this.form.description = value;                
                break;  
            }
            this.$emit('form', this.form);
        }
    }
    
}
</script>

<style scoped>
    
    
    

    
</style>
