<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\Commentaireclub;
use App\Models\Commentairevisiteur;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FeatureController extends Controller
{
    public function commentaireunique($idpublication)
    {

        $commentaire = Publication::with([
            'post' => function (MorphTo $morphTo) {
                $morphTo->morphWithCount([
                    Commentaireclub::class => ['reponse'],
                    Commentairevisiteur::class => ['reponse'],
                ]);
            }])->findOrFail($idpublication);
        
        /*pour $club dans layout.club*/
        $club = $commentaire->post->club;
       
       
        return view('features.commentaireunique',[
            'commentaire'=> $commentaire,
            'club'=> $club
        ]);
    }
}
