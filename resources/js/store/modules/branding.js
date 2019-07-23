const namespaced = true;

const state = {
    package: null,
    logo_photo: null,
    comment: null,
    price: null
}

const initialState = {
    package: null,
    logo_photo: null,
    comment: null,
    price: null
}

const mutations = {
    resetState: (state) => {
        console.log('Inside ResetState Branding');
        Object.assign(state, initialState);
    },
    setPackage: (state, payload) => {
        state.package = payload.package;
        state.price = payload.price;
    },
    setInfo: (state, payload) => {
        state.logo_photo = payload.image;
        state.comment = payload.comment;
    }
    
}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setPackage: (store, payload) => {
        store.commit('setPackage', payload);
    },
    setInfo: (store, payload) => {
        store.commit('setInfo', payload);
    }
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if(store[key] === 'null' || store[key] === '') {
                return false;
            }
        }
        return true;
    }
}

export default {
    namespaced,
    state,
    actions,
    mutations,
    getters
}

