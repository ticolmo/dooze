import { useEffect, useState } from "react"
import SheetMail from './form/SheetMail'
import axios from "axios"

export default function WriteMail() {

    const [member, setMember] = useState("Recherchez...")
    const [club, setClub] = useState("Selectionnez...")
    const [codeDestinataire, setCodeDestinataire] = useState(3)
    useEffect(() => {
      axios.get('http://dooze.test:8089/api/admin/mailbox')
      .then((response) => {
        console.log(response)
        setMember ({
          ...member,
          pseudo : response.data.member.name,
          id : response.data.member.id
        });
        setClub({
          ...club,
          name : response.data.club.name,
          id : response.data.club.id
        })
        
      })
      .catch((error) => {
        console.log(error);
      });
      ;
    }, [])



  return <>
  
    <SheetMail> </SheetMail>
   
    
  </>
}
