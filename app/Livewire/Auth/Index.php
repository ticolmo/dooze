<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Index extends Component
{
    public $id;
    public $couleur;
    public $idpagedashboard;
    #[Url]
    public $page = "";
    #[Url]
    public $part = "";

    public function mount(){
        $id = uniqid();
        $this->idpagedashboard = $id;
    }

    public function selectPage($selection){
        $this->page = $selection; 
        if($selection == "dashboard"){
            $id = uniqid();
            $this->idpagedashboard = $id;
        }
        $this->part = "";
    }


    public function changePart($choix){
        $this->part = $choix;
        $id = uniqid();
        $this->idpagedashboard = $id;
    }
    
    public function render()
    {        

        return view('livewire.auth.index');
    }
}
