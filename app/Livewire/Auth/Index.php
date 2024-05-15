<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Renderless;

class Index extends Component
{
    public $id;
    public $couleur;
    public $idpagedashboard;
    #[Url]
    public $page = "";
    #[Url]
    public $part = "";
   /*  #[Url] 
    public $section = ""; */

    public function mount(){
        $id = uniqid();
        $this->idpagedashboard = $id;
    }

    #[On('page')] 
    public function selectPage($selection){
        
        $this->page = $selection; 
        if($selection == "dashboard"){
            $id = uniqid();
            $this->idpagedashboard = $id;
        }
    }


    public function changePart($choix){
        $this->part = $choix;
        $id = uniqid();
        $this->idpagedashboard = $id;
    }
    /* #[On('urlsettings')] 
    public function changeSettings($url){
        $this->section = $url;
        $this->skipRender(); 
    } */

    #[Renderless] 
    public function closeSettings(){
        /* $this->dispatch('close')->to(Settings::class); */
        $this->page = ""; 
       /*  $this->section = ""; */
        

    }
    
    public function render()
    {        
        return view('livewire.auth.index');
    }
}
