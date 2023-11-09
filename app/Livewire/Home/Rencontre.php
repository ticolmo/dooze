<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Api\ScoresPageHome;

class Rencontre extends Component
{
    public $timezone;
    public $matchsdujour;
    public $choicedate;

    public function mount(){
             
        $scores = new ScoresPageHome($this->choicedate);
        $this->matchsdujour = $scores->matchdujour();
       
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->
            <svg>...Chargement.. </svg>
        </div>
        HTML;
    }
 



    public function render()
    {
        return view('livewire.home.rencontre');
    }
}
