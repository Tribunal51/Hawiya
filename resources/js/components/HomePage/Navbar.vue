<template>
    <div id="cover">
        <!-- <nav class="nav navbar navbar-expand-lg" :style="assignClass(scrollPos)" id="nav">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="nav-items mx-auto">
                    <a href="/"><img src="/storage/HawiyaBrandLogo.PNG" /></a>
                    <span :style="displayOrNot()">
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section1'">HOME</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section2'">WHAT WE DO</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section4'">PROFILE</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section5'">CASESTUDY</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section6'">CONTACTUS</router-link>
                        <a class="nav-item" href="/" @click="resetState">Reset</a>
                    </span>
                    <slot></slot>                   
                </ul>               
            </div>
        </nav>    -->


        <nav class="nav navbar navbar-expand-md navbar-light bg-light" :style="assignClass(scrollPos)">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <v-toolbar-side-icon @click="drawer=!drawer"></v-toolbar-side-icon> -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav-items mx-auto">
                    <a href="/"><img src="/storage/HawiyaBrandLogo.PNG" /></a>
                    <span :style="displayOrNot()">
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section1'">HOME</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section2'">WHAT WE DO</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section4'">PROFILE</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section5'">CASESTUDY</router-link>
                        <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section6'">CONTACTUS</router-link>
                        <a class="nav-item" href="/" @click="resetState">Reset</a>
                    </span>
                    <slot></slot> 
                </ul>
            </div>
        </nav>  

        <!-- <v-toolbar height="80px" app :style="assignClass(scrollPos)">
            <v-toolbar-side-icon @click="drawer=!drawer"></v-toolbar-side-icon>
            <v-toolbar-title><a class="nav-item" href="/"><img src="/storage/HawiyaBrandLogo.PNG" /></a></v-toolbar-title>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat router to="/" v-scroll-to="'#section1'">Link One</v-btn>
                <v-btn flat router to="/" v-scroll-to="'#section2'">Link One</v-btn>
                <v-btn flat>Link Two</v-btn>
                <v-btn flat>Link Three</v-btn>
            </v-toolbar-items>
        </v-toolbar>    -->
        <v-navigation-drawer app v-model="drawer" temporary>
            <v-list>
                <ul class="nav-items mx-auto">
                    <a class="nav-item" href="/"><img src="/storage/HawiyaBrandLogo.PNG" /></a>
                    <span :style="displayOrNot()">
                        <v-list-tile>
                            <v-list-tile-action>
                                <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section1'">HOME</router-link>
                            </v-list-tile-action>
                        </v-list-tile>

                        <v-list-tile>
                            <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section2'">WHAT WE DO</router-link>
                        </v-list-tile>

                        <v-list-tile>
                            <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section4'">PROFILE</router-link>
                        </v-list-tile>
                        
                        <v-list-tile>
                            <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section5'">CASESTUDY</router-link>
                        </v-list-tile>
                        
                        <v-list-tile>
                            <router-link tag="li" class="nav-item" to="/" v-scroll-to="'#section6'">CONTACTUS</router-link>
                        </v-list-tile>

                        <v-list-tile>
                            <a class="nav-item" href="/" @click="resetState">Reset</a>
                        </v-list-tile>                       
                    </span>

                    <v-list-tile>
                        <slot></slot> 
                    </v-list-tile>
                </ul>
                <v-list-tile>
                    <v-list-tile-action>
                        <v-icon class="white">dashboard</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text">Dashboard</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>


    </div>
</template>

<script>
import VueRouter from 'vue-router';
import { VToolbar, VNavigationDrawer } from 'vuetify/lib';

export default {
    mounted() {
        window.addEventListener('scroll', () => {
                this.scrollPos = window.scrollY;
                console.log(this.scrollPos);
            });
    },
    updated() {
        //console.log('updated');
    },
    components: {
        // VToolbar,
        // VNavigationDrawer,
        // VToolbarSideIcon
    },
    props: [
        
    ],
    data() {
        return {
            scrollPos: 0,
            drawer: false,
            homePageNavStyle: {
                'backgroundColor': 'transparent !important',
                'position': 'fixed'
            },
            otherSectionNavStyle: {
                'backgroundColor': 'white !important',
                'position': 'fixed'
            },
            otherPageNavStyle: {
                'backgroundColor': 'white !important',
                'position': 'relative'                
            },
            exceptionPages: [
                "/login",
                "/register",
                "/home",
                "/dashboard",
                "/dashboard/addProfile",
                "/dashboard/users",
                "/payment"
                
            ]
        }
    },
    computed: {
        classObject: function() {
            return {

            }
        }
    },
    watch: {
        scrollPos: {
            immediate: true,
            handler (val, oldVal) {
                //console.log('changed');
                //console.log('Inside watch',val, oldVal);
                this.navScrollPos = val;
            }
        },
        
    },
    methods: {
        assignClass(scrollPos) {
            if(this.$route.path === '/') {
                if(scrollPos < 1) {
                    return this.homePageNavStyle;
                }
                else {
                    return this.otherSectionNavStyle;
                }
            }
            else {
                return this.otherPageNavStyle;
            }
        },
        displayOrNot() {
            if(this.exceptionPages.indexOf(this.$route.path) > -1) {
                console.log('Inside Login');
                return ('display: none');
            }           
            // if(this.$route.path === '/login' || this.$route.path === '/register' || this.$route.path === '/home') {
            //     console.log('Inside login');
            //     return ('display: none');
            // }
        },
        resetState() {
            this.$store.dispatch('logodesign/resetState');
            console.log('State reset');
        }
    }
}
</script>

<style scoped>

    #cover {
        font-family: 'LatoRegular', sans-serif;
    }

    .nav {
    /* background-color: var(--off-white); */
    /* background-color: white; */    
    position: absolute fixed;
    width: 100%;
    /* height: 80px; */
    height: auto;
    z-index: 1000 !important;
    /* box-shadow: 0 4px 14px 0 rgba(0, 0, 0, 0.01); */
    /* background-color: rgba(0, 0, 0, 1); */
    
    }

    img {
        width: auto;
        max-height: 80px;
    }



    .nav-logo {
    height: 60px;
    width: 60px;
    }

    .nav-logo:hover {
    cursor: pointer;
    
    }



    .nav .nav-content {
        
    /* padding: 0rem 3rem;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%; */
    
    }

    .nav-item {
        
        display: inline;
        margin-left: 2rem;
        color: #333;
        text-decoration: none;
        font-size: 0.9rem; 
        
    }

    li.nav-item:active {
        color: yellow
    }


    .nav-item:hover {
    color: black;
    cursor: pointer;
    }

    li {
        text-decoration: none;
    }

    .hamburger {
        opacity: 1;
    }






</style>
