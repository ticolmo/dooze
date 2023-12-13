<?php

namespace App\Api;

use App\Api\Nomequipe;
use App\Api\Nomcompetition;
use Illuminate\Support\Facades\Http;

class Apifootball
{
    public function header()
    {
        $response = Http::withHeaders([
            'x-rapidapi-key' => 'dd8bf5fada55f6377910ef4ee79f7916',
            'x-rapidapi-host' => 'v3.football.api-sports.io'
        ]);

        return $response;
    }

    
    public function getlastmatch(int $idclub)
    {
        $response = $this->header()->get("https://v3.football.api-sports.io/fixtures", [
            'season' => 2023,
            'team' => $idclub,
            'last' => 1,
        ]);

        $datas = $response->json();
        if ($datas['response'] != null) {

            foreach ($datas['response'] as $data) {

                $tableau = [
                    'date' => date("d-m-Y", $data['fixture']['timestamp']),
                    'ligue' => $data['league']['name'],
                    'journee' => $data['league']['round'],
                    'equipe1' => $data['teams']['home']['name'],
                    'equipe2' => $data['teams']['away']['name'],
                    'score1' => $data['goals']['home'],
                    'score2' => $data['goals']['away'],
                ];
            };


            $check = new Nomequipe();
            $tableau['equipe1'] = $check->setnom($tableau['equipe1']);
            $tableau['equipe2'] = $check->setnom($tableau['equipe2']);

            $check2 = new Nomcompetition();
            $tableau['ligue'] = $check2->setnom($tableau['ligue']);


            /*   $check2 = new Nomequipe();
            $check2->setnom($tableau['equipe2']);             
            $tableau['equipe2'] = $check2; */

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

            
            $check = new Nomequipe();
            $tableau['teams']['home']['name'] = $check->setnom($tableau['teams']['home']['name']);
            $tableau['teams']['away']['name'] = $check->setnom($tableau['teams']['away']['name']);

            $check2 = new Nomcompetition();
            $tableau['league']['name'] = $check2->setnom($tableau['league']['name']);

            

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

        foreach ($datas['response'] as $data) {

            $tableau = [
                'date' => date("d-m-Y H:i", $data['fixture']['timestamp']),
                'ligue' => $data['league']['name'],
                'journee' => $data['league']['round'],
                'equipe1' => $data['teams']['home']['name'],
                'equipe2' => $data['teams']['away']['name'],

            ];
        };
        if (isset($tableau['equipe1']) || isset($tableau['equipe2'])) {
            $check = new Nomequipe();
            $tableau['equipe1'] = $check->setnom($tableau['equipe1']);
            $tableau['equipe2'] = $check->setnom($tableau['equipe2']);

            $check2 = new Nomcompetition();
            $tableau['ligue'] = $check2->setnom($tableau['ligue']);
        }


        return $tableau;
    }
}
