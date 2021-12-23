import sharedMutations from 'vuex-shared-mutations';
import Csrf from '../../helpers/Csrf';
import Auth from '../../endpoints/Auth';

const state = {
    user: JSON.parse(localStorage.getItem("user")) || {},
    auth: localStorage.getItem("auth") || false,
    role: localStorage.getItem("role") || "",
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
                commit('setAuth', true)
                commit('setUser', res.data.data.user)
                commit('setRole', res.data.data.user.staffType)
                localStorage.setItem('role', res.data.data.user.staffType)
                localStorage.setItem('auth', true)
                localStorage.setItem("user", JSON.stringify(res.data.data.user));
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
            localStorage.clear()
            delete http.defaults.headers.common["Authorization"];
        }).catch((err) => {

        })
    },
    async getUser({ commit }) {
        await Auth.getUser().then((res) => {
            commit('setUser', res.data.data)
            commit('setRole', res.data.data.staffType)
            commit('setAuth', true)
            localStorage.setItem("user", JSON.stringify(res.data.data));
            localStorage.setItem("role", res.data.data.staffType);
            localStorage.setItem("auth", true);
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