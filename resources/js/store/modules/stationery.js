const namespaced = true;

const state = {
    logo_photo: null,
    comment: null,
    price: null
}

const initialState = {
    logo_photo: null,
    comment: null,
    price: null
}

const mutations = {
    resetState: (state) => {
        console.log('Inside resetState');
        Object.assign(state, initialState);
    },
    setStationery: (state, payload) => {
        state.logo_photo = payload.logo_photo;
        state.comment = payload.comment;
    }
}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setStationery: (store, payload) => {
        store.commit('setStationery', payload);
    }
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if(key !== 'price') {
                if(store[key] === null || store[key] === '') {
                    return false;
                }
            }
        }
        return true;
    }
}

export default {
    namespaced,
    mutations,
    actions,
    getters,
    state
}