import './bootstrap';
import { createApp } from 'vue';
import App from "./components/App.vue";
import router from "../js/router";

const app = createApp({})
app.component('App', App)
app.use(router)
app.mount('#app')
import './card';


