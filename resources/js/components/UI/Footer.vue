<template>
    <IntroSection>
        <div class="row bold">
            <div class="col-md-4"><center>C 2019 Hawiya Brands. All rights reserved.</center></div>
            <div class="col-md-2"></div>
            <div class="col-md-6" id="footerLinks">
                <div class="row" id="footerRow">    
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
    }
}
</script>

<style scoped>
   
#footerLinks {
    justify-content: space-between;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    

}

.footerLink {
    /* font-size: 1rem; */

    margin-top: 5px;
    padding: 1px;
    justify-content: space-between;
}

/* #footerLink {
    margin: 5px;
    padding: 1px;
    justify-content: space-around;
   
} */

.bold {
    font-family: 'LatoBold', sans-serif;
}

</style>
