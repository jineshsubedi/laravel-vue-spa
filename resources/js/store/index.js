import { createStore } from 'vuex'
import createPersistedState from "vuex-persistedstate";

import Auth from './Modules/auth'

export default createStore({

    modules: {
        Auth,
        plugins: [createPersistedState()],
    }
})