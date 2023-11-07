import { useEffect, useState } from "react"

export default function SearchMember({members, destinataire}) {  
  const [state, setstate] = useState(false)
  useEffect(() => {
    if(destinataire == "1"){
      setstate(true)
      
    }else{
      setstate(false)
    }
  }, [destinataire])
  

  return <div className="mb-4 w-100">  
  
  {state ? <input className="form-control" name="member" list="datalistOptions" id="exampleDataList" placeholder="Recherche un membre"/> :
     <input className="form-control" placeholder="Recherche un membre" disabled/>
  }     
    <datalist id="datalistOptions">
    {members.map(member => (<option key={member.id} value={member.pseudo}/> ) )}      
    </datalist>
  </div>
}
