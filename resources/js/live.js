import axios from 'axios';
import './bootstrap';
const nom = document.getElementById('name')
const message = document.getElementById('message')
const liveid = document.getElementById('liveid')
const submit = document.getElementById('submit')

/* submit.addEventListener("click", () => {
    
        console.log('asfsa')
     
  }); */

  /* Choix d'un mot de passe ou pas à la création d'un live live.create.blade */
    $( ".passwordWanted" ).on( "click", function() {
      $( ".passwordDisplay" ).slideDown( "slow" );
    });
    $( ".passwordNoWanted" ).on( "click", function() {
      $( ".passwordDisplay" ).slideUp("slow" );
    });


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

  /* pour écouter le channel public et afficher les messages 

  window.Echo.channel('live')
  .listen('.live-message', (event) => {
    console.log(event)
  })
*/
  /* ecoute du channel live.id se trouvant dans route.channel  */
  window.Echo.join('live' + Live.id)
  .here((users) => {
      // ...
  })
  .joining((user) => {
      console.log(user.name);
  })
  .leaving((user) => {
      console.log(user.name);
  })
  .error((error) => {
      console.error(error);
  });


 

