<template>
    <div id="cover">
        <section id="section1">
            <div class="row filler">
                
            </div>
            
            <div class="row footer">
                <Footer />
            </div>
             
            
                
            
        </section>
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
import Footer from './Footer.vue';
import MeetTheTeam from './WhatWeDo/MeetTheTeam';

Vue.use(VueScrollTo, {
     container: "body",
     duration: 2000,
     easing: "ease",
     offset: -110,
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
        Footer,
        MeetTheTeam
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

    @font-face {
        font-family: LatoBold;
        src: url('/fonts/Lato-Bold.ttf');
    }

    @font-face {
        font-family: LatoRegular;
        src: url('/fonts/Lato-Regular.ttf');
    }

    @font-face {
        font-family: LatoItalic;
        src: url('/fonts/Lato-Italic.ttf');
    }

    @font-face {
        font-family: LatoThin;
        src: url('/fonts/Lato-Thin.ttf');
    }

    @font-face {
        font-family: LatoMedium;
        src: url('/fonts/Lato-Medium.ttf');
    }

    @font-face {
        font-family: LatoBlack;
        src: url('/fonts/Lato-Black.ttf');
    }

    #section2, #section3, #section4, #section5, #section6 {
        /* min-height: 90vh; */
        font-family: 'Lato', sans-serif;
        
    }

    .filler {
        height: 85vh;
    }


    #section1 {
        font-family: 'LatoBold', sans-serif;
        min-height: 100vh;

        
       
        background: url('/storage/hawiyaHomePage.PNG') no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    
    

</style>

<style>
    .input-bottom-border {
        font-family: 'LatoLight', sans-serif;
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid black;
        width: 100%;
        display: block;
        resize: none;
    }


    .checkBoxGroup {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        width: 100%;
        /* justify-content: center; */
    }

    .checkBox {
        width: 200px !important;
        height: auto;
        margin: 10px;
    }

    .inputRadio {
        display: none;
    }

    .inputCheckBox {
        display: none;
    }

    .checkBoxLabel {
        border: 1px solid #fff;
        padding: 5px;
        display: block;
        position: relative;
        /* margin-bottom: 10px; */
        cursor: pointer;
    }

    .checkBoxLabel:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        bottom: -5px;
        right: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .checkBoxLabel img {
        width: 100%;
        height: auto;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
        
    }
    .checkBoxLabel img:hover {
        transform: scale(1.1);
    }

    :checked + .checkBoxLabel {
        border-color: #ddd;
    }

    :checked + .checkBoxLabel:before {
        content: "✓";
        background-color: green;
        transform: scale(1);
        z-index: 1
    }

    :checked + .checkBoxLabel img {
        transform: scale(1.1);
        box-shadow: 0 0 5px #333;
        z-index: -1;
    }

    .packageCards {
        /* background-color: green; */
        margin-top: 20px;
        display: flex;
        /* justify-content: center; */
        justify-content: space-evenly;   
            
        
    }

    .input-textarea-gray {
        background-color: #D3D3D3;
        border: 1px solid gray;
        resize: none;
    }

    .borderBottomYellow {
        border-bottom: 2px solid #FFDB00;
    }

    .yellowCheckBox span {
        width: 20px;
        height: 20px;
        border: 1px solid gray;
        background-color: transparent;
        display: block;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: -10px;

    }

    .yellowCheckBox input:checked + span {
        background-color: #FFDB00;
    }

    .grayContainer {
        width: 100%;
        height: auto;
        min-height: 300px;
        background-color: lightgray;
    }

    .checkoutSection {
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: #FFDB00;
        width: 100%;
        min-height: 80%;

    }

    .flex-container-align-vertical {
        display: flex;
        align-items: center;

    }

    .topBottomBorder {
        border-top: 2px solid black;
        border-bottom: 2px solid black;
    }
</style>
