const namespaced = true;

const state = {
    package: null,
    logo_photo: null,
    comment: null
}

const initialState = {
    package: null,
    logo_photo: null,
    comment: null
}

const mutations = {
    resetState: (state) => {
        console.log('Inside ResetState');
        Object.assign(state, initialState);
    }
}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    }
}

const getters = {

}

export default {
    namespaced,
    state,
    actions,
    mutations,
    getters
}