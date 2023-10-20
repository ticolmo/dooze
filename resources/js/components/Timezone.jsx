import { useEffect, useState } from "react"
import listeTimezone from "../api/listeTimezone.js"
import axios from "axios"

export default function Timezone({fuseauHoraire}) {
  const [timezone, setTimezone] = useState(fuseauHoraire)
  const [proposition, setProposition] = useState(false)
  const visibleProposition = () => {
    setProposition(!proposition)
  }
  const liste = listeTimezone()
  const handleTimezone = (e) =>{
    e.preventDefault()
    e.stopPropagation()
    setTimezone(e.currentTarget.getAttribute('data-id'))
    setProposition(!proposition)

    axios.get('/', {
      params: {
        fuseau: e.currentTarget.getAttribute('data-id'),
      },
    })
      .then((response) => {
         // Cibler l'élément avec l'ID "creme" dans la page
         const cremeElementDansLaPage = document.getElementById('tableauScores');

         // Vérifier si l'élément dans la page existe
         if (cremeElementDansLaPage) {
           // Cibler l'élément avec l'ID "creme" dans la réponse
           const div = document.createElement('div');
           div.innerHTML = response.data;
           const cremeElementDansLaReponse = div.querySelector('#tableauScores');
 
           // Vérifier si l'élément dans la réponse existe
           if (cremeElementDansLaReponse) {
             // Remplacer le contenu de l'élément dans la page par le contenu de l'élément dans la réponse
             cremeElementDansLaPage.innerHTML = cremeElementDansLaReponse.innerHTML;
           } else {
             console.log("Élément 'creme' dans la réponse non trouvé");
           }
         } else {
           console.log("Élément 'creme' non trouvé dans la page");
         }
      })
      .catch((error) => {
        console.log(error);
      });

  }

  


    return <>
     <div>
      <div id="selectionHoraire" onClick={visibleProposition}>Fuseau horaire: {timezone} </div>
      { proposition &&  liste.map(fuseau => (<div key={fuseau} className="propositionHoraire" data-id={fuseau} onClick={handleTimezone}> {fuseau} </div>))}
    </div>
    
    </>
   
  }
  