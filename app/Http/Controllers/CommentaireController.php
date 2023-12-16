<?php

namespace App\Http\Controllers;

use voku\helper\AntiXSS;
use App\Models\Commentaire;
use App\Models\Signalement;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Validator;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [      
            'contenu' => ['required', 'max:1500'],
            'fichier_media' => ['nullable','mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp,video/mp4,video/x-msvideo,video/quicktime','max:10000'],
            'lieu' => ['nullable', 'max:100'],
            'secteur_visiteur' => ['required', 'boolean']
        ]);
       
        if ($validator->fails()) {                
            return back()
                ->withErrors($validator);
        };
        
        
        $contenuClean = Purifier::clean($request->contenu);

        $commentaire = new Commentaire();
        $userid = auth()->user()->id;
        $commentaire->contenu = $contenuClean;
        $commentaire->secteur_visiteur  = $request->secteur_visiteur ;
        $commentaire->user_id = $userid;    
        $commentaire->club_id = auth()->user()->club_id;
        $commentaire->created_at = now();  
        $commentaire->reponse_id  = $request->reponse;
       
        /* si le commentaire contient un lieu */
        if ($request->has('lieu')) {
            $lieuClean = Purifier::clean($request->lieu);
            $commentaire->lieu  = $lieuClean;
        }
        /* si fichier media posté */
        if ($request->has('fichier_media')) {
            /*stockage fichier media*/ 
            $fichiermedia = uniqid().'.'.$request->media->extension();    
            $request->media->storeAs("users/$userid", $fichiermedia, 'public');
            /*base de données*/
            $commentaire->fichier_media = $fichiermedia;
        };
        
        $commentaire->save();
        return back();

    }
}
