import sharedMutations from 'vuex-shared-mutations';
import Csrf from '../../helpers/Csrf';
import Auth from '../../endpoints/Auth';

const state = {
    user: {},
    auth: false,
    role: '',
}
const getters = {
    user(state) {
        return state.user;
    },
    role(state) {
        return state.user.role
    },
    auth(state) {
        return state.auth
    }
}
const mutations = {
    setUser(state, payload) {
        state.user = payload;
    },
    setAuth(state, payload) {
        state.auth = payload
    },
    setRole(state, payload) {
        state.role = payload
    }
}

const actions = {

    async login({ commit }, payload) {
        try {
            await Csrf.getCookie();
            await Auth.login(payload).then((res) => {
                const user = res.data.data.user
                    // localStorage.setItem('token', res.data.data.access_token)
                commit('setAuth', true)
                commit('setUser', res.data.data.user)
                commit('setRole', res.data.data.user.role)
                    // localStorage.setItem('auth', true)
                    // localStorage.setItem("user", JSON.stringify(user));
            }).catch((err) => {
                throw err.response
            });
        } catch (e) {
            throw e
        }
    },
    async logout({ commit }) {
        await Auth.logout().then((res) => {
            commit('setAuth', false)
                // localStorage.clear()
            delete http.defaults.headers.common["Authorization"];
        }).catch((err) => {

        })
    },
    async getUser({ commit }) {
        await Auth.getUser().then((res) => {
            commit('setUser', res.data)
            commit('setRole', res.data.role)
            commit('setAuth', true)
                // localStorage.setItem("user", JSON.stringify(res.data));
        }).catch((err) => {
            throw err.response
        })
    }
}
const plugins = [sharedMutations({ predicate: ['setUser', 'setAuth', 'setRole'] })]

export default {
    state,
    getters,
    actions,
    mutations,
    plugins
}