import { useEffect, useState } from "react"
import listeTimezone from "../api/listeTimezone.js"
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default function Timezone({fuseauHoraire, heureActuelle}) {
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

    axios.get('/api/timezone/', {
      params: {
        fuseau: e.currentTarget.getAttribute('data-id'),
      },
    })
      .then((response) => {
        console.log(response.status)
      })
      .catch((error) => {
        console.log(error);
      });

  }

  


    return <>
     <div>
      <div id="selectionHoraire" onClick={visibleProposition}>Fuseau horaire: {timezone} - {heureActuelle} </div>
      { proposition &&  liste.map(fuseau => (<div key={fuseau.tzCode} className="propositionHoraire" data-id={fuseau.tzCode} onClick={handleTimezone}> {fuseau.tzCode} </div>))}
    </div>
    
    </>
   
  }
  