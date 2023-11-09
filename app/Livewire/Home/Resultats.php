<?php

namespace App\Livewire\Home;

use Livewire\Component;


class Resultats extends Component
{   
    public $dateyesterday;
    public $datetoday;
    public $datetomorrow;
    public $timezone;

   
    public function mount($timezone)
    {
        $this->timezone = $timezone; 
        $this->dateyesterday = date("Y-m-d", strtotime("-1 day"));
        $this->datetoday = date("Y-m-d");
        $this->datetomorrow = date("Y-m-d", strtotime("+1 day"));
        
    }

    

  public function placeholder()
    {
        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->
            <div> Chargement ... </div>
        </div>
        HTML;
    }
    

    public function render()
    {
        return view('livewire.home.resultats');
    }
}
