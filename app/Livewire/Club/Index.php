<?php

namespace App\Livewire\Club;

use Livewire\Component;
use Livewire\Attributes\Url;

class Index extends Component
{
    public $flux;
    public $nom;
    public $idclub;
    #[Url]
    public $section = "";

    public function page($selection){
        $this->section = $selection;
    }
    public function render()
    {
        return view('livewire.club.index');
    }
}
