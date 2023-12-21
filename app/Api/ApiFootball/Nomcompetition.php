<?php

namespace App\Api\ApiFootball;


class Nomcompetition
{
    /* 
    --- La fonction setnom permet de modifier les noms des compétitions de l'Apifootball.php
    
    */

    public function setnom(string $league): string
    {
        $original = $league;

        switch ($league) {
            case "Schweizer Pokal":
                $team = "Schweizer Cup / Coupe Suisse";
                break;                         
            case "FA WSL":
                $team = "Women's Super League";
                break;         

            default:
                $team = $original;
                break;
        };
        return $team;
    }
};

