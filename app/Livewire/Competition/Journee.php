<?php

namespace App\Livewire\Competition;

use Livewire\Component;
use App\Api\Statistiques;
use App\Api\JourneePageStatistiques;

class Journee extends Component
{   
    public $journee;
    public $listeJournee;
    public $matchs = []; 
 
    public function mount($competition, $codeCompetition)
    {   
        $competitionConfirmed = new Statistiques($competition);
        $this->journee = $competitionConfirmed->getCurrentJournee();
        $this->listeJournee = $competitionConfirmed->getListeJournee();

         
        $data = new JourneePageStatistiques();
        $this->matchs = $data->getListeMatchs($this->journee, $codeCompetition);
       
    }
    public function render()
    {
        return view('livewire.competition.journee');
    }
}
