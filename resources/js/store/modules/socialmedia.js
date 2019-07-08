const namespaced = true;

const state = {
    package: null,
    logo_photo: null,
    postsNumber: null,
    posts: null,
    price: null
};

const initialState = {
    package: null,
    logo_photo: null,
    postsNumber: null,
    posts: null,
    price: null
}

const mutations = {
    resetState: (state) => {
        console.log('Inside ResetState');
        Object.assign(state, initialState);
    },
    setPackage: (state, payload) => {
        state.package = payload.packageTitle;
        state.postsNumber = payload.posts;
    },
    setLogo: (state, file) => {
        state.logo_photo = file;
    },
    setPosts: (state, posts) => {
        state.posts = [...posts];
    }

}

const actions = {
    resetState: (store) => {
        store.commit('resetState');
    },
    setPackage: (store, payload) => {
        store.commit('setPackage', payload);
    },
    setLogo: (store, file) => {
        store.commit('setLogo', file);
    },
    setPosts: (store, posts) => {
        store.commit('setPosts', posts);
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
    state,
    getters,
    mutations,
    actions
}

