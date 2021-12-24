import { createRouter, createWebHistory } from "vue-router";
import store from "../store";

import Login from "../views/Login.vue";
import Dashboard from "../views/Dashboard.vue";
import Staffs from './staffs'

const routes = [{
        path: "/",
        redirect: "/login"
    },
    {
        path: "/login",
        name: "login",
        component: () => Login,
        meta: {
            guard: 'guest'
        }
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => Dashboard,
        meta: {
            requiresAuth: true,
            guard: 'auth'
        },
    },
    ...Staffs,
    {
        path: "/:pathMatch(.*)*",
        name: "not-found",
        component: () =>
            import ("../views/404"),
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "active",
});
router.beforeEach((to, from, next) => {
    const auth = store.state.Auth.auth
    if (to.matched.some(record => record.meta.guard === 'auth')) {
        if (!auth) {
            next({ name: 'login' })
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.guard === 'guest')) {
        if (auth) {
            next({ name: 'dashboard' })
        } else {
            next();
        }
    } else {
        next()
    }
});

export default router;