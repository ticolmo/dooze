<?php

namespace App\Http\Controllers\Api;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentaireResource;

class CommentaireController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return CommentaireResource::collection(
                    Commentaire::where([
                        ['club_id',$request->club],
                        ['secteur_visiteur', $request->visitors],
                        ['reponse_id', null]
                    ])
                    ->with('user', 'club')
                    ->get());
    }
}
