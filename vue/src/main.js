import { createApp, reactive } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";
import SimpleInput from "./components/form/Input.vue";
import SimpleSelect from "./components/form/Select.vue";
import App from "./App.vue";
import axios from "axios";
import LinkButton from "./components/parts/LinkButton.vue";
import ResponsiveTable from "./components/parts/ResponsiveTable.vue";
import CarFilter from "./components/parts/Filter.vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export const store = reactive({
  filter: {},
});

const app = createApp(App);
app.use(store);
app.use(router);
app.config.globalProperties.axios = axios.create({
  baseURL: "http://localhost/",
});

app.component("LinkButton", LinkButton);
app.component("ResponsiveTable", ResponsiveTable);
app.component("CarFilter", CarFilter);
app.component("SimpleSelect", SimpleSelect);
app.component("SimpleInput", SimpleInput);
app.component("SimpleSelect", SimpleSelect);

app.mount("#app");
