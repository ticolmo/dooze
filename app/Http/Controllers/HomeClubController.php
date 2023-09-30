<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeClubController extends Controller
{   
    public function index(Request $request){        
   
        $ip = $request->ip();
        
       

        $listeclub = Club::where('en_ligne',true)->select(['nom','url','site_officiel'])->orderBy('nom')->get();

        return view('home',[
            'listeclub'=> $listeclub
        ]);
    }

    public function show($club){
        $choixclub = Club::where('url', $club )->firstOrFail();       
         
        return view('club',[
            'club'=> $choixclub,           
            
        ]);

    }
}
