<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;

class Formulaire extends Component
{
    public $idclub;
    public $gif = false;

    public function setGif(){
        if($this->gif == false){
            $this->gif = true;
        }else{
            $this->gif = false;
        }        
    }
    
    public function render()
    {
        return view('livewire.club.fans.formulaire');
    }
}
