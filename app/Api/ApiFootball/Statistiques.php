<?php

namespace App\Api\ApiFootball;

use App\Api\ApiFootball\NomEquipe;
use App\Api\ApiFootball\ApiFootball;
use Illuminate\Support\Facades\Http;
use App\Api\ApiFootball\CompetitionsParPays;


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
    

    public function getClassement()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/standings",[
            'league' => $this->competition,
            'season' => '2023'
            ]);                 
 
            $data = $response->json();  
            
            foreach($data['response']['0']['league']['standings'] as &$group){
                foreach($group as &$equipe){
                    $check = new NomEquipe();                  
                    $equipe['team']['name'] = $check->setnom($equipe['team']['name']);
                }
            };
            $classement = $data['response'];

            return $classement;
    }

    public function getCurrentJournee()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/fixtures/rounds",[
            'league' => $this->competition,
            'season' => 2023,
            'current' => 'true'
            ]);                
 
            $data = $response->json();
            $journee = $data['response']['0'];
            return $journee;
    }

    public function getListeJournee()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/fixtures/rounds",[
            'league' => $this->competition,
            'season' => 2023,
            'current' => 'false'
            ]);                 
 
            $data = $response->json();
            $liste = $data['response'];
            return $liste;
    }

    public function getMeilleursButeurs()
    {
        $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/players/topscorers",[
            'league' => $this->competition,
            'season' => 2023
            ]);                 
 
            $data = $response->json();
           
            foreach($data['response'] as &$buteur){
                $check = new NomEquipe(); 
                $buteur['statistics']['0']['team']['name'] = $check->setnom($buteur['statistics']['0']['team']['name']);
            };
            $liste = $data['response'];
            return $liste;
    }

    public function getCodeBackgroundImage()
    {   
        $code = null;
        $pays = new CompetitionsParPays("2023-11-17");
        if(in_array($this->competition,$pays->getEurope())){
            $code = "00";
        }
        if(in_array($this->competition,$pays->getEngland())){
            $code = "01";
        }
        if(in_array($this->competition,$pays->getSpain())){
            $code = "02";
        }
        if(in_array($this->competition,$pays->getItaly())){
            $code = "03";
        }
        if(in_array($this->competition,$pays->getGermany())){
            $code = "04";
        }
        if(in_array($this->competition,$pays->getFrance())){
            $code = "05";
        }
        if(in_array($this->competition,$pays->getSwitzerland())){
            $code = "06";
        }      

        return $code;
      
    }
}