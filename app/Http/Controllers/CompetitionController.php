<?php

namespace App\Http\Controllers;

use App\Api\Statistiques;
use App\Api\ListeCompetition;

class CompetitionController extends Controller
{
    public function index( string $competition)
    {   
        $request = app('request');
        $show = true;
        $showClassement = true;     
        
        $listCompet = new ListeCompetition();
        $listeCompetition = $listCompet->getUrl(); 
        if (!in_array($competition, $listeCompetition)) {
            abort(404);
        };
    

        $competitionConfirmed = new Statistiques($competition);
        $codeCompetition = $competitionConfirmed->getCodeCompetition();
        $codeBackgroundImage = $competitionConfirmed->getCodeBackgroundImage();        
        
        $classement = $competitionConfirmed->getClassement();

        /* si un classement pour cette compétition existe */
        if(empty($classement)){
            $show = false; 
            $showClassement = false; 
        }
        /* si le paramètre journée est présent dans la requête */
      /*   if (isset($type) && $type == "round" && $request->has('name') && in_array($request->name, $listeJournee)){
            $show = false;
            $journee = $request->name;
        } */
        
        $nameCompetition = $classement['0']['league']['name'];
        $standing = $classement['0']['league']['standings'];
    
        
        return view('competition',[
            'show' => $show,
            'showClassement' => $showClassement,           
            'codeCompetition' => $codeCompetition,
            'nameCompetition' => $nameCompetition,
            'codeBackgroundImage' => $codeBackgroundImage,
            'competition' => $competition,
            'classement' => $standing


        ]);
    }
    
}
