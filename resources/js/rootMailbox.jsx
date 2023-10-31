import { createRoot } from 'react-dom/client';
import React from 'react'
import Mailbox from './components/mailbox.jsx'

const container = document.getElementById('root');
const root = createRoot(container);
root.render(<React.StrictMode> <Mailbox/> </React.StrictMode>);

