import { createRoot } from 'react-dom/client';
import React from 'react'
import ReactDOM from 'react-dom/client'
import Timezone from './components/Timezone.jsx'
import Servette from './components/Servette.jsx'



// Affichez plutôt votre composant React
/* const root = createRoot(document.getElementById('app'));
root.render(<h1>Bonjour tout le monde</h1>) */

if (document.getElementById('timezone')) {
    const container = document.getElementById('timezone');
    const root = createRoot(container);
    root.render(<React.StrictMode> <Timezone fuseauHoraire={FuseauHoraire} heureActuelle={HeureActuelle}/> </React.StrictMode>);
}
if (document.getElementById('servette')) {
    const container = document.getElementById('servette');
    const root = createRoot(container);
    root.render(<React.StrictMode> <Servette /> </React.StrictMode>);
}
