<template>
    <IntroSection :styling="introSectionStyle">
        <div class="row bold">
            <div class="col-md-4"><center>C 2019 Hawiya Brands. All rights reserved.</center></div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="row footerRow">    
                    <router-link tag="div" class="col-sm footerLink" to="/about">About</router-link>                        
                    <router-link tag="div" class="col-sm footerLink" to="/feedback">Client Feedback</router-link>
                    <router-link tag="div" class="col-sm footerLink" to="/faq">FAQ</router-link>
                    <router-link tag="div" class="col-sm footerLink" to="/terms">Terms</router-link>
                </div>
            </div>
        </div>
    </IntroSection>
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
                'paddingBottom': '0px !important'
            }
        }
    }
}
</script>

<style scoped>

.footerLink {
    /* font-size: 1rem; */
    
    margin-top: 5px;

    padding: 5px;
    justify-content: space-between;
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
