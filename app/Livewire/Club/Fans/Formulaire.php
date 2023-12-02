<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;

class Formulaire extends Component
{
    public $idclub;
    
    public function render()
    {
        return view('livewire.club.fans.formulaire');
    }
}
