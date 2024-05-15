<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Renderless;

class Activity extends Component
{
    public $id;
    public $couleur;
    public $idpagedashboard;
    public $activity;
    public $foo = false;

    #[Url]
    public $part = "";
   /*  #[Url] 
    public $section = ""; */
    
    public function selectPage($selection){
        $this->foo = true;
        $this->redirectRoute('profil', ['activity' => $selection], navigate: true);
        $this->skipRender(); 
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
        /* $this->dispatch('close')->to(Settings::class); 
        $this->page = ""; 
         $this->section = ""; */
        

    }
    
    public function render()
    {       
        return view('livewire.auth.activity');
    }
}
