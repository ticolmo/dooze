<?php

namespace App\Api\ApiFootball;


class Nomequipe
{
    /* 
    --- La fonction setnom permet de modifier les noms d'équipe de l'Apifootball.php
    
    */

    public function setnom(string $team): string
    {
        $original = $team;

        switch ($team) {
            case "Lyon":
                $team = "Olympique Lyonnais";
                break;
            case "Marseille":
                $team = "Olympique Marseille";
                break;
            case "Montpellier":
                $team = "Montpellier HSC";
                break;
            case "Lens":
                $team = "RC Lens";
                break;
            case "Lille":
                $team = "LOSC";
                break;
            case "Paris Saint Germain":
                $team = "PSG";
                break;
            case "Barcelona":
                $team = "FC Barcelona";
                break;
            case "Valencia":
                $team = "Valencia CF";
                break;
            case "Sevilla":
                $team = "FC Sevilla";
                break;
            case "Liverpool":
                $team = "FC Liverpool";
                break;
            case "Tottenham":
                $team = "Tottenham Hotspurs";
                break;           
            case "Servette Chênois W":
                $team = "Servette FC Chênois Féminin";
                break;           
            case "Rennes":
                $team = "Stade Rennais";
                break;           
            case "LE Havre":
                $team = "Le Havre";
                break;           

            default:
                $team = $original;
                break;
        };
        return $team;
    }
};

