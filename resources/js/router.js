import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './pages/Home.vue'
import About from './pages/About.vue'
import Blog from './pages/Blog.vue'
import SinglePostDetails from './pages/SinglePostDetails.vue'
import PageNotFound from './pages/PageNotFound.vue'
import Contact from './pages/Contact.vue'


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about-us",
            name: "about",
            component: About
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: "/blog/:slug",
            name: "post-details",
            component: SinglePostDetails
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact
        },
        {
            path: "/*",
            name: "page-not-found",
            component: PageNotFound
        },
    ]
});

export default router
