export default [{
    path: "/staffs/profile",
    name: "staffs.profile",
    component: () =>
        import ('../views/staffs/profile'),
    meta: {
        guard: 'auth'
    }
}, ]