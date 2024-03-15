<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Api\ListeTimezone;



class Resultats extends Component
{   
    
    public $timezone;
    public $dateyesterday;
    public $datetoday;
    public $datetomorrow;    
    public $listeTimezone = [];


   
    public function mount($timezone = null)
    {
        $this->timezone = $timezone; 
        $liste = new ListeTimezone();
        $this->listeTimezone = $liste->getlist(); 
        $this->dateyesterday = date("Y-m-d", strtotime("-1 day"));
        $this->datetoday = date("Y-m-d"); 
        $this->datetomorrow = date("Y-m-d", strtotime("+1 day"));        
    }


    #[On('listeDeroulante')]
    public function changeTimezone($choix)
    {
        $this->timezone = $choix;
        app('request')->session()->put('timezone', "$choix");
        
    }

    public function render()
    {
        return view('livewire.home.resultats');
    }
}
