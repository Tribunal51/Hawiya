<template>
    <div id="cover">
        <section id="section1"><Welcome /></section>
        <section id="section2"><WhatWeDo /></section>
        <section id="section3"><MeetTheTeam /></section>
        <section id="section4"><Profile /></section>
        <section id="section5"><CaseStudy /></section>
        <section id="section6"><ContactUs /></section>   
    </div>
</template>

<script>
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueScrollTo from 'vue-scrollto';
import axios from 'axios';


import WhatWeDo from './WhatWeDo/WhatWeDo.vue';
import Profile from './Profile/Profile.vue';
import CaseStudy from './CaseStudy/CaseStudy.vue';
import ContactUs from './ContactUs/ContactUs.vue';
import MeetTheTeam from './WhatWeDo/MeetTheTeam';
import Welcome from './Welcome/Welcome';

Vue.use(VueScrollTo, {
     container: "body",
     duration: 2000,
     easing: "ease",
     offset: -90,
     force: true,
     cancelable: true,
     onStart: false,
     onDone: false,
     onCancel: false,

     x: false,
     y: true
 });
 

export default {
    mounted() {
            // console.log('Component mounted.');
            // window.addEventListener('scroll', () => {
            //     this.scrollPos = window.scrollY;
            //     console.log(this.scrollPos);
            // });
            // window.addEventListener('scroll', function(e) {
            //         this.scrollPos = window.scrollY;
            //         console.log(this.scrollPos);
            // });
            this.$store.dispatch('resetAllStates');
            console.log('Is LogoDesign Valid',this.$store.getters['logodesign/isValid']);
            let url = "http://localhost:8000/leadmanager/api/lead";
            // axios.get(url)
            // .then(res => console.log(res.data))
            // .catch(error => console.log(error));

    },
    destroyed() {
        // window.removeEventListener('scroll');
    },
    components: {
        WhatWeDo,
        Profile,
        CaseStudy,
        ContactUs,
        MeetTheTeam,
        Welcome
    },
    data() {
        return {
            sections: [1,2,3,4,5],
            homePageUrl: '/storage/hawiyaHomePage.PNG',
            scrollPos: 0
        }
    }

}
</script>

<style scoped>
    /* @import url('https://fonts.googleapis.com/css?family=Lato   ');
    @import url('https://fonts.googleapis.com/css?family=Lato:700'); */
    

    /* #section1 {
        height: 100vh;
    } */


    

    #section2, #section3, #section4, #section5, #section6 {
        /* min-height: 90vh; */
        font-family: 'Lato', sans-serif;
        
    }

    


    #section1 {
        font-family: 'LatoBold', sans-serif;
        min-height: 100vh;

        
       
        background: url('/storage/HomePage.png') no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    
    

</style>


