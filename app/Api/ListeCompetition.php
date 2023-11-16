<?php

namespace App\Api;

class ListeCompetition 
{
    public function getListeCompetition() {
        $listeCompetitions = array(
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
        );

        return $listeCompetitions;
    }
}
