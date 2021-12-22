require('./bootstrap');

import { createApp } from 'vue'

import App from './components/App.vue'
import router from './router'
import store from './store'
import VueProgressBar from "@aacassandra/vue3-progressbar";
const options = {
    color: "#bffaf3",
    failedColor: "#874b4b",
    thickness: "5px",
    transition: {
        speed: "0.5s",
        opacity: "0.6s",
        termination: 300,
    },
    autoRevert: true,
    location: "top",
    inverse: false,
};

createApp(App)
    .use(router)
    .use(store)
    .use(VueProgressBar, options)
    .mount("#app");