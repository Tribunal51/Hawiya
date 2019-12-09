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
        console.log('Inside resetState Stationery');
        Object.assign(state, initialState);
    },
    setPackage: (state, payload) => {
        state.package = payload.package;
        state.price = payload.price;
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
    setPackage: (store, payload) => {
        store.commit('setPackage', payload);
    },
    setStationery: (store, payload) => {
        store.commit('setStationery', payload);
    }
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if(store[key] === null || store[key] === '') {
                return false;
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





