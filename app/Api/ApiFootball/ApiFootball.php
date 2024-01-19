<?php

namespace App\Api\ApiFootball;

use App\Api\ApiFootball\NomEquipe;
use App\Api\ApiFootball\NomCompetition;
use Illuminate\Support\Facades\Http;

class ApiFootball
{
    public function header()
    {
        $response = Http::withHeaders([
            'x-rapidapi-key' => 'dd8bf5fada55f6377910ef4ee79f7916',
            'x-rapidapi-host' => 'v3.football.api-sports.io'
        ]);

        return $response;
    }

    private function correctionIntitule(&$tableau){
        $check = new NomEquipe();
        $tableau['teams']['home']['name'] = $check->setnom($tableau['teams']['home']['name']);
        $tableau['teams']['away']['name'] = $check->setnom($tableau['teams']['away']['name']);

        $check2 = new NomCompetition();
        $tableau['league']['name'] = $check2->setnom($tableau['league']['name']);   
        return;   
    }

    
    public function getlastmatch(int $idclub)
    {
        $response = $this->header()->get("https://v3.football.api-sports.io/fixtures", [
            'season' => 2023,
            'team' => $idclub,
            'last' => 1,
        ]);

        $datas = $response->json();
        $tableau = [];
        if ($datas['response'] != null) {

            foreach ($datas['response'] as $data) {

                $tableau = $data;            
            };
            
            $this->correctionIntitule($tableau); 

            return $tableau;
        }
    }

    public function getLiveMatch(int $idclub, $datedujour)
    {
        $response = $this->header()->get("https://v3.football.api-sports.io/fixtures", [
            'season' => 2023,
            'team' => $idclub,
            'date' => $datedujour,
        ]);

        $datas = $response->json();

        $tableau = [];
        
        if ($datas['response'] != null) {
            foreach ($datas['response'] as $data) {

                $tableau = $data;            
            };

            $this->correctionIntitule($tableau); 

            return $tableau;
        }
        
    }


    public function getnextmatch(int $idClub): array
    {
        $response = $this->header()->get("https://v3.football.api-sports.io/fixtures", [
            'season' => 2023,
            'team' => $idClub,
            'next' => 1,
        ]);

        $datas = $response->json();

        $tableau = [];
        if ($datas['response'] != null) {

            foreach ($datas['response'] as $data) {
                $tableau = $data;  
            };

            if (isset($tableau['teams']['home']['name']) || isset($tableau['teams']['away']['name'])) {
                $this->correctionIntitule($tableau); 
            }
            
            return $tableau;
        }
    }
}
