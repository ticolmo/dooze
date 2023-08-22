<?php

namespace App\Api;

use App\Api\Apifootball;


class ScoresPageClub{

private function apifootball(){
    $api = new Apifootball(); 
    return $api;
}

public function liveactif($scoreshomme, $scoresfemme){ 
    $liveH = $this->apifootball()->getLiveMatch($scoreshomme,date("Y-m-d"));
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
    $nextmatch ['homme'] = $this->apifootball()->getnextmatch($scoreshomme);
    if($scoresfemme !== 0){
        $nextmatch ['femme'] = $this->apifootball()->getnextmatch($scoresfemme);
    }
    
    if($nextmatch !== null){
        return $nextmatch;
    }
}


}