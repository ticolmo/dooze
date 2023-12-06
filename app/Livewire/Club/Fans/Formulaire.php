<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use Livewire\Attributes\On;

class Formulaire extends Component
{
    public $idclub;
    public $gif = false;

    #[On('getGif')]
    public function getGif(){
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
