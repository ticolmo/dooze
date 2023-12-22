<?php

namespace App\View\Components\Competition;

use Closure;
use App\Api\ApiFootball\Statistiques;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Buteurs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $codecompetition)
    {
    
    }

    public function buteurs(){        
        
        $competitionConfirmed = new Statistiques($this->codecompetition);
        $meilleursButeurs = $competitionConfirmed->getMeilleursButeurs();
        return $meilleursButeurs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.competition.buteurs', [
            'meilleursButeurs' => $this->buteurs()
        ]);
    }
}
