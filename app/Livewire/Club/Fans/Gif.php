<?php

namespace App\Livewire\Club\Fans;

use App\Api\Giphy\Giphy;
use Livewire\Component;

class Gif extends Component
{
    public $search = '';

    public function close(){
        $this->dispatch('getGif');
    }
    public function choixGif($choix){
        $this->dispatch('getChoixGif', idGif: $choix);
    }

    
    public function render()
    {
        if (strlen($this->search) < 2){
            $trends = new Giphy();
           return view('livewire.club.fans.gif', [
            'gifs' => $trends->trend()
           ]); 
        } else if(strlen($this->search) > 1){
            $resultat = new Giphy();
            return view('livewire.club.fans.gif', [
                'gifs' => $resultat->search($this->search)
            ]);
        }
          
    }
}
