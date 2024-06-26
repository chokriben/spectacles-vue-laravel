import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from "vue-router";
import { routes } from "./routes";
import 'bootstrap/dist/css/bootstrap.min.css'
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/lara-light-green/theme.css'

import App from './App.vue'
import "@fortawesome/fontawesome-free/css/all.css";
import store from "./store"
let app = createApp(App)
const router = createRouter({
history: createWebHashHistory(),
routes: routes,
})
app.use(router);
app.use(router).use(PrimeVue);
app.use(store)

app.mount("#app")
