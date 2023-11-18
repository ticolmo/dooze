<?php

namespace App\Livewire\Features;

use Livewire\Component;

class ListeDeroulante extends Component
{   
    public $selection;
    public $tableau;

    public function change($choice)
    {
        $this->selection = $choice;
        $this->dispatch('listeDeroulante', choix: $this->selection);
        
    }

    public function render()
    {
        return view('livewire.features.liste-deroulante');
    }
}
