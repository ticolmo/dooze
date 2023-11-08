<?php

namespace App\Livewire;

use Livewire\Component;

class DetailRencontre extends Component
{   
    public $idrencontre;

    public function render()
    {
        return view('livewire.detail-rencontre');
    }
}
