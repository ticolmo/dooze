import { useEffect, useState } from "react"

export default function SearchClub({clubs, destinataire}) {
  const [state, setstate] = useState(false)
  useEffect(() => {
    if(destinataire == "2"){
      setstate(true)
      
    }else{
      setstate(false)
    }
  }, [destinataire])
  

  return <div className="mb-4 w-100">
    {state ?
    <select className="form-select" name="club" aria-label="Default select example">   
    <option defaultValue>Choisis ton club</option>
    {clubs.map(club => (<option key={club.id} value={club.id}> {club.name} </option>) )} 
    </select>
    :    
    <select className="form-select" disabled></select>
    }
  </div>
}

