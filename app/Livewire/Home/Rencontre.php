<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Api\ScoresPageHome;
use Livewire\Attributes\Reactive;

class Rencontre extends Component
{
    #[Reactive] 
    public $timezone;
    public $matchsdujour;
    public $choicedate;

    public function mount(){
             
        $scores = new ScoresPageHome($this->choicedate);
        $this->matchsdujour = $scores->matchdujour();
       
    }

    
 



    public function render()
    {
        return view('livewire.home.rencontre');
    }
}
