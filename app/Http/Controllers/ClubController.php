<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ClubController extends Controller
{   
    public function index(){
        
      /*   $essai = Uuid::uuid4();
       $test4 = $essai->getBytes();
       $test = $essai->toString();
       var_dump($test);
       $test2 = Uuid::fromBytes($test4);
       var_dump($test2);
       var_dump($test4);
       $essai5 = Uuid::uuid4()->getBytes(); marche
       dd(Uuid::uuid4()->getBytes()); marche 
      die();
      $test3 = uniqid();
        var_dump($test3);  */

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
