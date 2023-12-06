<?php

namespace App\Livewire\Club\Fans;

use App\Api\Giphy\Giphy;
use Livewire\Component;

class Gif extends Component
{
    public $search = '';
    public $gifs = [];

    public function mount(){
        $trends = new Giphy();
        $this->gifs = $trends->trend();
    }


    public function recherche(){
        if(strlen($this->search) > 1){
            $resultat = new Giphy();
            $this->gifs = $resultat->search($this->search);
        }elseif (strlen($this->search) == 0) {
            // Si la recherche est effacé, affichez à nouveau les tendances
            $trends = new Giphy();
            $this->gifs = $trends->trend();
        }
    }

    public function close(){
        $this->dispatch('getGif');
    }

    
    public function render()
    {
        return view('livewire.club.fans.gif');
    }
}
