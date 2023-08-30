import './bootstrap';
import { createApp } from "vue"
import formpost from "./components/formPost.vue"
import listpost from "./components/listPost.vue"
import encartclub from "./components/encartClub.vue"

/* configuration Vue */
const app = createApp({});
app.component('formPost', formpost);
app.component('listPost', listpost);
app.component('encartClub', encartclub);


app.mount('#app');

