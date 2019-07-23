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
        console.log('Inside ResetState, Packaging');
        Object.assign(state, initialState);
    },
    setProducts: (state, products) => {
        state.products = [...products];
    },
    setPrice: (state, price) => {
        state.price = price;
    }
}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setProducts: (store, products) => {
        store.commit('setProducts', products);
    },
    setPrice: (store, price) => {
        store.commit('setPrice', price);
    }
    
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if(store[key] === null || store[key] === '') {
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