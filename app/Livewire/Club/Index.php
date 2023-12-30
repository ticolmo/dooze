<?php

namespace App\Livewire\Club;

use Livewire\Component;
use Livewire\Attributes\Url;

class Index extends Component
{
    public $flux;
    public $nom;
    public $idclub;
    public $couleur;
    #[Url]
    public $page = "";

    public function selectPage($selection){
        $this->page = $selection;
    }
    public function render()
    {
        return view('livewire.club.index');
    }
}
