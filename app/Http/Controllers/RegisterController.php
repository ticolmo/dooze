<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use App\Api\Listepays;
use App\Models\Langue;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request){
        
        $club = $request->session()->get('club');
        $langue = Langue::select(['id_langue','intitule'])->get();
        $showclub = Club::select('nom')->where('id_club', $club)->firstOrFail();
        $pays = new Listepays();
        $liste = $pays->getlist();          
        $isinvalid = "";
        $request->session()->put('register', "ok");

        
        return view('auth.register',[
            'langues'=> $langue,
            'club'=> $showclub,
            'listepays'=> $liste,
            'id_club' => $club,
            'isinvalid' => $isinvalid

        ]);
    }

    /*--- fonction à supprimer transféré sur Profilcontroller edit*/
    public function edit(Request $request){
        
        $fan = User::with(['club','langue'])->findOrFail(auth()->user()->id);
        $langue = Langue::select(['id_langue','intitule'])->get();
        
        $pays = new Listepays();
        $liste = $pays->getlist();   
        
         // Message de modification d'email
            if ($request->session()->has('email')) {
                //la valeur de la session est placée dans un message flash et est détruit pour être affichée seulement une seule fois
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
}
