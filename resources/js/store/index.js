import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import * as Cookies from 'js-cookie';
import Vuetify from 'vuetify';
// import 'vuetify/dist/vuetify.min.css'; // Ensure you are using css-loader

import logodesign from './modules/logodesign';
import branding from './modules/branding';


Vue.use(Vuex);
Vue.use(Vuetify, {
    iconfont: 'md'
});

const store = new Vuex.Store({
    
})

export default new Vuex.Store({
    
    modules: {
        logodesign,
        branding
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
        }
    },
    actions: {
        setAuthUser: (store,user) => {
            store.commit('setAuthUser', user);
        },
        setVerifyUser: (store) => {
            store.commit('setVerifyUser');
        }
    }
})

