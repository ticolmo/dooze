<?php

namespace App\Api;

use App\Api\ApifootballPageHome;

/* mise dans l'ordre des compétitions */

class ScoresPageHome extends ApifootballPageHome
{
    public function __construct($datechoisie){
        parent::__construct($datechoisie);        
    }


    public function europe(){
        $pays = $this->europa();

        if(isset($pays)){
            foreach ($pays as $match){
                if($match['league']['id'] == 3){
                    $competition['UEFAEuropaLeague'][] = $match;
                };
                if($match['league']['id'] == 2){
                    $competition['UEFAChampionsLeague'][] = $match;
                };
                if($match['league']['id'] == 848){
                    $competition['UEFAEuropaConferenceLeague'][] = $match;
                };
                if($match['league']['id'] == 531){
                    $competition['UEFASuperCup'][] = $match;
                };
                if($match['league']['id'] == 525){
                    $competition['UEFAChampionsLeagueWomen'][] = $match;
                };
                
            };
            
            return $competition;
        }
        
    }
    public function england(){
        $pays = $this->angleterre();

        if(isset($pays)){
        foreach ($pays as $match){
            if($match['league']['id'] == 39){
                $competition['PremierLeague'][] = $match;
            };
            /* FA Cup les matchs de FA cup ne renvoie pas de résultats */
           /*  if($match['league']['id'] == 45){
                $competition['FACup'][] = $match;
            }; */
            if($match['league']['id'] == 48){
                $competition['LeagueCup'][] = $match;
            };
            if($match['league']['id'] == 528){
                $competition['CommunityShield'][] = $match;
            };
            if($match['league']['id'] == 670){
                $competition['CommunityShieldWomen'][] = $match;
            };
            if($match['league']['id'] == 698){
                $competition['FAWomensCup'][] = $match;
            };
            if($match['league']['id'] == 44){
                $competition['FAWSL'][] = $match;
            };

             
        };
        return $competition;
        }
    }
    public function spain(){
        $pays = $this->espagne();

        if(isset($pays)){
        foreach ($pays as $match){
            if($match['league']['id'] == 140){
                $competition['LaLiga'][] = $match;
            };
            if($match['league']['id'] == 142){
                $competition['PrimeraDivisiónFemenina'][] = $match;
            };
            if($match['league']['id'] == 143){
                $competition['CopadelRey'][] = $match;
            };
            if($match['league']['id'] == 556){
                $competition['SuperCup'][] = $match;
            };
             
        };

        return $competition;
        }
    }
    public function italy(){
        $pays = $this->italie();

        if(isset($pays)){
        foreach ($pays as $match){
            if($match['league']['id'] == 135){
                $competition['SerieA'][] = $match;
            };
            if($match['league']['id'] == 137){
                $competition['CoppaItalia'][] = $match;
            };
            if($match['league']['id'] == 139){
                $competition['SerieAWomen'][] = $match;
            };
            if($match['league']['id'] == 547){
                $competition['SuperCup'][] = $match;
            };
             
        };

        return $competition;
        }
    }
    public function germany(){
        $pays = $this->allemagne();

        if(isset($pays)){
        foreach ($pays as $match){
            if($match['league']['id'] == 78){
                $competition['Bundesliga'][] = $match;
            };
            if($match['league']['id'] == 81){
                $competition['DFBPokal'][] = $match;
            };
            if($match['league']['id'] == 82){
                $competition['FrauenBundesliga'][] = $match;
            };
            if($match['league']['id'] == 529){
                $competition['SuperCup'][] = $match;
            };
            if($match['league']['id'] == 947){
                $competition['DFBPokal-Women'][] = $match;
            };
             
        };

        return $competition;
        }
    }

    public function france(){
        $pays = $this->frankreich();

        if(isset($pays)){
        foreach ($pays as $match){
            if($match['league']['id'] == 61){
                $competition['Ligue1'][] = $match;
            };
            if($match['league']['id'] == 64){
                $competition['FeminineDivision1'][] = $match;
            };
            if($match['league']['id'] == 66){
                $competition['CoupedeFrance'][] = $match;
            };
            if($match['league']['id'] == 526){
                $competition['TrophéedesChampions'][] = $match;
            };
             
        };

        return $competition;
        }
    }
    public function switzerland(){
        $pays = $this->suisse();

        if(isset($pays)){
        foreach ($pays as $match){
            if($match['league']['id'] == 207){
                $competition['SuperLeague'][] = $match;
            };
            if($match['league']['id'] == 209){
                $competition['SchweizerPokal'][] = $match;
            };
            if($match['league']['id'] == 739){
                $competition['NationalligaAWomen'][] = $match;
            };
             
        };

        return $competition;
        }
    }

    public function matchsamicaux(){
        return $this->getmatchsamicaux();
    }

    public function matchdujour(){
        $matchsdujour = [$this->europe(), $this->england(),$this->spain(), $this->italy(),$this->germany(),$this->france(),$this->switzerland(), $this->matchsamicaux()];

        return $matchsdujour;
    }
}