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
            "reset",

            "verified"
        ],
        mounted() {
            console.log('Verified', this.verified);
            this.$store.dispatch('setVerifyUser',)
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


</style>