<?php

namespace App\Livewire\Statistiques;

use App\Api\JourneePageStatistiques;
use Livewire\Component;

class Journee extends Component
{   
    public $journee;
    public $listeJournee;
    public $matchs = []; 
 
    public function mount($journee, $codeCompetition)
    {
        $this->journee = $journee; 
        $data = new JourneePageStatistiques();
        $this->matchs = $data->getListeMatchs($journee, $codeCompetition);
    }
    public function render()
    {
        return view('livewire.statistiques.journee');
    }
}
