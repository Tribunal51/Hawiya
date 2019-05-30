<template>
    
    <v-app>
        
        <router-view />

    </v-app>
</template>

<script>   
import Vue from 'vue';

import { VApp } from 'vuetify/lib';
// import 'vuetify/src/stylus/app.styl';

export default {
        props: [
            "authuser",
            "reset"
        ],
        mounted() {
            
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
            VApp
        },        
    }
</script>

<style scoped>


</style>