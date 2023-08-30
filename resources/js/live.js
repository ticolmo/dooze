import './bootstrap';
import { createApp } from "vue"
import formpost from "./components/formPost.vue"
import listpost from "./components/listPost.vue"

/* configuration Vue */
const app = createApp({});
app.component('formPost', formpost);
app.component('listPost', listpost);


app.mount('#app');

