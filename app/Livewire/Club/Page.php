<?php

namespace App\Livewire\Club;

use Livewire\Component;
use Livewire\Attributes\Url;

class Page extends Component
{
    public $flux;
    public $nom;
    public $idclub;
    #[Url]
    public $choice = "";

    public function page($selection){
        $this->choice = $selection;
    }
    public function render()
    {
        return view('livewire.club.page');
    }
}
