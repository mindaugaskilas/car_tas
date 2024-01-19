import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import { routes } from './routes'
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import SimpleInput from './components/form/Input.vue';
import SimpleSelect from './components/form/Select.vue';
import App from './App.vue'
import axios from 'axios';

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const app = createApp(App);
app.use(router);
// app.use(BootstrapVue);
// app.use(IconsPlugin);
app.config.globalProperties.axios = axios.create({
    baseURL: 'http://localhost/'
});
app.component('SimpleInput', SimpleInput);
app.component('SimpleSelect', SimpleSelect);
app.mount('#app');
