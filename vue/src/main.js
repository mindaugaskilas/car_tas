import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";
import SimpleInput from "./components/form/Input.vue";
import SimpleSelect from "./components/form/Select.vue";
import App from "./App.vue";
import axios from "axios";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import LinkButton from "./components/parts/LinkButton.vue";
import ResponsiveTable from "./components/parts/ResponsiveTable.vue";

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp(App);
app.use(router);
app.config.globalProperties.axios = axios.create({
  baseURL: "http://localhost/",
});

app.component("LinkButton", LinkButton);
app.component("ResponsiveTable", ResponsiveTable);
app.component("SimpleInput", SimpleInput);
app.component("SimpleSelect", SimpleSelect);
app.mount("#app");
