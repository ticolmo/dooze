<?php

namespace App\Api;

use App\Api\Nomequipe;
use App\Api\Nomcompetition;
use Illuminate\Support\Facades\Http;



class Apifootball
{
    private function header()
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
        
        if ($datas['response'] != null) {
            foreach ($datas['response'] as $data) {

                $tableau = [
                    'date' => date("D d F Y", $data['fixture']['timestamp']),
                    'ligue' => $data['league']['name'],
                    'journee' => $data['league']['round'],
                    'equipe1' => $data['teams']['home']['name'],
                    'equipe2' => $data['teams']['away']['name'],
                    'score1' => $data['goals']['home'],
                    'score2' => $data['goals']['away'],
                    'idRencontre' => $data['fixture']['id'],
                    'status' => $data['fixture']['status']['short'],
                    'time' => $data['fixture']['status']['elapsed'],

                ];
            };


            $check = new Nomequipe();
            $tableau['equipe1'] = $check->setnom($tableau['equipe1']);
            $tableau['equipe2'] = $check->setnom($tableau['equipe2']);

            $check2 = new Nomcompetition();
            $tableau['ligue'] = $check2->setnom($tableau['ligue']);

            

            return $tableau;
        }
        
    }
    public function getButeurs($idRencontre, int $idClub): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://v3.football.api-sports.io/fixtures/events?fixture=$idRencontre&team=$idClub&type=goal",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'x-rapidapi-key: dd8bf5fada55f6377910ef4ee79f7916',
                'x-rapidapi-host: v3.football.api-sports.io'
            ),
        ));


        $response = curl_exec($curl);;

        $tableau = [];
        $datas = json_decode($response, true);
        /*  $type;
        $extra; */
        foreach ($datas['response'] as $data) {
            //détail du but
            if ($data['detail'] == 'Own Goal') {
                $data['detail'] = "(csc)";
                $type = $data['detail'];
            } else if ($data['detail'] == 'Penalty') {
                $data['detail'] = "(Pen)";
                $type = $data['detail'];
            } else {
                $type = "";
            };
            //si but en temps additionnel
            if ($data['time']['elapsed'] == 'null') {
                $extra = "";
            } else {
                $extra = $data['time']['elapsed'];
            }
            $tableau = [
                'buteur' => $data['player']['name'],
                'type' => $type,
                'minute' => $data['time']['elapsed'] . "'",
                'extra' => $extra,

            ];
        };
        curl_close($curl);

        return $tableau;
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
