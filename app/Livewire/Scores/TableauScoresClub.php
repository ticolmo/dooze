<?php

namespace App\Livewire\Scores;

use Livewire\Component;
use App\Api\ApiFootball\ScoresPageClub;

class TableauScoresClub extends Component
{
    public $scoreshomme;
    public $scoresfemme;
    public $live;
    public $matchshomme;
    public $matchsfemme;

    public function mount(){
        $wilander = new ScoresPageClub();
        $this->live = $wilander->liveactif($this->scoreshomme, $this->scoresfemme);
        $this->matchshomme = $wilander->matchshomme($this->scoreshomme);
        $this->matchsfemme = $wilander->matchsfemme($this->scoresfemme);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="text-center">
            <div> Résultats </div>
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>  
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.scores.tableau-scores-club',[
            'idequipefemme' => $this->scoresfemme,
            'live' => $this->live,
            'matchshomme' => $this->matchshomme,
            'matchsfemme' => $this->matchsfemme
        ]);
    }
}
