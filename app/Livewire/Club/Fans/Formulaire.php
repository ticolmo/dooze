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
          /*   $trends = new Giphy();
            $this->gifs = $trends->trend(); */
        }else{
            $this->gif = false;
        }        
    }

    #[On('getChoixGif')]
    public function fetchGif($idGif){
            $this->preview = true; 
            $this->giphy = $idGif;
            $this->gif = false;
    }        
    


/*     public function recherche(){
        if(strlen($this->search) > 1){
            $resultat = new Giphy();
            $this->gifs = $resultat->search($this->search);
        }elseif (strlen($this->search) == 0) {
            // Si la recherche est effacé, affichez à nouveau les tendances
            $trends = new Giphy();
            $this->gifs = $trends->trend();
        }
    }

    public function choixgif($gifo) { 
        $this->preview = true;       
        $this->giphy = $gifo;
        
      } */
    
    public function render()
    {
        return view('livewire.club.fans.formulaire');
    }
}
