<?php

namespace App\View\Components\Scores;

use Closure;
use App\Api\ScoresPageHome;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Scoreshome extends Component
{   
    public $choicedate;

    public function __construct($choicedate)
    {
        $this->choicedate = $choicedate;
    }


    public function getscoreshome(){
             
        $scores = new ScoresPageHome($this->choicedate);
        $matchsdujour = $scores->matchdujour();

        return $matchsdujour;
     
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scores.scoreshome', [
            'matchsdujour' => $this->getscoreshome(),           
        ]);
    }
}
