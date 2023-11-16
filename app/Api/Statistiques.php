<?php

namespace App\Api;

use App\Api\ApiFootball;
use Illuminate\Support\Facades\Http;


class Statistiques
{
    public function __construct(public string $competition)
    {
    }

    public function apifootball(){
        $api = new ApiFootball(); 
        return $api;
    }

    public function getCodeCompetition()
    {
        $code = null;
        switch ($this->competition) {
            case 'champions-league':
                $code = 2;
                break;
            case 'europa-league':
                $code = 3;
                break;
            case 'conference-league':
                $code = 848;
                break;
            case 'uefa-super-cup':
                $code = 531;
                break;
            case 'champions-league-w':
                $code = 525;
                break;
            case 'premier-league':
                $code = 39;
                break;
            case 'league-cup':
                $code = 48;
                break;
            case 'community-shield':
                $code = 528;
                break;
            case 'community-shield-w':
                $code = 670;
                break;
            case 'fa-womens-cup':
                $code = 698;
                break;
            case 'fawsl':
                $code = 44;
                break;
            case 'liga':
                $code = 140;
                break;
            case 'primera-division-f':
                $code = 142;
                break;
            case 'copa-del-rey':
                $code = 143;
                break;
            case 'super-cup-espana':
                $code = 556;
                break;
            case 'seria-a':
                $code = 135;
                break;
            case 'coppa-italia':
                $code = 137;
                break;
            case 'seria-a-f':
                $code = 139;
                break;
            case 'super-cup-italia':
                $code = 547;
                break;
            case 'bundesliga':
                $code = 78;
                break;
            case 'dfb-pokal':
                $code = 81;
                break;
            case 'frauen-bundesliga':
                $code = 82;
                break;
            case 'super-cup-deutschland':
                $code = 529;
                break;
            case 'dfb-pokal-f':
                $code = 947;
                break;
            case 'ligue-1':
                $code = 61;
                break;
            case 'division-1-f':
                $code = 64;
                break;
            case 'coupe-de-france':
                $code = 66;
                break;
            case 'trophee-des-champions':
                $code = 526;
                break;
            case 'super-league':
                $code = 207;
                break;
            case 'coupe-suisse':
                $code = 209;
                break;
            case 'super-league-w':
                $code = 739;
                break;
        }
    
        return $code;
    }
    

    public function issetClassement()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/standings",[
            'league' => $this->getCodeCompetition(),
            'season' => 2023
            ]);                 
 
            $data = $response->json();
            $classement = $data['response'];
            return $classement;
    }

    public function getCurrentJournee()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/fixtures/rounds",[
            'league' => $this->getCodeCompetition(),
            'season' => 2023,
            'current' => 'true'
            ]);                 
 
            $data = $response->json();
            $journee = $data['response'];
            return $journee;
    }

    public function getListeJournee()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/fixtures/rounds",[
            'league' => $this->getCodeCompetition(),
            'season' => 2023,
            'current' => 'false'
            ]);                 
 
            $data = $response->json();
            $liste = $data['response'];
            return $liste;
    }
}