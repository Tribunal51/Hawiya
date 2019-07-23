import { isArray } from "util";

const namespaced = true;

const state = {
    items: null,
    price: null
}

const initialState = {
    items: null,
    price: null 
}

const mutations = {
    resetState: (state) => {
        console.log('Inside ResetState Promotional');
        Object.assign(state, initialState);
    },
    setItems: (state, payload) => {
        state.items = [...payload.items];
        state.price = payload.price;
    },

}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setItems: (store, payload) => {
        store.commit('setItems', payload);
    }
}

const getters = {
    isValid: (store) => {
        if(store['items'] === null || store['items'] === '') {
            return false;
        }
        if(!isArray(store['items']) || store['items'].length < 1) {
            return false;
        }
        return true;
    }
}

export default {
    namespaced,
    state,
    getters,
    mutations,
    actions
}