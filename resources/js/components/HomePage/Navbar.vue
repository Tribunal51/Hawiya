<i18n>
    {
        "en": {
            "HOME": "HOME",
            "WHAT WE DO": "WHAT WE DO", 
            "PROFILE": "PROFILE",
            "CASE STUDY": "CASE STUDY",
            "CONTACT US": "CONTACT US",
            "EN": "EN",
            "AR": "عربى" 
        },
        "ar": {
            "HOME": "الصفحة الرئيسية",
            "WHAT WE DO": "الذي نفعله",
            "PROFILE": "الملف الشخصي",
            "CASE STUDY": "دراسة الحالة",
            "CONTACT US": "اتصل بنا",
            "EN": "EN",
            "AR": "عربى"
        }
    }

</i18n>

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

        <nav v-if="true" class="navbar-expand-lg newNavbar" v-show="offset !== -50" :style="navStyle">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <IntroSection :styling="{paddingTop: '0px !important', paddingBottom: '0px !important'}">
                <button ref="dataToggleButton" @click="toggleNavbar()" class="navbar-toggler" type="button" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" :class="{ 'show': show }" id="navbarNav">
                    <div class="newNavbarMainSection collapse navbar-collapse" :class="{ 'show': show }" id="navbarNav">
                        <a href="/"><img class="newLogo" src="/storage/HawiyaBrandLogo.PNG" /></a>
                        <router-link 
                            v-show="displayOrNot(scrollPos)" 
                            v-on:click.native="toggleNavbar()" 
                            class="newItem firstItem" 
                            to="/" 
                            v-scroll-to="{el: '#section1', offset: offset}">
                                {{ $t('HOME') }}
                        </router-link>
                        <router-link v-show="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" class="newItem" to="/" v-scroll-to="{el: '#section2', offset: offset}">{{ $t('WHAT WE DO') }}</router-link>
                        <router-link v-show="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" class="newItem" to="/" v-scroll-to="{el: '#section4', offset: offset}">{{ $t('PROFILE') }}</router-link>
                        <router-link v-show="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" class="newItem" to="/" v-scroll-to="{el: '#section5', offset: offset}">{{ $t('CASE STUDY') }}</router-link>
                        <router-link v-show="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" class="newItem" to="/" v-scroll-to="{el: '#section6', offset: offset}">{{ $t('CONTACT US') }}</router-link>
                        <div :style="displayOrNot(scrollPos) ? '' : 'marginLeft: auto'" class="authSlot">
                            <slot name="navbar"></slot>
                        </div>
                        <div class="newLanguageSection newItem">
                            <button class="dropdown-toggle newToggleButton" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $t(lang ? lang.toUpperCase() : 'EN')}}
                            </button>
                            <div class="dropdown-menu newDropdownLanguages" aria-labelledby="dropdownMenu2">
                                <button 
                                    class="dropdown-item newLanguageButton"
                                    type="button"
                                    v-for="language in languages" 
                                    :key="language"
                                    @click="setLanguage(language)"
                                    >{{ $t(language.toUpperCase()) }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </IntroSection>
        </nav>

        
        <nav v-if="false" class="navbar navbar-expand-lg navbar-light bg-light navSection" :style="assignClass(scrollPos)" :class="{'navbarOpen': show}" v-show="offset !== -50">
            <IntroSection :styling="{paddingTop: '0px !important', paddingBottom: '0px !important'}">
            <button ref="dataToggleButton" @click="toggleNavbar()" class="navbar-toggler" type="button" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div ref="collapseSection" class="collapse navbar-collapse" :class="{ 'show' : show }" id="navbarNav">
                
                <ul class="navbar-nav navItems">
                    <li class="nav-item mr-auto">
                        <a href="/"><img class="logo" src="/storage/HawiyaBrandLogo.PNG" /></a>
                    </li>
                    
                    <span :style="displaySectionOrNot()">
                        <router-link 
                            :style="displayOrNot(scrollPos)" 
                            v-on:click.native="toggleNavbar()" 
                            tag="li" 
                            class="nav-item navItem ml-auto" 
                            to="/" 
                            v-scroll-to="{el: '#section1', offset: offset}">
                                HOME
                        </router-link>
                        <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section2', offset: offset}">WHAT WE DO</router-link>
                        <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section4', offset: offset}">PROFILE</router-link>
                        <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section5', offset: offset}">CASESTUDY</router-link>
                        <router-link :style="displayOrNot(scrollPos)" v-on:click.native="toggleNavbar()" tag="li" class="nav-item navItem" to="/" v-scroll-to="{el: '#section6', offset: offset}">CONTACTUS</router-link>
                    </span>
                    <slot></slot>
                    

                    
                    


                    <li class="dropdown languageSection">
                        <button class="btn btn-default dropdown-toggle drawerToggleButton" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ currentLanguage | capitalize }}
                        </button>
                        <div class="dropdown-menu dropdownLanguages" aria-labelledby="dropdownMenu2">
                            <button 
                                class="dropdown-item languageButton"
                                type="button"
                                v-for="language in languages" 
                                :key="language"
                                @click="setLanguage(language)"
                                >{{ language | capitalize }}</button>
                        </div>
                        <!-- <select v-model="currentLanguage">
                            <option v-for="language in languages" :key="language">{{ language }}</option>
                        </select> -->
                    </li>
                    <!-- <div class="nav-item navItem searchSection">
                        <input v-model="search" class="navItem searchField" ref="search" type="text" v-if="searchField"  />
                        <img :style="displayOrNot(scrollPos)" src="/storage/icons/searchicon.png" class="navItem searchIcon" @click="searchIconClicked()"  />
                    </div> -->
                    <!-- <button @click="quickUpdate()">Update</button> -->
                </ul> 

            </div>
            </IntroSection>
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
        <v-navigation-drawer app v-model="drawer" temporary :right="lang === 'ar'">
            <v-list nav>
                <ul class="navigationDrawerSection">
                    <a class="drawerItem" href="/"><img src="/storage/HawiyaBrandLogo.PNG" class="newLogo" /></a>
                    <span :style="displaySectionOrNot()">
                        <v-list-tile>
                            <v-list-tile-action>
                                <router-link class="drawerItem" to="/" v-scroll-to="{el: '#section1', offset: 0}" v-on:click.native="toggleDrawer()">{{ $t('HOME') }}</router-link>
                            </v-list-tile-action>
                        </v-list-tile>

                        <v-list-tile>
                            <router-link class="drawerItem" to="/" v-scroll-to="{el: '#section2', offset: 0}" v-on:click.native="toggleDrawer()">{{ $t('WHAT WE DO') }}</router-link>
                        </v-list-tile>

                        <v-list-tile>
                            <router-link class="drawerItem" to="/" v-scroll-to="{ el: '#section4', offset: 0}" v-on:click.native="toggleDrawer()">{{ $t('PROFILE') }}</router-link>
                        </v-list-tile>
                        
                        <v-list-tile>
                            <router-link class="drawerItem" to="/" v-scroll-to="{ el: '#section5', offset: 0}" v-on:click.native="toggleDrawer()">{{ $t('CASE STUDY') }}</router-link>
                        </v-list-tile>
                        
                        <v-list-tile>
                            <router-link class="drawerItem" to="/" v-scroll-to="{ el: '#section6', offset: 0}" v-on:click.native="toggleDrawer()">{{ $t('CONTACT US') }}</router-link>
                        </v-list-tile>
                    
                    </span>

                    
                    <div class="drawerAuthSlot">
                        <slot name="drawer"></slot> 
                    </div>
                    

                    <v-list-tile>
                        <v-list-tile-action>
                        <div class="drawerLanguageSection drawerItem">
                            <button class="text-left dropdown-toggle newToggleButton" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $t(lang ? lang.toUpperCase() : 'EN') }} 
                            </button>
                            <div class="dropdown-menu newDropdownLanguages" aria-labelledby="dropdownMenu2">
                                <button 
                                    class="dropdown-item newLanguageButton"
                                    type="button"
                                    v-for="language in languages" 
                                    :key="language"
                                    @click="setLanguage(language)"
                                    @click.native="toggleDrawer()"
                                    >{{ $t(language.toUpperCase()) }}</button>
                            </div>
                        </div>
                        <!-- <div class="drawerItem dropdown languageSection">
                            <button class="btn btn-default dropdown-toggle toggleButton" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ ( lang ? lang : 'en') | capitalize }}
                            </button>
                            <div class="dropdown-menu dropdownLanguages" aria-labelledby="dropdownMenu2">
                                <button 
                                    class="dropdown-item languageButton"
                                    type="button"
                                    v-for="language in languages" 
                                    :key="language"
                                    :href="'lang/'+language"
                                    @click="setLanguage(language)">{{ language }}</button>
                            </div>
                        </div> -->
                        </v-list-tile-action>
                    </v-list-tile>

                    <!-- <v-list-tile>
                        <div class="searchSection">
                            <input v-model="search" class="searchField" ref="search" type="text" v-if="searchField"  />
                            <img :style="displayOrNot(scrollPos)" src="/storage/icons/searchicon.png" class="searchIcon" @click="searchIconClicked()"  />
                        </div>
                    </v-list-tile> -->
                </ul> 
                <!-- <v-list-tile>
                    <v-list-tile-action>
                        <v-icon class="white">dashboard</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text">Dashboard</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile> -->
                
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
    offset: 0,
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
        //alert(this.lang);
        // this.reconfigureNavbar();
        // this.assignNavbarStyle();
        //console.log('Toggle Button Hidden? ', window.getComputedStyle(this.$refs.dataToggleButton).display === 'none');
        window.addEventListener('scroll', () => {
            this.scrollPos = window.scrollY;
            console.log(this.scrollPos);
        });
        console.log('i18n', this.$i18n);
        this.$root.$i18n.locale = this.lang;
        this.setRTLFormat(this.lang);
    },
    updated() {
        this.reconfigureNavbar();
        this.assignNavbarStyle();
        this.$root.$i18n.locale = this.lang;
        this.setRTLFormat(this.lang);
    },
    components: {
        // VToolbar,
        // VNavigationDrawer,
        // VToolbarSideIcon
        IntroSection,
        VToolbarSideIcon
    },
    props: [
        "lang",
        "user"
    ],
    data() {
        return {
            scrollPos: 0,
            offset: -50,
            drawer: null,
            search: '',
            searchField: false,
            show: false,
            currentRoute: this.$route.path,
            languages: ["en", "ar"],
            currentLanguage: this.$root.$i18n.locale,
            navStyle: {},
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
                this.assignNavbarStyle(val);
                
            }
        },
        offset: function(newValue, oldValue) {
            //this.reconfigureNavbar();
            
        },

        currentLanguage(lang) {
            location.href="lang/"+lang;
        },

        
    },
    methods: {
        assignNavbarStyle(val) {
            // if(this.$route.path === '/') {
            //     if(scrollPos <= 2) {
            //         if(this.show)
            //          {
            //             return this.otherSectionNavStyle;   
            //         }
            //         else {
            //             return this.homePageNavStyle;
            //         }   
            //     }
            //     else {
            //         return this.otherSectionNavStyle;
            //     }
            // }
            // else {
            //     return this.otherPageNavStyle;
            // }
            //console.log('Current Route',this.$route.path);
            if(val === 0 && this.$route.path === '/') {
                this.navStyle = this.homePageNavStyle;
            }
            else if(this.$route.path === '/') {
                if(this.scrollPos < 1) {
                    this.navStyle = this.homePageNavStyle;
                }
                else {
                    this.navStyle = this.otherSectionNavStyle;
                }
            }
            else {
                this.navStyle = this.otherPageNavStyle;
            }
        },
        setRTLFormat(lang) {
            if(lang === 'ar') {
                document.documentElement.dir = "rtl";
            }
            else {
                document.documentElement.dir = "ltr";
            }
        },
        reconfigureNavbar() {
            if(this.$refs.dataToggleButton && window.getComputedStyle(this.$refs.dataToggleButton).display === 'none') {
                this.offset = -90;
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
        toggleDrawer() {
            this.drawer = !this.drawer;
        },
        displayOrNot() {
            // if(this.exceptionPages.indexOf(this.$route.path) > -1) {
            //     console.log('Inside Login');
            //     return ('display: none');
            // }      
            return this.exceptionPages.indexOf(this.$route.path) > -1 ? false : true;
            
            // this.exceptionPages.forEach(link => {
            //     console.log(link, this.$route.path);
            //     if(this.$route.path.includes(link)) {
            //         // alert();
            //         return 'display: none';
            //     }
            // });
            
                 
            // if(this.$route.path === '/login' || this.$route.path === '/register' || this.$route.path === '/home') {
            //     console.log('Inside login');
            //     return ('display: none');
            // }
        },
        displaySectionOrNot() {
            let flag = true;
            this.exceptionPages.forEach(link => {
                //console.log(link, this.$route.path);
                if(this.$route.path.includes(link)) {
                    flag = false;
                }
            });
            return flag ? '' : ('display: none');
        },
        setLanguage(language) {
            // this.languages.forEach(currentLanguage => {
            //     if(currentLanguage.code === language.code) {
            //         currentLanguage.active = true;
            //     }
            //     else {
            //         currentLanguage.active = false;
            //     }
            // });
            //alert(language.code);
            this.$root.$i18n.locale = language;
            if(language === 'ar') {
                document.documentElement.dir = "rtl";
            }
            else {
                document.documentElement.dir = "ltr";
            }
            location.href="/lang/"+language;
        },
        quickUpdate() {
            alert(this.lang + ' ' + this.currentLanguage + ' ' + this.$root.$i18n.locale);
        },
        resetState() {
            this.$store.dispatch('resetAllStates');
            console.log('State reset');
        }
    },
    computed: {
        toggleButtonStyle() {
            return window.getComputedStyle(this.$refs.dataToggleButton).display;
        },
    },
    filters: {
        capitalize(word) {
            return word.toUpperCase();
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
        margin: 0 !important;
    }

    .navbar-expand-lg {
        margin: 0 !important;
        padding: 0 !important;
    }


    .logo {
        width: auto;
        max-height: 80px;
    }

    html[dir="rtl"] .logo {
        width: 500px;
        height: 500px;
    }

    .navItems {
        display: flex;
        align-items: center;
        width: 100%;
        background-color: green;
        /* justify-content: center; */
        /* background-color: red; */
        
    }

    .navItem {
        display: inline;
        margin-left: 1rem;
        margin-right: 1rem;
        color: #333;
        text-decoration: none;
        font-size: 0.8rem;
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











    .newNavbar {
        width: 100%;
        /* background-color: green; */
        z-index: 1000;
        position: absolute fixed;
    }

    .newNavbarMainSection {
        display: flex;
        /* background-color: red; */
        align-items: center;
        width: 100%;
    }

    .newLogo {
        width: auto;
        max-height: 60px;
        margin-top: 1rem;
        margin-bottom: 1rem;
        
    }

    .newItem {
        text-decoration: none;
        font-size: 0.7rem;
        margin: 1rem;
        color: #333;
        /* background-color: red; */
    }

    .authSlot {
        display: flex;
        align-items: center;
        /* background-color: green; */
    }

    .newItem:hover {
        color: black;
        cursor: pointer;
    }

    .newLanguageSection {
        /* width: 5rem !important; */
        height: 100%;
        align-self: center;
        /* background-color: red; */
    }

    .newLanguage {
        width: 100%;
        font-size: 0.7rem;
    }

    .newLanguageButton:hover {
        background-color: #FFDB00;
    }

    .newToggleButton {
        width: 100%;
        border: none;
        /* background: green !important; */
        background: transparent;
    }

    .newLanguageButton {
        width: 100%;
    }

    .newDropdownLanguages {
        /* width: 3rem !important; */
    }

    .navigationDrawerSection {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: flex-start;
        /* background-color: green; */
    }

    .drawerItem {
        
        text-decoration: none;
        color: #333;
        
    }

    .drawerItem:hover {
        color: black;
    }

    .drawerAuthSlot {
        display: flex;
        flex-direction: column;
        /* background-color: red; */
        width: 100%;
    }
    
    .drawerLanguageSection {

    }

    .drawerToggleButton {
        width: 100%;
        background: transparent;
        border: none;
        padding: 0;
    }







    /*** RTL LTR Format  ***/
    html[dir="ltr"] .firstItem {
        margin-left: auto;
    }

    html[dir="rtl"] .firstItem {
        margin-right: auto;
    }

    html[dir="ltr"] .newLogo {
        margin-right: auto;
    }

    html[dir="rtl"] .newLogo {
        margin-left: auto;
    }

    html[dir="ltr"] .drawerHamburger {
        left: 0;
    }

    html[dir="rtl"] .drawerHamburger {
        right: 0;
    }

   





   



</style>
