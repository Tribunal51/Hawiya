const namespaced = true;

const state = {
    package: null,
    logotype: null,
    style: null,
    color: null,
    form: null,
    font: null,
    branding: false,
    price: null
};

const defaultState = {
    package: null,
    logotype: null,
    style: null,
    color: null,
    form: null,
    font: null,
    branding: false,
    price: null
    
};

const mutations = {
    resetState: (state) => {
        // state = getDefaultState();
        console.log('Inside resetState function');
        Object.assign(state, defaultState);
    },
    setPackage: (state, logoPackage) => {
        state.package = logoPackage;
    },
    setType: (state, type) => {
        state.logotype = [...type];
    },
    setFont: (state, font) => {
        state.font = font;
    },
    setInfo: (state, payload) => {
        state.style = {...payload.style};
        state.color = [...payload.color];
        state.form = {...payload.form};
    },
    deleteKey: (state, key) => {
        delete state[key];
        console.log('Key',key,'deleted');
    },
    setBranding: (state) => {
        state.branding = true;
    }
    
}

const actions = {
    setPackage: (store, logoPackage) => {
        
        store.commit('setPackage', logoPackage);
        // setTimeout(()=> {
            
        //     store.commit('setPackage', logoPackage);
        // },4000);
        
    },
    setType: (store, type) => {
        console.log('Inside store type', type);
        store.commit('setType', type);
    },
    setFont: (store, font) => {
        store.commit('setFont', font);
    },
    setInfo: (store, payload) => {
        store.commit('setInfo', payload);
    },
    setBranding: (store) => {
        store.commit('setBranding');
    },
    resetState: (store) => {
        store.commit('resetState');
    },
    deleteKey: (store, key) => {
        store.commit('deleteKey', key);
    },
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if((store[key] === null || store[key] === '') && (key !== 'price')) {
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
    getters,
    mutations,
}