export default [
    {
        path: "",
        component: require(".././components/frontendComponents/pages/home.vue")
            .default
    },
    {
        path: "/contact",
        component: require(".././components/frontendComponents/pages/contact.vue")
            .default
    },
    {
        path: "/about-us",
        component: require(".././components/frontendComponents/pages/about_us.vue")
            .default
    },
    {
        path: "/whan_login",
        component: require(".././components/frontendComponents/pages/login.vue")
            .default
    },
    {
        path: "/login",
        component: require(".././components/frontendComponents/pages/login.vue")
            .default
    },
    {
        path: "/whan_register",
        component: require(".././components/frontendComponents/pages/register.vue")
            .default
    },
    {
        path: "/gallery",
        component: require(".././components/frontendComponents/pages/gallery.vue")
            .default
    },
    {
        path: "/donate",
        component: require(".././components/frontendComponents/pages/donate.vue")
            .default
    },
    {
        path: "/404",
        name: "404",
        component: require(".././components/frontendComponents/pages/NotFound.vue")
            .default
    },
    { path: "*", redirect: "/404" }
];
