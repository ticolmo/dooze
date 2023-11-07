import { useEffect, useState } from "react"

export default function SheetMail({onObjet, onTexte}) {
  const [objet, setObjet] = useState("")
  const [texte, setTexte] = useState("")
  /* 
  setObjet(
    ...objet,
    objet
  )  */
  useEffect(() => {
    onObjet(objet)
  }, [objet])

  return <>
  <div className="form-floating mb-3">
    <input type="text" className="form-control" id="floatingInput" placeholder="Objet" defaultValue={objet}/>
    <label htmlFor="floatingInput">Objet</label>
  </div>
  <div className="form-floating mb-3">
    <textarea className="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style={{height:"100px"}} defaultValue={texte} ></textarea>
    <label htmlFor="floatingTextarea2">Texte</label>
  </div>
  </>
}
