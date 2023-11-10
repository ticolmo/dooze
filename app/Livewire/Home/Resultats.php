<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Api\ListeTimezone;



class Resultats extends Component
{   
    
    public $timezone;
    public $dateyesterday;
    public $datetoday;
    public $datetomorrow;    
    public $listeTimezone = [];


   
    public function mount($timezone)
    {
        $this->timezone = $timezone; 
        $liste = new ListeTimezone();
        $this->listeTimezone = $liste->getlist(); 
        $this->dateyesterday = date("Y-m-d", strtotime("-1 day"));
        $this->datetoday = date("Y-m-d");
        $this->datetomorrow = date("Y-m-d", strtotime("+1 day"));        
    }  

    public function changeTimezone($fuseau)
    {
        $this->timezone = $fuseau;
        
    }

    

    public function render()
    {
        return view('livewire.home.resultats');
    }
}
