import { createRoot } from 'react-dom/client';
import React from 'react'
import Timezone from './components/Timezone.jsx'


/* conditions if puisque plusieurs pages sont liés à la page layout */
if (document.getElementById('timezone')) {
    const container = document.getElementById('timezone');
    const root = createRoot(container);
    root.render(<React.StrictMode> <Timezone fuseauHoraire={FuseauHoraire} /> </React.StrictMode>);
}
