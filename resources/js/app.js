import './bootstrap';
import { createApp } from 'vue';
import {createRouter, createWebHashHistory}  from 'vue-router'
import Index from "./components/Index.vue";
import HomeComponent from "./components/HomeComponent.vue";
import NewsComponent from "./components/NewsComponent.vue";

const routes = [
    { path: '/', component: HomeComponent },
    { path: '/news', component: NewsComponent },
]

const router = createRouter({
    history:createWebHashHistory(),
    routes,
})

export default router

const app = createApp({})
app.component('index', Index)
app.use(router)
app.mount('#app')

