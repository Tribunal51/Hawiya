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
        console.log('Inside ResetState');
        Object.assign(state, initialState);
    },
    setPackage: (state, packageType) => {
        state.package = packageType;
    }
}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setPackage: (store, packageType) => {
        store.commit('setPackage', packageType);
    }
}

const getters = {
    isValid: (store) => {
        for(var key in store) {
            if((key !== 'price') && (store[key].package === 'null' || store[key].package === '')) {
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

