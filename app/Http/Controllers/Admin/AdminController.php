<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::findOrFail(auth()->user()->id);
        return view('admin.index',[
            'admin'=> $admin,   
                
          ]);
    }

    public function comment()
    {
        
        return view('admin.admin-commentaires');
    }

    public function mailbox()
    {
        /* les messages du formulaire de contact sont expédiés depuis l'ID 13 et envoyés à l'ID 12 */

        $boitereception = Message::where('mailbox_id', 12)->where('destinataire_id', 12)->latest()->get();
        $nbnewmessage = $boitereception->where('read_at', null)->count();
        $boiteenvoi = Message::where('mailbox_id', 12)->where('expediteur_id', 12)->latest()->get();
        $corbeille = Message::onlyTrashed('destinataire_id', 12)->count();
        
        
        return view('admin.admin-messagerie',[
            'boitereception'=> $boitereception,
            'boiteenvoi'=> $boiteenvoi,
            'corbeille'=> $corbeille,
            'nbnewmessage'=> $nbnewmessage,
        ]);
    }

    public function corbeillemail(){

        $corbeille = Message::onlyTrashed()->where('mailbox_id', 12)->get();

        return view('admin.admin-corbeille-message',[            
            'corbeille'=> $corbeille,
            
        ]);
    }

    public function deletemail(Request $request){

        $mail = collect($request->all())->except('_token')->toArray(); 

        foreach($mail as $id => $value){
            Message::findOrFail($id)->delete();
        }

        return redirect()->route('admin.mailbox');
    }
    public function forcedeletemail(Request $request){

        $mail = collect($request->all())->except('_token')->toArray(); 

        foreach($mail as $id => $value){
            $suppression = Message::onlyTrashed()->findOrFail($id);
            $suppression->forceDelete();
        }

        return redirect()->route('admin.corbeillemail');
    }

    public function restoredeletedmail($idmessage){
        
            $suppression = Message::onlyTrashed()->findOrFail($idmessage);
            $suppression->restore();
        

        return redirect()->route('admin.corbeillemail');
    }

    public function readmail($idmessage){

        $message = Message::withTrashed()->findOrFail($idmessage);                

        // Marqué comme lu
        if($message->destinataire_id == 12 || $message->read_at == null) {
        $message->read_at = now();
        $message->save();
        }

        return view('admin.admin-read-message',[
            'message'=> $message
        ]);

    }

    
}
