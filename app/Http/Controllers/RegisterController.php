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

    public function media(){
        $langue = Langue::select(['id_langue','intitule'])->get();
        $clubs = Club::select(['id_club','nom'])->where('en_ligne', true)->get();
        $pays = new Listepays();
        $liste = $pays->getlist();
        
        return view('auth.register-media',[
            'langues'=> $langue,
            'clubs'=> $clubs,
            'listepays'=> $liste,
        ]);


    }

   
}
