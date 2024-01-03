import "./bootstrap";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes.js";
// import Validator from "simple-vue-validator";
// import validate_plugin from "./validator_JS/validate_plugin.js";

createApp(App).use(router).mount("#app");
// createApp(App).use(router).use(validate_plugin).use(Validator).mount("#app");
