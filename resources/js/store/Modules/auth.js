import sharedMutations from 'vuex-shared-mutations';
import createPersistedState from "vuex-persistedstate";
import axios from 'axios';

const state = {
    user: null,
    loggedIn: false
}
const getters = {
    user(state) {
        return state.user;
    },
    status(state) {
        return state.loggedIn
    },
    verified(state) {
        if (state.user) return state.user.email_verified_at
        return null
    },
    id(state) {
        if (state.user) return state.user.id
        return null
    },
    role(state) {
        if (state.user) return state.user.role
        return null
    },
    isLoggedIn(state) {
        if (state.user != null) {
            return true;
        }
        return false;
    }
}
const mutations = {
    setUser(state, payload) {
        state.user = payload;
    },
    setStatus(state, payload) {
        state.isLoggedIn = payload
    }
}

const actions = {

    async login({ dispatch, commit }, payload) {
        try {
            await axios.get('/sanctum/csrf-cookie');

            await axios.post('/api/v1/login', payload).then((res) => {
                const user = res.data.data.user
                localStorage.setItem('token', res.data.data.access_token)
                localStorage.setItem("user", JSON.stringify(user));
                dispatch('getUser');
            }).catch((err) => {
                throw err.response
            });
        } catch (e) {
            throw e
        }
    },
    async logout({ commit }) {
        await axios.post('/api/v1/logout').then((res) => {
            localStorage.removeItem('token')
            commit('setUser', null);
        }).catch((err) => {

        })
    },
    async getUser({ commit }) {
        await axios.get('/api/v1/user').then((res) => {
            console.log('get user')
            console.log(res)
            commit('setUser', res.data);
        }).catch((err) => {
            console.log(err)
            throw (err.response)
        })
    },
}
const plugins = [createPersistedState()]

export default {
    state,
    getters,
    actions,
    mutations,
    plugins
}