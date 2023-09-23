<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Reponseclub;
use App\Models\Signalement;
use Illuminate\Http\Request;
use App\Models\Commentaireclub;
use App\Models\Reponsevisiteur;
use App\Models\Commentairevisiteur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller

{
    public function storeCommentaireclub(Request $request): RedirectResponse
{
    $validator = Validator::make($request->all(), [      
        'contenu' => ['required', 'max:280'],
        'media' => ['nullable','mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp,video/mp4,video/x-msvideo,video/quicktime','max:10000']
    ]);
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->with('post', 'post');
    }
   
    $publication = new Publication();
    $commentaire = new Commentaireclub();
    
    $userid = auth()->user()->id;
          
    $commentaire->contenu = $request->contenu;
    $commentaire->user_id = $userid;    
    $commentaire->club_id = auth()->user()->club_id;
    $commentaire->created_at = now();  

    /*si media (image, video) posté */
    if ($request->has('media')) {
        /*stockage fichier media*/ 
        $fichiermedia = uniqid().'.'.$request->media->extension();    
        $request->media->storeAs("users/$userid", $fichiermedia, 'public');
        /*base de données*/
        $commentaire->fichier_media = $fichiermedia;
    };  

   $commentaire->save();
   
   /*enregistrement de la relation polymorphique*/
   $commentaire->publication()->save($publication);  
   
   /*session flash ajouté pour que section Fans soit visible et activé par Bootstrap*/
    return back()->with('post', 'post');  

}

    public function storeReponseclub(Request $request): RedirectResponse
{
    $request->validate([        
        'contenu' => 'required',
        'comment' => 'required',

    ]);

    
    $publication = new Publication();
    $reponse = new Reponseclub();
    
    $reponse->contenu = $request->contenu;
    $reponse->user_id = auth()->user()->id;
    $reponse->club_id = auth()->user()->club_id;
    $reponse->commentaireclub_id = $request->comment;
    $reponse->created_at = now();
   
   $reponse->save();
   /*enregistrement de la relation polymorphique*/
   $reponse->publication()->save($publication);  

   $redirect = $reponse->club->url;
 
   return redirect("$redirect#$reponse->id")->with('post', 'post');;
}

public function storeCommentairevisiteur(Request $request): RedirectResponse
{
    $request->validate([        
        'contenu' => ['required', 'max:280'],
        'idclub'=> 'required',
        'media' => ['nullable','mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp,video/mp4,video/x-msvideo,video/quicktime','max:10000']
    ]);

   
    $publication = new Publication();
    $commentaire = new Commentairevisiteur();

    $userid = auth()->user()->id;
    
    $commentaire->contenu = $request->contenu;
    $commentaire->user_id = $userid;
    $commentaire->club_id = $request->idclub;;
    $commentaire->created_at = now();  

    
    
    /*si media (image, video) posté */
    if($request->has('media')){
        /*stockage fichier media*/ 
        $fichiermedia = uniqid().'.'.$request->media->extension();    
        $request->media->storeAs("users/$userid", $fichiermedia, 'public');
        /*base de données*/
        $commentaire->fichier_media = $fichiermedia;
    };  

   $commentaire->save();
   
   /*enregistrement de la relation polymorphique*/
   $commentaire->publication()->save($publication);  
   
   /*session flash ajouté pour que section Fans soit visible et activé par Bootstrap*/
    return back()->with('post', 'post');  

}

public function storeReponsevisiteur(Request $request): RedirectResponse
{
    $request->validate([        
        'contenu' => 'required',
        'comment' => 'required',
        'idclub'=> 'required',

    ]);

    
    $publication = new Publication();
    $reponse = new Reponsevisiteur();
    
    $reponse->contenu = $request->contenu;
    $reponse->user_id = auth()->user()->id;
    $reponse->club_id = $request->idclub;
    $reponse->commentairevisiteur_id = $request->comment;
    $reponse->created_at = now();
   
   $reponse->save();
   /*enregistrement de la relation polymorphique*/
   $reponse->publication()->save($publication);  
 
   return back()->with('post', 'post');
}

public function update(Request $request){

    $publication = Publication::findOrFail($request->input('id'));

    $model = $publication->post->getMorphClass();

    $commentaire = new $model();

    $update = $commentaire->findOrFail($request->input('idcom'));
    $update->contenu = $request->input('contenu');
    $update->save();

    return back()->with('update', 'update'); 
}

public function delete(Request $request){

    $publication = Publication::findOrFail($request->input('id'));

    $model = $publication->post->getMorphClass();

    $commentaire = new $model();

    $delete = $commentaire->findOrFail($request->input('idcom'));
    /*suppression du fichier media*/
    $userid = auth()->user()->id;
    if ($delete->fichier_media != null){
        Storage::disk('public')->delete("users/$userid/$delete->fichier_media");
    }
    /*suppression dans la table Publication*/
    $delete->publication()->forceDelete();
    /*suppression dans la table Commentaire correspondante*/
    $delete->forceDelete();

    return back()->with('delete', 'delete'); 
}

public function signal(Request $request){

    $request->validate([        
        'id' => 'required|numeric',
        'iduser' => 'required|numeric',
        'motif' => 'required',

    ]);

    $signalement = new Signalement();

    $signalement->publication_id = $request->id;
    $signalement->user_id = $request->iduser;
    $signalement->motif = $request->motif;
    $signalement->created_at = now();
    $signalement->save();

    return back()->with([
        'post' => 'post',
        'signalement' => 'signalement'
    ]);
    

}


}
