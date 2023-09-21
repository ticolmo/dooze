<?php

namespace App\View\Components\Scores;

use App\Api\ApiFootball;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Scoresclub extends Component
{
    public $apiscores;
    /**
     * Create a new component instance.
     */
    public function __construct($apiscores) 
    {
        $this->apiscores = $apiscores;
        
    }
 

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scores.scoresclub');
    }
    
}
