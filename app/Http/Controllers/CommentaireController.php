<?php

namespace App\Http\Controllers;

use voku\helper\AntiXSS;
use App\Models\Commentaire;
use App\Models\Signalement;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [      
            'contenu' => ['required', 'max:1500'],
            'media' => ['nullable','mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp,video/mp4,video/x-msvideo,video/quicktime','max:10000'],
            'lieu' => ['nullable', 'max:100'],
            'secteur_visiteur' => ['required', 'boolean']
        ]);
       
        if ($validator->fails()) {                
            return back()
                ->withErrors($validator);
        };
       
        $antiXss = new AntiXSS();
        $contenuClean = $antiXss->xss_clean($request->contenu);
        
        
        $commentaire = new Commentaire();
        $userid = auth()->user()->id;
        $commentaire->contenu = $contenuClean;
        $commentaire->secteur_visiteur  = $request->secteur_visiteur ;
        $commentaire->user_id = $userid;    
        $commentaire->club_id = auth()->user()->club_id;
        $commentaire->created_at = now();  
        $commentaire->reponse_id  = $request->reponse;
        $commentaire->nb_jaime  = 0;
       
        /* si le commentaire contient un lieu */
        if ($request->has('lieu')) {
            $lieuClean = Purifier::clean($request->lieu);
            $commentaire->lieu  = $lieuClean;
        }
        /* si fichier media posté */
        if ($request->has('media')) {
            
            /*stockage fichier media*/ 
            $fichiermedia = uniqid().'.'.$request->media->extension();    
            $request->media->storeAs("users/$userid", $fichiermedia, 'public');
            /*base de données*/
            $commentaire->fichier_media = $fichiermedia;
        };
        
        $commentaire->save();
        return back();

    }

    public function update(Request $request){

        $update = Commentaire::findOrFail($request->input('id'));
        $update->contenu = $request->input('contenu');
        $update->save();
    
        return back()->with('update', 'update'); 
    }
    
    public function delete(Request $request){
    
        $commentaire = Commentaire::findOrFail($request->input('id'));

        /*suppression du fichier media*/
        $userid = auth()->user()->id;
        if ($commentaire->fichier_media != null){
            Storage::disk('public')->delete("users/$userid/$commentaire->fichier_media");
        }
        /*suppression dans la table Publication*/
        $commentaire->publication()->forceDelete();
        /*suppression dans la table Commentaire correspondante*/
        $commentaire->forceDelete();
    
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
