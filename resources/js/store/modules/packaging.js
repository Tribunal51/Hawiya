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
        console.log(state);
    },
    setProducts: (state, products) => {
        state.products = [...products];
    },
    setPrice: (state, price) => {
        state.price = price;
    },
    setInfo: (state, payload) => {
        state.products = payload.products;
        state.price = payload.price;
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
    },
    setInfo: (store, payload) => {
        return new Promise((resolve, reject) => {
            store.commit('setInfo', payload);
            resolve();
        })
    },
    
    
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