<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    public function index(){

        $boitereception = Message::where('mailbox_id', auth()->user()->id)->where('destinataire_id', auth()->user()->id)->latest()->get();
        $nbnewmessage = $boitereception->where('read_at', null)->count();
        $boiteenvoi = Message::where('mailbox_id', auth()->user()->id)->where('expediteur_id', auth()->user()->id)->latest()->get();
        $corbeille = Message::onlyTrashed()->where('mailbox_id', auth()->user()->id)->count();      
            
        return view('auth.messagerie.index',[
            'boitereception'=> $boitereception,
            'boiteenvoi'=> $boiteenvoi,
            'corbeille'=> $corbeille,
            'nbnewmessage'=> $nbnewmessage,
        ]);

    }

    public function submitmessageprive(Request $request, $destinataireid){

        $request->validate([        
            'objet' => ['nullable','string','max:100'],
            'contenu' => ['required','string','max:1000'],
            'refmessage' => ['nullable','string','max:36'],
    
        ]);

        /* Si réponse */

        if ($request->refmessage != null){
            $message = Message::findOrFail($request->refmessage);
            $message->has_reply = true;
            $message->save();
        }
        
        /* Message enregistré à double pour que la possibilité d'effacer soit gérée séparément par le destinataire et expéditeur via mailbox_id*/

        Message::create([            
            'destinataire_id' => $destinataireid,
            'expediteur_id' => auth()->user()->id,
            'mailbox_id' => auth()->user()->id,
            'objet' => $request->objet,
            'contenu' => $request->contenu,
        ]);

        Message::create([            
            'destinataire_id' => $destinataireid,
            'expediteur_id' => auth()->user()->id,
            'mailbox_id' => $destinataireid,
            'objet' => $request->objet,
            'contenu' => $request->contenu,
        ]);

        return back()->with('messagesent','ok');
    }

    public function writemessage(){

        return view('auth.messagerie.writemessage');
    }

    public function readmessage($idmessage){

        $message = Message::withTrashed()->findOrFail($idmessage);
        
        // Marqué comme lu
        if($message->destinataire_id == auth()->user()->id || $message->read_at == null) {
        $message->read_at = now();
        $message->save();
        }

        return view('auth.messagerie.readmessage',[
            'message'=> $message
        ]);

    }
    public function corbeillemessagerie(){
        
        $corbeille = Message::onlyTrashed()->where('mailbox_id', auth()->user()->id)->get();
       

        return view('auth.messagerie.corbeillemessage',[
            'corbeille'=> $corbeille
        ]);

    }

    public function deletemessage(Request $request){
    
        $message = collect($request->all())->except('_token')->toArray(); 

        foreach($message as $id => $value){
            Message::findOrFail($id)->delete();
        }

        return redirect()->route('messagerie');
    }

    public function forcedeletemessage(Request $request){

        $mail = collect($request->all())->except('_token')->toArray(); 

        foreach($mail as $id => $value){
            $suppression = Message::onlyTrashed()->findOrFail($id);
            $suppression->forceDelete();
        }

        return redirect()->route('corbeillemessagerie');
    }

    public function restoredeletedmessage($idmessage){
        
            $suppression = Message::onlyTrashed()->findOrFail($idmessage);
            $suppression->restore();
        

        return redirect()->route('corbeillemessagerie');
    }

    public function replymessage($idmessage){
        
            $reponse = Message::findOrFail($idmessage);        
        
            return view('auth.messagerie.replymessage',[
                'reponse'=> $reponse
            ]);
    }
}
