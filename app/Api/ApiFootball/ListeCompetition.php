<?php

namespace App\Api\ApiFootball;

class ListeCompetition 
{
    /* en cas de changement ne pas oublier de changer les urls dans Api/Statistiques */
    public function getUrl() {
        $listeCompetitions = [
            'champions-league',
            'europa-league',
            'conference-league',
            'uefa-super-cup',
            'champions-league-w',
            'premier-league',
            'league-cup',
            'community-shield',
            'fa-womens-cup',
            'fawsl',
            'liga',
            'primera-division-f',
            'copa-del-rey',
            'super-cup-espana',
            'seria-a',
            'coppa-italia',
            'seria-a-f',
            'super-cup-italia',
            'bundesliga',
            'dfb-pokal',
            'frauen-bundesliga',
            'super-cup-deutschland',
            'dfb-pokal-f',
            'ligue-1',
            'division-1-f',
            'coupe-de-france',
            'trophee-des-champions',
            'super-league',
            'coupe-suisse',
            'super-league-w',
        ];

        return $listeCompetitions;
    }

    public function getIntitule(){
        $listeCompetitions = [
            'Champions League',
            'Europa League',
            'Conference League',
            'UEFA Super Cup',
            'Champions League W',
            'Premier League',
            'League Cup',
            'Community Shield',
            'FA Womens Cup',
            'FA WSL',
            'Liga',
            'Primera Division F',
            'Copa del Rey',
            'Super Cup Espana',
            'Serie A',
            'Coppa Italia',
            'Serie A F',
            'Super Cup Italia',
            'Bundesliga',
            'DFB Pokal',
            'Frauen Bundesliga',
            'Super Cup Deutschland',
            'DFB Pokal F',
            'Ligue 1',
            'Division 1 F',
            'Coupe de France',
            'Trophee des Champions',
            'Super League',
            'Coupe Suisse',
            'Super League W'
            ];

        return $listeCompetitions;
    }

    public function setIntituleInUrl($intitule){
        $url = null;
        switch ($intitule) {
            case 'Champions League':
                $url = 'champions-league';
                break;
            case 'Europa League':
                $url = 'europa-league';
                break;
            case 'Conference League':
                $url = 'conference-league';
                break;
            case 'UEFA Super Cup':
                $url = 'uefa-super-cup';
                break;
            case 'Champions League W':
                $url = 'champions-league-w';
                break;
            case 'Premier League':
                $url = 'premier-league';
                break;
            case 'League Cup':
                $url = 'league-cup';
                break;
            case 'Community Shield':
                $url = 'community-shield';
                break;
            case 'Community Shield W':
                $url = 'community-shield-w';
                break;
            case 'FA Womens Cup':
                $url = 'fa-womens-cup';
                break;
            case 'FA WSL':
                $url = 'fawsl';
                break;
            case 'Liga':
                $url = 'liga';
                break;
            case 'Primera Division F':
                $url = 'primera-division-f';
                break;
            case 'Copa del Rey':
                $url = 'copa-del-rey';
                break;
            case 'Super Cup Espana':
                $url = 'super-cup-espana';
                break;
            case 'Serie A':
                $url = 'seria-a';
                break;
            case 'Coppa Italia':
                $url = 'coppa-italia';
                break;
            case 'Serie A F':
                $url = 'seria-a-f';
                break;
            case 'Super Cup Italia':
                $url = 'super-cup-italia';
                break;
            case 'Bundesliga':
                $url = 'bundesliga';
                break;
            case 'DFB Pokal':
                $url = 'dfb-pokal';
                break;
            case 'Frauen Bundesliga':
                $url = 'frauen-bundesliga';
                break;
            case 'Super Cup Deutschland':
                $url = 'super-cup-deutschland';
                break;
            case 'DFB Pokal F':
                $url = 'dfb-pokal-f';
                break;
            case 'Ligue 1':
                $url = 'ligue-1';
                break;
            case 'Division 1 F':
                $url = 'division-1-f';
                break;
            case 'Coupe de France':
                $url = 'coupe-de-france';
                break;
            case 'Trophee des Champions':
                $url = 'trophee-des-champions';
                break;
            case 'Super League':
                $url = 'super-league';
                break;
            case 'Coupe Suisse':
                $url = 'coupe-suisse';
                break;
            case 'Super League W':
                $url = 'super-league-w';
                break;
        }

        return $url;
    }
}
