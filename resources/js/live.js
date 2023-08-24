import './bootstrap';
import { createApp } from "vue";
import rechercheclubs from "./components/rechercheClubs.vue";

/* configuration Vue */
const app = createApp({});
app.mount('#app');

app.component('rechercheclubs', rechercheclubs);