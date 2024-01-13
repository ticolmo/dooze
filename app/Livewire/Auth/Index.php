<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Url;

class Index extends Component
{
    public $id;
    public $couleur;
    #[Url]
    public $page = "";

    public function selectPage($selection){
        $this->page = $selection;
        

    }
    
    public function render()
    {        

        return view('livewire.auth.index');
    }
}
