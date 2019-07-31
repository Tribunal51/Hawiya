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


        <!-- IMPORTANT <nav class="nav navbar navbar-expand-md navbar-light bg-light navSection" :style="assignClass(scrollPos)">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <v-toolbar-side-icon @click="drawer=!drawer"></v-toolbar-side-icon>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navItems mx-auto">
                    <a href="/"><img class="logo" src="/storage/HawiyaBrandLogo.PNG" /></a>
                    <span :style="displayOrNot()">
                        <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section1'">HOME</router-link>
                        <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section2'">WHAT WE DO</router-link>
                        <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section4'">PROFILE</router-link>
                        <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section5'">CASESTUDY</router-link>
                        <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section6'">CONTACTUS</router-link>
                        <a class="nav-item navItem" href="/" @click="resetState">Reset</a>
                    </span>
                    <slot></slot> 
                </ul>
            </div>
        </nav>   -->


        <nav class="navbar navbar-expand-lg navbar-light bg-light navSection" :style="assignClass(scrollPos)">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto navItems">
                    <li class="nav-item">
                        <a href="/"><img class="logo" src="/storage/HawiyaBrandLogo.PNG" /></a>
                    </li>
                    <router-link :style="displayOrNot(scrollPos)" tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section1'">HOME</router-link>
                    <router-link :style="displayOrNot(scrollPos)" tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section2'">WHAT WE DO</router-link>
                    <router-link :style="displayOrNot(scrollPos)" tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section4'">PROFILE</router-link>
                    <router-link :style="displayOrNot(scrollPos)" tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section5'">CASESTUDY</router-link>
                    <router-link :style="displayOrNot(scrollPos)" tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section6'">CONTACTUS</router-link>
                    <slot></slot>
                    <li class="dropdown nav-item navItem languageSection">
                        <button class="btn btn-default dropdown-toggle toggleButton" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ this.language }}
                        </button>
                        <div class="dropdown-menu dropdownLanguages" aria-labelledby="dropdownMenu2">
                            <button 
                                class="dropdown-item languageButton"
                                type="button"
                                v-for="language in languages" 
                                :key="language"
                                @click="setLanguage(language)">{{ language }}</button>
                        </div>
                    </li>


                    
                    <!-- <li class="nav-item my-auto" :style="displayOrNot(scrollPos)">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item my-auto" :style="displayOrNot(scrollPos)">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item my-auto" :style="displayOrNot(scrollPos)">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item my-auto" :style="displayOrNot(scrollPos)">
                        <a class="nav-link" href="#">Disabled</a>
                    </li> -->
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
                <ul class="nav-items">
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
            languages: ["EN", "AR"],
            language: "EN",
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
        setLanguage(language) {
            this.language = language;
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

    .navSection {   
    position: absolute fixed;
    width: 100%;
    /* height: 80px; */
    height: auto;
    z-index: 1000 !important;

    
    }

    .logo {
        width: auto;
        max-height: 80px;
    }

    .navItems {
        display: flex;
        align-items: center;
    }

    .navItem {        
        display: inline;
        margin-left: 1rem;
        margin-right: 1rem;
        color: #333;
        text-decoration: none;
        font-size: 0.9rem;         
    }

    


    .navItem:hover {
        color: black;
        cursor: pointer;
    }


    .dropdownLanguages {
        width: 5rem;
        min-width: 3rem;
        
        
    }

    .languageSection {
        margin: 0 !important;
        padding: 0;
        width: 5rem !important;
    }

    .languageButton {
        width: 100%;
        
    }

    .languageButton:hover {
        background-color: #FFDB00;
    }

    .toggleButton {
        width: 5rem;
    }

    .languageButton {
        width: 100%;
    }

    





</style>
