<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Commentaire;
use App\Models\Signalement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentaireController extends Controller
{
    public function check(Request $request)
    {
        $verification = collect($request->all())->except('_token')->toArray();        

        foreach ($verification as $idpublication => $date){
            $commentaire = Commentaire::findOrFail($idpublication);
            $commentaire->checked_at = $date;
            $commentaire->save();
        }

        return back();
    }

    public function signalras(Request $request){

        $request->validate([        
            'note' => ['nullable','string', 'max:120'],    
        ]);

        $corbeille = Signalement::findOrFail($request->idsignalement);
        $corbeille->note_administrateur = $request->note;
        $corbeille->administrateur_id = auth()->user()->id;
        $corbeille->save();
        $corbeille->delete();
        

        return back();

    }
    public function signalrasconfirm(Request $request)
    {
        
        $deleteconfirmation = collect($request->all())->except('_token')->toArray();        
        
        foreach ($deleteconfirmation as $idsignalement){   
            $servette = Signalement::withTrashed()->findOrFail($idsignalement);                    
            $servette->forceDelete();
        }

        return back();
    }

    public function proceduredelete($idcommentaire){

        $commentaire = Commentaire::findOrFail($idcommentaire);

        return view('admin.admin-delete-commentaire',[
            'publication'=> $commentaire
        ]);
    }

    public function delete(Request $request){

        $request->validate([        
            'motif' => ['required','string', 'max:120'],    
            'objet' => ['required','string', 'max:100'],    
            'contenu' => ['required','string', 'max:1000'],    
            'idpub' => ['required','string', 'max:36'],    
        ]);

        $commentaire = Commentaire::findOrFail($request->idpub);

        // enregistrement du motif
        $commentaire->motif_suppression = $request->motif;        
        $commentaire->save();

        // soft delete sur commentaire
        $commentaire->delete();
        
        // message d'information envoyé à l'utilisateur 
        // message enregistré à double pour que la possibilité d'effacer soit gérée séparément par le destinataire et expéditeur via mailbox_id
        Message::create([            
            'destinataire_id' => $commentaire->user_id,
            'expediteur_id' => 12,
            'mailbox_id' => 12,
            'objet' => $request->objet,
            'contenu' => $request->contenu,
        ]);

        Message::create([            
            'destinataire_id' => $commentaire->user_id,
            'expediteur_id' => 12,
            'mailbox_id' => $commentaire->user_id,
            'objet' => $request->objet,
            'contenu' => $request->contenu,
        ]);     

        return redirect()->route('admin.comments')->with('commentairesupprime', 'Commentaire supprimé et placé dans la corbeille');
    }

    public function forcedelete(Request $request)
    {
        $idcommentaire = $request->idcom;
        //suppression définitive 
        Commentaire::withTrashed()->where('id', $idcommentaire)->forceDelete();    

        return redirect()->route('admin.comments')->with('forcedelete', 'Commentaire définitivement supprimé');

    }

    public function restore(Request $request)
        {
        $idcommentaire = $request->idcom;
        //restauration 
        Commentaire::withTrashed()->where('id', $idcommentaire)->restore();   

        return redirect()->route('admin.comments')->with('restore', 'Commentaire restauré');

    }
}
