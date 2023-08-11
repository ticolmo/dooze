<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class FormcontactController extends Controller
{
   public function index(){

    return view('contact');
   }

   public function store(Request $request){

    $request->validate([        
        'email' => ['required','string','email','max:255'],
        'prenom' => ['nullable','string','max:50'],
        'nom' => ['required','string','max:50'],
        'objet' => ['required','string','max:100'],
        'contenu' => ['required','string','max:1000']
    ]);

    if($request->prenom != null){
        $expediteur = $request->nom." ".$request->prenom; 
    }else{
        $expediteur = $request->nom;
    }  
    
    /* les messages du formulaire de contact sont expédiés depuis l'ID 13 et envoyés à l'ID 12 */
            
    Message::create([            
        'destinataire_id' => 12,
        'expediteur_id' => 13,
        'mailbox_id' => 12,
        'expFormContact_name' => $expediteur,
        'expFormContact_email' => $request->email,
        'objet' => $request->objet,
        'contenu' => $request->contenu,

    ]);

    return back()->with('messagesent','ok');

    
   }
}
