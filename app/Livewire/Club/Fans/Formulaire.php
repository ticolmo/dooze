<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Api\Giphy\Giphy;
use Livewire\Attributes\On;

class Formulaire extends Component
{
    public $idclub;
    public $gif = false;
    public $search = '';
    public $gifs = [];
    public $preview = false;
    public $giphy = '';

    #[On('getGif')] 
    public function getGif(){
        if($this->gif == false){
            $this->gif = true;
        }else{
            $this->gif = false;
        }   
        $this->dispatch('refresh');     
    }

    #[On('getChoixGif')]
    public function fetchGif($idGif){
            $this->preview = true; 
            $this->giphy = $idGif;
            $this->gif = false;
            $this->dispatch('refresh');;
    }        
    
    
    public function render()
    {
        return view('livewire.club.fans.formulaire');
    }
}
