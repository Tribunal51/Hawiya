<template>    
    <v-app class="Cover" >
        
        <router-view />
        

        <page-footer />
        
    </v-app>
</template>

<script>   
import Vue from 'vue';

// import { VApp } from 'vuetify/lib';
//import 'vuetify/src/stylus/app.styl';
import VToolbarSideIcon from 'vuetify/lib';

export default {
    props: [
        "authuser",
        "verified"
    ],
    components: {
        VToolbarSideIcon
    },
    mounted() {
        console.log('Verified', this.verified);
        this.$store.dispatch('setVerifyUser',this.verified);
        console.log('Component mounted. TEST', this.authuser);
        this.$store.dispatch('setAuthUser', this.authuser);
        console.log('State updated with user info', this.$store.state);   
        if(this.reset) {
            this.$store.dispatch('logodesign/resetState');
            console.log('Reset Done');
        }
        else {
            console.log('Reset false');
        }

    },
    components: {
        
    },   
    computed: {
        userLoginStatus() {
            return this.$store.state.user_id;
        }
    },
    watch: {
        userLoginStatus(newValue, oldValue) {
            if(newValue <= 0) {
                this.$store.dispatch('logodesign/resetState');
            }
        }
    }     
}
</script>

<style scoped>
    .Cover {
        background-color: white;
        overflow-x: hidden;
    }

    

</style>



<style>

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