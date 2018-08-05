import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";

import FaqBot from "./components/FaqBot/FaqBot.vue";

require("./bootstrap");

window.Vue = require("vue");

Vue.use(Vuetify);

Vue.component("faqbot", FaqBot);

// QUESTIONS
Vue.component(
  "questions",
  require("./components/Vuetify/Questions/Questions.vue")
);
Vue.component("list", require("./components/Vuetify/Questions/List.vue"));

const app = new Vue({
  el: "#app"
});
