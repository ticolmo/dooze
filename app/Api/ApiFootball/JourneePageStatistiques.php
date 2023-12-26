<?php

namespace App\Api\ApiFootball;

use App\Api\ApiFootball\Nomequipe;
use App\Api\ApiFootball\ApiFootball;


class JourneePageStatistiques
{

    private function apifootball(){
        $api = new ApiFootball(); 
        return $api;
    }

    public function getListeMatchs($journee, $codeCompetition){
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/fixtures", [
            'league' => $codeCompetition,
            'season' => 2023,
            'round' => $journee,
        ]);

        $datas = $response->json();
        foreach($datas['response'] as &$rencontre){
           $check = new Nomequipe();
           $rencontre['teams']['home']['name'] = $check->setnom($rencontre['teams']['home']['name']);
           $rencontre['teams']['away']['name'] = $check->setnom($rencontre['teams']['away']['name']);
        };
        $listeMatchs = $datas['response'];

        return $listeMatchs;
    }

}

