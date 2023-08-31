import './bootstrap';
import { createApp } from "vue"
import session from "./sessionLive.vue"
import formpost from "./components/formPost.vue"
import listpost from "./components/listPost.vue"



/* configuration Vue */
const app = createApp({});
app.component('sessionLive', session);
app.component('formPost', formpost);
app.component('listPost', listpost);



app.mount('#app');

