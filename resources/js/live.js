import axios from 'axios';
import './bootstrap';
const nom = document.getElementById('name')
const message = document.getElementById('message')
const liveid = document.getElementById('liveid')
const submit = document.getElementById('submit')

/* submit.addEventListener("click", () => {
    
        console.log('asfsa')
     
  }); */

  message.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        axios.post('/live/get',{
            name : nom.value,
            message : message.value,
            liveid : liveid.value

        })
        event.target.value = ''
    }
  });

  /* pour écouter le channel et afficher les messages */

  window.Echo.channel('live')
  .listen('.live-message', (event) => {
    console.log(event)
  })

  /* ecoute du channel live.id se trouvant dans route.channel  */
  window.Echo.private('live' + Live.id)
    .listen(/* ... */)

/* configuration Vue */

/* import { createApp } from "vue"
import session from "./sessionLive.vue"
import formpost from "./components/formPost.vue"
import listpost from "./components/listPost.vue"




const app = createApp({});
app.component('sessionLive', session);
app.component('formPost', formpost);
app.component('listPost', listpost);



app.mount('#app'); */
 

