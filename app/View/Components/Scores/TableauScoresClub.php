<?php

namespace App\View\Components\Scores;

use App\Api\ScoresPageClub;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableauScoresClub extends Component
{
    public $scoreshomme;
    public $scoresfemme;
    /**
     * Create a new component instance.
     */
    public function __construct(int $scoreshomme, int $scoresfemme)
    {
        $this->scoreshomme = $scoreshomme;
        $this->scoresfemme = $scoresfemme;
    }

    private function scorepageclub(){
        $wilander = new ScoresPageClub();
        return $wilander;
    }

    public function djokovic()
    {
        $liveactif = $this->scorepageclub()->liveactif($this->scoreshomme, $this->scoresfemme);
    
        return $liveactif;
        
    }
    public function mec()
    {
        $matchs = $this->scorepageclub()->matchshomme($this->scoreshomme);
    
        return $matchs;
        
    }
    public function miss()
    {
        $matchs = $this->scorepageclub()->matchsfemme($this->scoresfemme);
    
        return $matchs;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scores.tableau-scores-club',[
            'idequipefemme' => $this->scoresfemme,
            'live' => $this->djokovic(),
            'matchshomme' => $this->mec(),
            'matchsfemme' => $this->miss()
        ]);
    }
}
