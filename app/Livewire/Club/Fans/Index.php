<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Models\Commentaire;

class Index extends Component
{
    public $idclub;
    public $page = 15;
    public $section;   

    public function pagination(){
        $this->page = $this->page + 6;
    }

    public function render()
    {
        return view('livewire.club.fans.index');
    }
}
