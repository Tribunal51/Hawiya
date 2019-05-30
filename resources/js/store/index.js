import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import * as Cookies from 'js-cookie';
import Vuetify from 'vuetify';
// import 'vuetify/dist/vuetify.min.css'; // Ensure you are using css-loader

import logodesign from './modules/logodesign';


Vue.use(Vuex);
Vue.use(Vuetify, {
    iconfont: 'md'
});

const store = new Vuex.Store({
    
})

export default new Vuex.Store({
    
    modules: {
        logodesign
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
        user_id: null
    },
    mutations: {
        setAuthUser: (state,user) => {
            state.user_id = user;
    
        }
    },
    actions: {
        setAuthUser: (store,user) => {
            store.commit('setAuthUser', user);
        },
    }
})

export function resetState() {
    store.replaceState
}