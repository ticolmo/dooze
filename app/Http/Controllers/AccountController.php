<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Commentaire;
use App\Models\Signalement;
use Illuminate\Http\Request;
use App\Events\AccountLogInEvent;
use App\Models\Suppressioncompte;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
  public function index(Request $request){  

   $fan = User::with(['club','langue'])->findOrFail(auth()->user()->id);   

   // Enregistrement de la date de connexion  
   $fan->derniere_connexion = now();
   $fan->save();
   // Si l'utilisateur est administrateur
   if ($fan->is_admin) {    
   return redirect()->route('admin.index');
   };

    event(new AccountLogInEvent($fan));

    return view('auth',[
        'fan'=> $fan
            
      ]);

  }

  public function delete(){

    $fan = User::findOrFail(auth()->user()->id);

    // Envoi des données statistiques dans la table Suppresssioncompte
    Suppressioncompte::create([
      'categorie' => $fan->categorie,
      'pays'=> $fan->pays,
      'club_id' => $fan->club_id,
      'langue_id' => $fan->langue_id,
      'created_at' => $fan->created_at,
      'updated_at' => now(),
    ]); 

    // Suppression des commentaires postés par l'utilisateur
    Commentaire::withTrashed()->where('user_id',auth()->user()->id)->forceDelete();  

    // Suppression des messages
    Message::withTrashed()->where('destinataire_id', auth()->user()->id)->orWhere('expediteur_id', auth()->user()->id)->forceDelete();

    // Suppression des signalements
    Signalement::withTrashed()->where('user_id', auth()->user()->id)->forceDelete();
    
     // Suppression du dossier media de l'utilisateur
     $id = auth()->user()->id;
     if (Storage::disk('public')->exists("users/$id")) {
       Storage::disk('public')->deleteDirectory("users/$id");
     };     
    
    $fan->delete();

    return redirect()->route('home')->with('suppressioncompte', 'Votre compte a été supprimé. Nous espérons vous revoir prochainement.');

  }



}
