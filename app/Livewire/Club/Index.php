<?php

namespace App\Livewire\Club;

use Livewire\Component;
use Livewire\Attributes\Url; 

class Index extends Component
{
    public $flux;
    public $urlclub;
    public $nom;
    public $idclub;
    public $couleur;
    public $idpagefans;
    public $fluxrs;
    #[Url]
    public $page = "";
    #[Url]
    public $section = "";

    public function mount(){
        $id = uniqid();
        $this->idpagefans = $id;
    }

    public function selectPage($selection){
        $this->page = $selection;
        if($selection == "fans"){
            $id = uniqid();
            $this->idpagefans = $id;
        }
        $this->section = "";
    }
    
    public function selectSectionFans($choix){
        $this->section = $choix;
        $id = uniqid();
        $this->idpagefans = $id;
        
    }

    public function render()
    {
        return view('livewire.club.index');
    }
}
