
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-page', require('./components/HomePage/HomePage.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('profile', require('./components/HomePage/Profile/Profile.vue').default);
Vue.component('navbar', require('./components/HomePage/Navbar.vue').default);
Vue.component('payment', require('./components/OtherPages/Payment/Payment').default);
Vue.component('confirm-order', require('./components/OtherPages/ConfirmOrder/ConfirmOrder.vue').default);
Vue.component('page-footer', require('./components/UI/Footer.vue').default);
Vue.component('dashboard', require('./components/OtherPages/Dashboard/Dashboard').default);
Vue.component('logodesign-report', require('./components/OtherPages/Report/LogoDesign').default);
Vue.component('settings', require('./components/OtherPages/Dashboard/Settings').default);
Vue.component('meet-the-team', require('./components/HomePage/WhatWeDo/MeetTheTeam').default);
Vue.component('google-login', require('./components/UI/GoogleLogin').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

    import Vue from 'vue';
    import VueRouter from 'vue-router';

    import AboutUs from './components/OtherPages/AboutUs.vue';
    import Terms from './components/OtherPages/Terms.vue';
    import HomePage from './components/HomePage/HomePage.vue';

    import Design from './components/OtherPages/Design/Design.vue';

    import LogoDesign from './components/OtherPages/Design/LogoDesign/LogoDesign.vue';
    import LogoPackage from './components/OtherPages/Design/LogoDesign/LogoPackage/LogoPackage.vue';
    import LogoType from './components/OtherPages/Design/LogoDesign/LogoType/LogoType.vue';
    import LogoFont from './components/OtherPages/Design/LogoDesign/LogoFont/LogoFont';
    import Info from './components/OtherPages/Design/LogoDesign/Info/Info.vue';

    import Branding from './components/OtherPages/Design/Branding/Branding';
    import BrandingPackage from './components/OtherPages/Design/Branding/Package/Package';
    import BrandingInfo from './components/OtherPages/Design/Branding/Info/Info';

    import SocialMedia from './components/OtherPages/Design/SocialMedia/SocialMedia';
    import SocialMediaPackage from './components/OtherPages/Design/SocialMedia/Package/Package';
    import SocialMediaInfo from './components/OtherPages/Design/SocialMedia/Info/Info';

    import Stationery from './components/OtherPages/Design/Stationery/Stationery';
    // import StationeryPackage from './components/OtherPages/Design/Stationery/Package/Package';
    // import StationeryProducts from './components/OtherPages/Design/Stationery/Info/Info';
    import StationeryItems from './components/OtherPages/Design/Stationery/Items/Items';

    import Packaging from './components/OtherPages/Design/Packaging/Packaging';
    import PackagingProducts from './components/OtherPages/Design/Packaging/Products';
    import PackagingProductsUpgrade from './components/OtherPages/Design/Packaging/upgrade/Products/Products';
    import PackagingModifyProduct from './components/OtherPages/Design/Packaging/upgrade/ProductSettings/ProductSettings';
    import PackagingCheckout from './components/OtherPages/Design/Packaging/upgrade/Checkout/Checkout';

    import Promotional from './components/OtherPages/Design/Promotional/Promotional';

    import Profile from './components/OtherPages/Profile/Profile';

    import Payment from './components/OtherPages/Payment/Payment';

    import store from './store';

    import NotFound from './components/UI/NotFound';

    import ConfirmOrder from './components/OtherPages/ConfirmOrder/ConfirmOrder';

    import Home from './components/OtherPages/Dashboard/Home';
    import Dashboard from './components/OtherPages/Dashboard/Dashboard';
    import Settings from './components/OtherPages/Dashboard/Settings';
    import UserInfo from './components/OtherPages/Dashboard/Settings/UserInfo';
    import UserPassword from './components/OtherPages/Dashboard/Settings/UserPassword';
    import UserSupport from './components/OtherPages/Dashboard/Settings/Support';
    import GoogleLogin from './components/UI/GoogleLogin';
    import LogodesignReport from './components/OtherPages/Report/LogoDesign';
    
    // import 'vuetify/src/stylus/app.styl';

    import RingLoader from 'vue-spinner/src/RingLoader.vue';

    import Vuetify from 'vuetify';
    import { Ripple } from 'vuetify/lib/directives';

    import VueI18n from 'vue-i18n';

    Vue.use(Vuetify, {
        iconfont: 'md',
        directives: {
            Ripple
        }
    });

    Vue.use(VueRouter);
    const routes = [
        {name: 'about', path: '/about', component: AboutUs, props: true},
        {name: 'terms', path: '/terms', component: Terms},
        {name: 'profile', path: '/profile', component: Profile, props: true},
        {
            path: '/design', 
            component: Design,
            props: true,
            // beforeEnter: (to, from, next) => {
            //     this.$store.dispatch('resetAllStates');
            //     next();
            // },
            children: [
                {
                    path: 'logo-design',
                    component: LogoDesign,
                    children: [
                        {
                            name: 'logopackage',
                            path: 'package',
                            component: LogoPackage
                        },
                        {
                            name: 'logotype',
                            path: 'type',
                            component: LogoType
                        },
                        {
                            name: 'logofont',
                            path: 'font',
                            component: LogoFont,
                            beforeEnter: (to, from, next) => {
                                next();
                                // console.log('FROM', from);
                                // console.log('TO', to);
                                // console.log('NEXT', next);
                                // console.log(this.$router);
                                // // next();
                                // if(from.name === 'logotype' ) {
                                //     next();
                                // }
                                // else {
                                //     next('/');
                                // }
                            }
                        },
                        {   
                            name: 'logoinfo',
                            path: 'info',
                            component: Info
                        }
                    ]
                }, 
                {
                    path: 'branding',
                    component: Branding,
                    children: [
                        {
                            name: 'brandingpackage',
                            path: 'package',
                            component: BrandingPackage,
                        },
                        {
                            name: 'brandinginfo',
                            path: 'info',
                            component: BrandingInfo
                        }
                    ]
                },
                {
                    path: 'social-media',
                    component: SocialMedia,
                    children: [
                        {
                            name: 'socialmediapackage',
                            path: 'package',
                            component: SocialMediaPackage
                        },
                        {
                            name: 'socialmediainfo',
                            path: 'info',
                            component: SocialMediaInfo
                        }
                        
                    ]
                },
                {
                    path: 'stationery',
                    component: Stationery, 
                    children: [
                        // {
                        //     name: 'stationerypackage',
                        //     path: 'package',
                        //     component: StationeryPackage
                        // }, 
                        // {
                        //     name: 'stationeryproducts',
                        //     path: 'products',
                        //     component: StationeryProducts
                        // },
                        {
                            name: 'stationeryitems',
                            path: 'items',
                            component: StationeryItems
                        }
                    ]
                },
                {
                    path: 'packaging',
                    component: Packaging,
                    children: [
                        {
                            name: 'packagingproducts',
                            path: 'products',
                            component: PackagingProducts
                        }, 
                        {
                            name: 'packagingproductsupgrade',
                            path: 'updatedproducts',
                            component: PackagingProductsUpgrade
                        },
                        {
                            name: 'packagingmodifyproduct',
                            path: 'modify-product',
                            component: PackagingModifyProduct
                        },
                        {
                            name: 'packagingcheckout',
                            path: 'checkout',
                            component: PackagingCheckout
                        }
                    ]
                },
                {
                    name: 'promotionalinfo',
                    path: 'promotional',
                    component: Promotional
                }
            ]
        },
        {
            path: 'confirm-order', component: ConfirmOrder
        },
        {
            name: 'home',
            path: '/home',
            component: Home,
            // children: [
            //     {
            //         name: 'dashboardsettings',
            //         path: '/home/settings',
            //         component: Settings
            //     },
            //     {
            //         name: 'updateUserInfo',
            //         path: '/home/settings/info',
            //         component: UserInfo
            //     },
            //     {
            //         name: 'updateUserPassword',
            //         path: '/home/settings/password',
            //         component: UserPassword
            //     },
            //     {
            //         name: 'userSupport',
            //         path: '/home/settings/support',
            //         component: UserSupport
            //     }
            // ]
        },
        {
            name: 'dashboardsettings',
            path: '/home/settings',
            component: Settings
        },
        {
            name: 'updateUserInfo',
            path: '/home/settings/info',
            component: UserInfo
        },
        {
            name: 'updateUserPassword',
            path: '/home/settings/password',
            component: UserPassword
        },
        {
            name: 'userSupport',
            path: '/home/settings/support',
            component: UserSupport
        },
        {
            name: 'payment',
            path: '/payment',
            component: Payment
        },
        {
            name: 'root',
            path: '/',  
            component: HomePage
        },
        {
            path: '*', 
            component: NotFound
        }       
    ];

const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    mode: 'history',
    // scrollBehavior(to, from, savedPosition) {
    //     if(to.hash) {
    //         return {
    //             selector: to.hash,
    //             offset: {x:0, y:0}
    //         }
    //     }
    // }
});

const waitForStorageToBeReady = async (to, from, next) => {
    await store.restored;
    next();
}

router.beforeEach(waitForStorageToBeReady);

    



import { i18n, number } from './plugins/i18n';

Vue.mixin({
    methods: {
        number
    }
});

export const app = new Vue({
    el: '#app',
    router,
    store,
    i18n
});

// require('./react/components/Cover');
// require('./react/components/Test/Test');

