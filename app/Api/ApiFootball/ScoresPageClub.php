<?php

namespace App\Api\ApiFootball;

use App\Api\ApiFootball\ApiFootball;


class ScoresPageClub{

private function apifootball(){
    $api = new ApiFootball(); 
    return $api;
}

public function liveactif($scoreshomme, $scoresfemme){ 
    $liveH = $this->apifootball()->getLiveMatch($scoreshomme,date("Y-m-d"));
    $liveF = null;
    if($scoresfemme !== 0){
        $liveF = $this->apifootball()->getLiveMatch($scoresfemme,date("Y-m-d"));
    }
    
    $live = [];


    if ($liveH !== null || $liveF !== null)
    {
        $live['etat'] = true;  

        if($liveH !== null){
            $live['homme'] = $liveH;
        };   

        if($liveF !== null){
            $live['femme'] = $liveF;
        };     
        }else{
        $live['etat'] = false;
    };

    return $live;
}
public function matchshomme($idteam){  
    $matchshomme ['lastmatch'] = $this->apifootball()->getlastmatch($idteam);
    $matchshomme ['nextmatch'] = $this->apifootball()->getnextmatch($idteam);
    
    if($matchshomme !== null){
        return $matchshomme;
    }
}
public function matchsfemme($idteam){
    $matchsfemme = null;
    if($idteam !== 0){
    $matchsfemme ['lastmatch'] = $this->apifootball()->getlastmatch($idteam);
    $matchsfemme ['nextmatch'] = $this->apifootball()->getnextmatch($idteam);
    }
    
    if($matchsfemme !== null){
        return $matchsfemme;
    }
}


}