<?php

namespace App\Api;

use App\Api\ResultatsJour;


class CompetitionsParPays extends ResultatsJour
{
    public function __construct($datechoisie){
        parent::__construct($datechoisie);        
    }
    public function getEurope(){
        return $this->europeleague;
    }
    public function getEngland(){
        return $this->englandleague;
    }
    public function getSpain(){
        return $this->spainleague;
    }
    public function getItaly(){
        return $this->italyleague;
    }
    public function getGermany(){
        return $this->germanyleague;
    }
    public function getFrance(){
        return $this->franceleague;
    }
    public function getSwitzerland(){
        return $this->switzerlandleague;
    }
    public function getMatchsAmicaux(){
        return $this->matchsamicauxcode;
    }
}