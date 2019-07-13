import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import * as Cookies from 'js-cookie';

// import 'vuetify/dist/vuetify.min.css'; // Ensure you are using css-loader

import logodesign from './modules/logodesign';
import branding from './modules/branding';
import socialmedia from './modules/socialmedia';
import packaging from './modules/packaging';
import stationery from './modules/stationery';
import promotional from './modules/promotional';

Vue.use(Vuex);

import Vuetify from 'vuetify';
import { Ripple } from 'vuetify/lib/directives';

    Vue.use(Vuetify, {
        iconfont: 'md',
        directives: {
            Ripple
        }
    });

export default new Vuex.Store({
    
    modules: {
        logodesign,
        branding,
        socialmedia,
        packaging,
        stationery,
        promotional
    },
    plugins: [
        createPersistedState()
        // createPersistedState({
        //     getState: (key) => Cookies.getJSON(key),
        //     setState: (key,state) => Cookies.set(key, state, { expires: 1000, secure: true }),
        //     
        // })

        // createPersistedState({
        //     storage: {
        //         getItem: key => Cookies.getJSON(key),
        //         setItem: (key, value) => Cookies.set(key, value, { expires: 3, secure: true }),
        //         removeItem: key => Cookies.remove(key)
        //     }           
        // })
        //  createPersistedState({ storage: window.sessionStorage })

        //  createPersistedState({ storage: {
        //      getItem: key => Cookies.get(key),
        //      setItem: (key, value) => Cookies.set(key, value, { expires: 0.1, secure: true }),
        //      removeItem: key => Cookies.remove(key)
        //  }
        // })
         
    ],
    state: {
        user_id: null,
        verified: null
    },
    mutations: {
        setAuthUser: (state,user) => {
            state.user_id = user;
    
        },
        setVerifyUser: (state) => {
            state.verified = 1;
        },
        resetAllStates: (state) => {
            console.log('Inside Global Reset');
            
        }
    },
    actions: {
        setAuthUser: (store,user) => {
            store.commit('setAuthUser', user);
        },
        setVerifyUser: (store) => {
            store.commit('setVerifyUser');
        },
        resetAllStates: ({ dispatch }) => {
            //store.commit('resetAllStates');
            dispatch('logodesign/resetState');
            dispatch('branding/resetState');
            dispatch('socialmedia/resetState');
            dispatch('stationery/resetState');
            dispatch('packaging/resetState');
            dispatch('promotional/resetState');
        }
    }
})

