<?php

namespace App\Http\Controllers;

use App\Api\Statistiques;
use App\Api\ListeCompetition;

class StatistiquesController extends Controller
{
    public function index($competition, ?string $type = null)
    {   
        $request = app('request');
        $show = true;
        $showClassement = true;        

        $competitionConfirmed = new Statistiques($competition);
        $codeCompetition = $competitionConfirmed->getCodeCompetition();
        $journee = $competitionConfirmed->getCurrentJournee();
        $listeJournee = $competitionConfirmed->getListeJournee();
        
        /* si un classement pour cette compétition existe */
        $classement = $competitionConfirmed->issetClassement();
        
        if(empty($classement)){
            $show = false; 
            $showClassement = false; 
        }
        /* si le paramètre journée est présent dans la requête */
        if (isset($type) && $type == "round" && $request->has('name') && in_array($request->name, $listeJournee)){
            $show = false;
            $journee = $request->name;
        }
        
        $nameCompetition = $classement['0']['league']['name'];
        $meilleursButeurs = $competitionConfirmed->getMeilleursButeurs();
        
        
        return view('statistiques',[
            'show' => $show,
            'showClassement' => $showClassement,            
            'journee' => $journee,            
            'listeJournee' => $listeJournee,            
            'codeCompetition' => $codeCompetition,
            'nameCompetition' => $nameCompetition,
            'meilleursButeurs' => $meilleursButeurs,

        ]);
    }
    
}
