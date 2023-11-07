import WriteMail from './components/WriteMail.jsx'
import PreviewMail from './components/PreviewMail.jsx'
import { useState } from 'react'

export default function NewMail() {
  const [mail, setMail] = useState([])  
  return <>
    <WriteMail onPreview={setMail} ></WriteMail>
    <PreviewMail mail={mail} ></PreviewMail>
  
  </>
}



