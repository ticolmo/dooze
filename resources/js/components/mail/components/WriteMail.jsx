import { useEffect, useState } from "react"
import SheetMail from './form/SheetMail'
import SearchMember from './form/SearchMember'
import SearchClub from './form/SearchClub'
import axios from "axios"

export default function WriteMail({onPreview}) {

  const [members, setMembers] = useState([])
  const [clubs, setClubs] = useState([])
  const [codeDestinataire, setCodeDestinataire] = useState(3)
  const [objet, setObjet] = useState("")
  const [texte, setTexte] = useState("")
  const [mail, setMail] = useState({
    destinataire: codeDestinataire,
    objet: objet,
    texte: texte,
  })
  useEffect(() => {
    axios.get('http://dooze.test:8089/api/admin/mailbox')
      .then((response) => {
        setMembers(response.data.member);
        setClubs(response.data.club)
      })
      .catch((error) => {
        console.log(error);
      });
    ;
  }, [])

  const handleCodeDestinataire = (e) => {
    setCodeDestinataire(e.target.value)
  }

  function handleSubmit(e) {
    // Empêche le navigateur de recharger la page
    e.preventDefault();

    // Lit les données du formulaire
    const form = e.target;
    const formData = new FormData(form);

    // Ou vous pouvez travailler avec comme un
    // objet simple :
    const formJson = Object.fromEntries(formData.entries());
    console.log(formJson);
  }




  return <>

    <form onSubmit={handleSubmit}>
      <div> Message:</div>
      <div className="mx-auto p-2 w-75">
        <div className="form-check">
          <input className="form-check-input" type="radio" name="codeDestinataire" id="flexRadioDefault1" value="1" onChange={handleCodeDestinataire} />
          <label className="form-check-label" htmlFor="flexRadioDefault1">
            Aux membre(s) suivant(s):
          </label>
        </div>
        <SearchMember members={members} destinataire={codeDestinataire} ></SearchMember>

        <div className="form-check">
          <input className="form-check-input" type="radio" name="codeDestinataire" id="flexRadioDefault2" value="2" onChange={handleCodeDestinataire} />
          <label className="form-check-label" htmlFor="flexRadioDefault2">
            Aux membres du club:
          </label>
        </div>
        <SearchClub clubs={clubs} destinataire={codeDestinataire} ></SearchClub>

        <div className="form-check mb-4">
          <input className="form-check-input" type="radio" name="codeDestinataire" id="flexRadioDefault3" value="3" onChange={handleCodeDestinataire} />
          <label className="form-check-label" htmlFor="flexRadioDefault3">
            A tous les membres
          </label>
        </div>
      </div>


      <SheetMail onObjet={setObjet} onTexte={setTexte} > </SheetMail>

      <button type="submit" className="btn btn-primary">Envoyer</button>

    </form>

  </>
}
