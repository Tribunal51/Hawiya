<template>
    <div id="cover">
        <section id="section1"><Welcome /></section>
        <section id="section2"><WhatWeDo /></section>
<<<<<<< HEAD
        <!-- <section id="section3"><MeetTheTeam /></section> -->
=======
        <section id="section3"><MeetTheTeam /></section>
>>>>>>> 00448664fa03f1c57e05b464882457956a1ff51c
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
            // let url = "http://localhost:8000/leadmanager/api/lead";
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

    

    #section1 {
        width: 100%;
        position: relative;
    }
    

    #section2, #section3, #section4, #section5, #section6 {
        /* min-height: 90vh; */
        min-height: 90vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-family: 'Lato', sans-serif;
        /* min-height: 80vh; */
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


