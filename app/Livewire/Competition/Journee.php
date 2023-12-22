<?php

namespace App\Livewire\Competition;

use Livewire\Component;
use App\Api\ApiFootball\Statistiques;
use Livewire\Attributes\On;
use App\Api\ApiFootball\JourneePageStatistiques;

class Journee extends Component
{   
    public $journee;
    public $listeJournee;
    public $matchs = []; 
    public $codeCompetition;
 
    public function mount($codeCompetition)
    {   
        $competitionConfirmed = new Statistiques($codeCompetition);
        $this->journee = $competitionConfirmed->getCurrentJournee();
        $this->listeJournee = $competitionConfirmed->getListeJournee();
        $this->codeCompetition = $codeCompetition;

         
        $data = new JourneePageStatistiques();
        $this->matchs = $data->getListeMatchs($this->journee, $this->codeCompetition);
       
    }

    #[On('listeDeroulante')]
    public function changeJournee($choix){
        $this->journee = $choix;
        $data = new JourneePageStatistiques();
        $this->matchs = $data->getListeMatchs($this->journee, $this->codeCompetition);
    }

    public function redirectDetailRencontre($idRencontre){

        $this->redirectRoute('detailrencontre', ['id' => $idRencontre]);

    }


    public function render()
    {
        return view('livewire.competition.journee');
    }
}
