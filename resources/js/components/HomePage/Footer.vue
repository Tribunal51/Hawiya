<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"><center>C 2019 Hawiya Brands. All rights reserved.</center></div>
            <div class="col-md-2"></div>
            <div class="col-md-6" id="footerLinks">
                <div class="row" id="footerRow">    
                    <router-link id="footerLink" tag="div" class="col-sm" to="/about">About</router-link>                        
                    <router-link id="footerLink" tag="div" class="col-sm" to="/feedback">Client Feedback</router-link>
                    <router-link id="footerLink" tag="div" class="col-sm" to="/faq">FAQ</router-link>
                    <router-link id="footerLink" tag="div" class="col-sm" to="/terms">Terms</router-link>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VueRouter from 'vue-router';
export default {

}
</script>

<style scoped>
   
#footerLinks {
    justify-content: space-between;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    

}

div.col-sm {
    font-size: 1rem;
}

#footerLink {
    margin: 5px;
    padding: 1px;
    justify-content: space-around;
   
}

</style>
