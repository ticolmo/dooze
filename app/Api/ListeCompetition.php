<?php

namespace App\Api;

class ListeCompetition 
{
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
            'community-shield-w',
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
            'Community Shield W',
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
}
