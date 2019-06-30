const namespaced = true;

const state = {
    package: null,
    logotype: null,
    style: null,
    color: null,
    form: null,
    files: null
};

const defaultState = {
    package: null,
    logotype: null,
    style: null,
    color: null,
    form: null,
    files: null
    
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
    setInfo: (state, payload) => {
        state.style = {...payload.style};
        state.color = [...payload.color];
        state.form = {...payload.form};
        state.files = {...payload.files};
    },
    deleteKey: (state, key) => {
        delete state[key];
        console.log('Key',key,'deleted');
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
    setInfo: (store, payload) => {
        store.commit('setInfo', payload);
    },
    resetState: (store) => {
        store.commit('resetState');
    },
    deleteKey: (store, key) => {
        store.commit('deleteKey', key);
    },
}

const getters = {
    getForm: (store) => {
        return store.form;
    },
    getPackage: (store) => {
        return store.package;
    },
    getLogotype: (store) => {
        return store.logotype;
    },
    getStyle: (store) => {
        return store.style;
    },
    getColor: (store) => {
        return store.color;
    },
    isLoggedIn: (state) => {
        return state.user_id !== -1;
    },
    getDefaultState: (state) => {
        return this.defaultState;
    }
}

export default {
    namespaced,
    state,
    actions,
    getters,
    mutations,
}