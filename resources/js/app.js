require('./bootstrap');

import { createApp } from 'vue'

import { VueCookieNext } from 'vue-cookie-next'

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
import "./assets/css/adminlte.min.css";
window.$ = window.jQuery = require("jquery");
import "./assets/js/adminlte.min.js";

import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

import BaseLayout from "./layouts/wrappers/Main";

createApp(App)
    .component("base-layout", BaseLayout)
    .use(router)
    .use(store)
    .use(VueProgressBar, options)
    .use(VueCookieNext)
    .mount("#app");