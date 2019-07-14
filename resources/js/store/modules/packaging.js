const namespaced = true;

const state = {
    products: null,
    price: null
}

const initialState = {
    products: null,
    price: null
}

const mutations = {
    resetState: (state) => {
        Object.assign(state, initialState);
    },
    setProducts: (state, products) => {
        state.products = [...products];
    }
}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setProducts: (store, products) => {
        store.commit('setProducts', products);
    }
    
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if((key !== 'price') && (store[key] === null || store[key] === '')) {
                return false;
            }
            if((key === 'products') && (Array.isArray(store[key])) && (store[key].length < 1)) {
                return false;
            }
        }
        return true;
    }
}

export default {
    namespaced,
    state,
    mutations,
    actions,
    getters
}