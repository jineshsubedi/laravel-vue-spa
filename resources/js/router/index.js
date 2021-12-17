import { createRouter, createWebHistory } from "vue-router";
import store from "../store";

import Login from "../views/Login.vue";
import Dashboard from "../views/Dashboard.vue";

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
});

function loggedIn() {
    return localStorage.getItem('token')
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.guard === 'auth')) {
        if (!loggedIn()) {
            next({ name: 'login' })
        } else {
            store.dispatch('getUser')
            next();
        }
    } else if (to.matched.some(record => record.meta.guard === 'guest')) {
        if (loggedIn()) {
            store.dispatch('getUser')
            next({ name: 'dashboard' })
        } else {
            next();
        }
    } else {
        next()
    }
});

export default router;