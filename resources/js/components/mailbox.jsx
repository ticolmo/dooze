import NewMail from './mail/NewMail.jsx'
import ListMail from './mail/ListMail.jsx'

export default function mailbox() {
  return <div className="mx-auto p-2 w-50">
    <NewMail></NewMail>
    <ListMail></ListMail>    
  </div>
    
  
}
