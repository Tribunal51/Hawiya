
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

    import LogoDesign from './components/OtherPages/LogoDesign/LogoDesign.vue';
    import LogoPackage from './components/OtherPages/LogoDesign/LogoPackage/LogoPackage.vue';
    import LogoType from './components/OtherPages/LogoDesign/LogoType/LogoType.vue';
    import Info from './components/OtherPages/LogoDesign/Info/Info.vue';
    import Profile from './components/OtherPages/Profile/Profile';
    import Payment from './components/OtherPages/Payment/Payment';
    import store from './store';
    import NotFound from './components/UI/NotFound';
    import ConfirmOrder from './components/OtherPages/ConfirmOrder/ConfirmOrder';
    // import 'vuetify/src/stylus/app.styl';

    Vue.use(VueRouter);
    const routes = [
        {name: 'about', path: '/about', component: AboutUs, props: true},
        {path: '/terms', component: Terms},
        {name: 'profile', path: '/profile', component: Profile, props: true},
        {
            path: '/design', 
            component: Design,
            props: true,
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
                        // {
                        //     path: 'style',
                        //     component: Style
                        // },
                        // {
                        //     name: 'color',
                        //     component: Color
                        // },
                        // {
                        //     name: 'form',
                        //     component: Form
                        // }
                        {   
                            name: 'logoinfo',
                            path: 'info',
                            component: Info
                        }
                    ]
                }, 
                {
                    path: 'social-media',
                    component: AboutUs
                }
            ]
        },
        {path: '/confirm-order', component: ConfirmOrder},
        {path: '/', component: HomePage},
        {path: '*', component: NotFound}       
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

    

    

const app = new Vue({
    el: '#app',
    router,
    store,
});
