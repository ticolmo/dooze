<?php

namespace App\Livewire\Home;

use Livewire\Component;

class DetailMatch extends Component
{   
    public $idrencontre;

    public function render()
    {
        return view('livewire.home.detail-match');
    }
}
