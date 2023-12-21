<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Formulaire extends Component
{
    use WithFileUploads;
    
    public $photo;

    public $idclub;
    public $visiteur;
    public $gif = false;
    public $search = '';
    public $gifs = [];
    public $preview = false;
    public $giphy = '';
    public $lieu = "";
   

    

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
            $this->dispatch('refresh');
    }        
    
    
    public function render()
    {
        return view('livewire.club.fans.formulaire');
    }
}
