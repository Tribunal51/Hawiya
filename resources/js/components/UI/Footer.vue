<i18n>
    {
        "en": {
            "line1": "C 2019 Hawiya Brands. All rights reserved.",
            "About": "About",
            "Client Feedback": "Client Feedback",
            "FAQ": "FAQ",
            "Terms": "Terms"
        },
        "ar": {
            "line1": "C 2019 Hawiya Brands. كل الحقوق محفوظة.",
            "About": "حول",
            "Client Feedback": "ملاحظات العملاء",
            "FAQ": "أسئلة مكررة",
            "Terms": "شروط"

        }
    }
</i18n>

<template>
    <div class="Cover">
        <IntroSection :styling="introSectionStyle">
            <div class="row">
                <div class="col-md-4 footerLink">{{ $t('line1') }}  </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    
                    <div class="row">
                        <router-link tag="div" class="col-sm footerLink" to="/about">{{ $t('About') }}</router-link>                        
                        <router-link tag="div" class="col-sm footerLink" to="/feedback">{{ $t('Client Feedback') }}</router-link>
                        <router-link tag="div" class="col-sm footerLink" to="/faq">{{ $t('FAQ') }}</router-link>
                        <router-link tag="div" class="col-sm footerLink" to="/terms">{{ $t('Terms') }}</router-link>
                    </div>
                </div>
            </div>
            <!-- <div class="row bold">
                <div class="col-md-4 footerLink">C 2019 Hawiya Brands. All rights reserved.</div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="row footerRow">    
                        <router-link tag="div" class="col-sm footerLink" to="/about">About</router-link>                        
                        <router-link tag="div" class="col-sm footerLink" to="/feedback">Client Feedback</router-link>
                        <router-link tag="div" class="col-sm footerLink" to="/faq">FAQ</router-link>
                        <router-link tag="div" class="col-sm footerLink" to="/terms">Terms</router-link>
                    </div>
                </div>
            </div>  -->
        </IntroSection>
    </div>
           
</template>

<script>
import VueRouter from 'vue-router';
import IntroSection from './IntroSection';

export default {
    components: {
        IntroSection
    },
    data() {
        return {
            introSectionStyle: {
                paddingBottom: '0px !important'
            }
        }
    }
}
</script>

<style scoped>

    .Cover {
        width: 100%;
        max-height: 100%;
        
        overflow-y: hidden;
        /* background-color: green; */
    }

    .footerLink {
        /* font-size: 1rem; */
        
        /* margin-top: 5px; */
        /* background-color: red; */
        padding: 5px 0px;
        text-align: center;
        cursor: pointer;
    }

/* #footerLink {
    margin: 5px;
    padding: 1px;
    justify-content: space-around;
   
} */

.footerRow {
    /* background-color: red; */
    display: flex;
    justify-content: space-between;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
}

.bold {
    font-family: 'LatoBold', sans-serif;
}

</style>
