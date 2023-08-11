<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Api\Listepays;
use App\Models\Langue;
use App\Models\Message;
use App\Models\Publication;
use App\Models\Reponseclub;
use Illuminate\Http\Request;
use App\Models\Commentaireclub;
use App\Models\Reponsevisiteur;
use App\Models\Suppressioncompte;
use App\Models\Commentairevisiteur;
use Illuminate\Support\Facades\Storage;


class ProfilController extends Controller
{
  public function index(Request $request){

    // Si l'utilisateur est administrateur
    if (auth()->user()->is_admin) {
        $admin = User::findOrFail(auth()->user()->id);
        $admin->derniere_connexion = now();
        $admin->save();
        return redirect()->route('admin.index');
      }

   $fan = User::with(['club','langue'])->findOrFail(auth()->user()->id);   

   // Enregistrement de la date de connexion  
   $fan->derniere_connexion = now();
   $fan->save();
   
   // Message de bienvenue
   if ($request->session()->has('bienvenue')) {    
      //la valeur de la session est placée dans une session flash et est détruit pour être affichée seulement une seule fois
      $bienvenue = $request->session()->get('bienvenue');    
      session()->now('new', "$bienvenue");
      $request->session()->forget('bienvenue');  
    }

    // Notification nouveau message non lu
    $newmessage = Message::where('mailbox_id', auth()->user()->id)->where('destinataire_id',auth()->user()->id)->whereNull('read_at')->count();

    return view('auth.profil',[
        'fan'=> $fan, 
        'newmessage' => $newmessage
            
      ]);

  }

  public function edit(Request $request){
        
    $fan = User::with(['club','langue'])->findOrFail(auth()->user()->id);
    $langue = Langue::select(['id_langue','intitule'])->get();
    
    $pays = new Listepays();
    $liste = $pays->getlist();   
    
     // Message de modification d'email
        if ($request->session()->has('email')) {
            //la valeur de la session est placée dans une session flash et est détruit pour être affichée seulement une seule fois
            $message = $request->session()->get('email');    
            session()->now('modifemail', "$message");
            $request->session()->forget('email');
        }

    return view('auth.edit',[
        'langues'=> $langue,
        'fan'=> $fan,            
        'listepays'=> $liste,
        
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
      $commentaireclub = Commentaireclub::withTrashed()->where('user_id',auth()->user()->id)->get();
      foreach ($commentaireclub as $item){
        $model = $item->getMorphClass();
        Publication::withTrashed()->where('post_id', $item->id)->where('post_type', $model)->forceDelete();  
        $item->forceDelete();
      }
      $commentairevisiteur = Commentairevisiteur::withTrashed()->where('user_id',auth()->user()->id)->get();
      foreach ($commentairevisiteur as $item){
        $model = $item->getMorphClass();
        Publication::withTrashed()->where('post_id', $item->id)->where('post_type', $model)->forceDelete();  
        $item->forceDelete();
      }
      $reponseclub = Reponseclub::withTrashed()->where('user_id',auth()->user()->id)->get();
      foreach ($reponseclub as $item){
        $model = $item->getMorphClass();
        Publication::withTrashed()->where('post_id', $item->id)->where('post_type', $model)->forceDelete();  
        $item->forceDelete();
      }
      $reponsevisiteur = Reponsevisiteur::withTrashed()->where('user_id',auth()->user()->id)->get();
      foreach ($reponsevisiteur as $item){
        $model = $item->getMorphClass();
        Publication::withTrashed()->where('post_id', $item->id)->where('post_type', $model)->forceDelete();  
        $item->forceDelete();
      }

    // Suppression des messages
    Message::withTrashed()->where('destinataire_id', auth()->user()->id)->orWhere('expediteur_id', auth()->user()->id)->forceDelete();


     // Suppression du dossier media de l'utilisateur
     $id = auth()->user()->id;
     if (Storage::disk('public')->exists("users/$id")) {
       Storage::disk('public')->deleteDirectory("users/$id");
     };     
    
    $fan->delete();

    return redirect()->route('home')->with('suppressioncompte', 'Votre compte a été supprimé. Nous espérons vous revoir prochainement.');

  }



}
