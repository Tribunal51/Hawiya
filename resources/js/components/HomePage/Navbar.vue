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

        
        <nav class="navbar navbar-expand-lg navbar-light bg-light navSection" :style="assignClass(scrollPos)" :class="{'navbarOpen': show}" v-show="offset !== -50">
            
            <button ref="dataToggleButton" @click="toggleNavbar()" class="navbar-toggler" type="button" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div ref="collapseSection" class="collapse navbar-collapse" :class="{ 'show' : show }" id="navbarNav">
                
                <ul class="navbar-nav mx-auto navItems">
                    <li class="nav-item">
                        <a href="/"><img class="logo" src="/storage/HawiyaBrandLogo.PNG" /></a>
                    </li>
                    <router-link 
                        :style="displayOrNot(scrollPos)" 
                        v-on:click.native="toggleNavbar()" 
                        tag="li" class="nav-item navItem" 
                        to="/" 
                        v-scroll-to="{el: '#section1', offset: offset}">
                            HOME
                    </router-link>
                    <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section2', offset: offset}">WHAT WE DO</router-link>
                    <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section4', offset: offset}">PROFILE</router-link>
                    <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section5', offset: offset}">CASESTUDY</router-link>
                    <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section6', offset: offset}">CONTACTUS</router-link>
                    
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
                    <div class="nav-item navItem searchSection">
                        <input v-model="search" class="navItem searchField" ref="search" type="text" v-if="searchField"  />
                        <img :style="displayOrNot(scrollPos)" src="/storage/icons/searchicon.png" class="navItem searchIcon" @click="searchIconClicked()"  />
                    </div>
                    
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
       
        
        <v-toolbar-side-icon large class="hidden-sm-and-down drawerHamburger" v-show="true" @click="drawer=!drawer" v-if="offset === -50"></v-toolbar-side-icon>
        <v-navigation-drawer app v-model="drawer" temporary>
            <v-list nav>
                <ul class="nav-items">
                    <a class="nav-item" href="/"><img src="/storage/HawiyaBrandLogo.PNG" class="logo" /></a>
                    <span :style="displayOrNot()" @click="drawer=!drawer">
                        <v-list-tile>
                            <v-list-tile-action>
                                <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section1'">HOME</router-link>
                            </v-list-tile-action>
                        </v-list-tile>

                        <v-list-tile>
                            <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section2'">WHAT WE DO</router-link>
                        </v-list-tile>

                        <v-list-tile>
                            <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section4'">PROFILE</router-link>
                        </v-list-tile>
                        
                        <v-list-tile>
                            <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section5'">CASESTUDY</router-link>
                        </v-list-tile>
                        
                        <v-list-tile>
                            <router-link tag="li" class="nav-item navItem" to="/" v-scroll-to="'#section6'">CONTACTUS</router-link>
                        </v-list-tile>
                    
                    </span>

                    <v-list-tile>
                        <slot></slot> 
                    </v-list-tile>

                    <v-list-tile>
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
                    </v-list-tile>

                    <v-list-tile>
                        <div class="nav-item navItem searchSection">
                            <input v-model="search" class="navItem searchField" ref="search" type="text" v-if="searchField"  />
                            <img :style="displayOrNot(scrollPos)" src="/storage/icons/searchicon.png" class="navItem searchIcon" @click="searchIconClicked()"  />
                        </div>
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
import { VToolbar, VNavigationDrawer, VToolbarSideIcon } from 'vuetify/lib';
import VContainer from 'vuetify/lib';
import IntroSection from '../UI/IntroSection';
import VueScrollTo from 'vue-scrollto';

Vue.use(VueScrollTo, {
    container: "body",
    duration: 2000,
    easing: "ease",
    offset: -95,
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
        this.reconfigureNavbar();
        //console.log('Toggle Button Hidden? ', window.getComputedStyle(this.$refs.dataToggleButton).display === 'none');
        window.addEventListener('scroll', () => {
            this.scrollPos = window.scrollY;
            console.log(this.scrollPos);
        });
        
        
    },
    updated() {
        this.reconfigureNavbar();
        
    },
    components: {
        // VToolbar,
        // VNavigationDrawer,
        // VToolbarSideIcon
        IntroSection,
        VToolbarSideIcon
    },
    props: [
        
    ],
    data() {
        return {
            scrollPos: 0,
            offset: -50,
            drawer: null,
            search: '',
            searchField: false,
            show: false,
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
                "/payment",
                "/report"
                
            ],
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
        
        offset: function(newValue, oldValue) {
            //this.reconfigureNavbar();
            
        },
    },
    methods: {
        assignClass(scrollPos) {
            if(this.$route.path === '/') {
                if(scrollPos < 1) {
                    if(this.show) {
                        return this.otherSectionNavStyle;   
                    }
                    else {
                        return this.homePageNavStyle;
                    }   
                }
                else {
                    return this.otherSectionNavStyle;
                }
            }
            else {
                return this.otherPageNavStyle;
            }
        },
        reconfigureNavbar() {
            if(this.$refs.dataToggleButton && window.getComputedStyle(this.$refs.dataToggleButton).display === 'none') {
                this.offset = -95;
            }
            else {
                this.offset = -50;
            }
        },
        searchIconClicked() {
            if(this.searchField) {
                if(this.search !== '') {
                    alert('Search');
                }
                else {
                    this.searchField = false;
                }
                
            }
            else {
                this.searchField = true;
                //this.$refs.search.focus();
                console.log(this.$nextTick);
                this.$nextTick(() => this.$refs.search.focus());
            }
        },
        toggleNavbar() {
            this.show = !this.show;
            return "collapse";
        },
        displayOrNot() {
            this.exceptionPages.forEach(link => {
                console.log(link, this.$route.path);
                if(this.$route.path.includes(link)) {
                    //alert('Okay');
                    return 'display: none';
                }
            });
            
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
    },
    computed: {
        toggleButtonStyle() {
            return window.getComputedStyle(this.$refs.dataToggleButton).display;
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
        z-index: 1000 !important;
        
    }

    nav, .navbar, .navSection {
        min-height: 0px !important;
    }

    .logo {
        width: auto;
        max-height: 80px;
    }

    .navItems {
        display: flex;
        align-items: center;
        justify-content: center;
        /* background-color: red; */
        
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

    .searchSection {
        display: flex;
        flex-flow: row nowrap;
    }

    .searchIcon {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    
    .searchField {
        border: none;
        cursor: text !important;
        border-bottom: 1px solid gray;
        background: transparent;
    }

    .slide-fade-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-leave-active {
        transition: all .5s ease;
    }

    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateY(20px);
    }

    .drawerHamburger {
        z-index: 1000;
        background: white;
        position: fixed;
    }

    



</style>
