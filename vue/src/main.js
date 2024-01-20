import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import { routes } from './routes'
import SimpleInput from './components/form/Input.vue';
import SimpleSelect from './components/form/Select.vue';
import App from './App.vue'
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const app = createApp(App);
app.use(router);
app.config.globalProperties.axios = axios.create({
    baseURL: 'http://localhost/'
});
app.component('SimpleInput', SimpleInput);
app.component('SimpleSelect', SimpleSelect);
app.mount('#app');
