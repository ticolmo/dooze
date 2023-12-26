<?php

namespace App\Http\Controllers;

use App\Api\ApiFootball\Statistiques;
use App\Api\ApiFootball\ListeCompetition;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index(string $url)
    {   
        $standing = false;  
        $competition = Competition::where('url', $url)->firstOrFail();    

        $resultats = new Statistiques($competition->id);
        if($competition->has_standing){
          $classement = $resultats->getClassement();
          $standing = $classement['0']['league']['standings'];  
        }       
        
        return view('competition',[          
            'codeCompetition' => $competition->id,
            'nameCompetition' => $competition->intitule,
            'codeBackgroundImage' => $competition->code_pays,
            'competition' => $competition,
            'classement' => $standing


        ]);
    }
    
}
