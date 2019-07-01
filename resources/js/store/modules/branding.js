const namespaced = true;

const state = {

}

const initialState = {

}

const mutations = {
    resetState: (state) => {
        console.log('Inside ResetState');
        Object.assign(state, defaultState);
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