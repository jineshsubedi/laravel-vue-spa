import { createStore } from 'vuex'

import Auth from './Modules/auth'

export default createStore({

    modules: {
        Auth,
    }
})