<?php

namespace App\Livewire\Partials;


use Livewire\Component;
use Livewire\Attributes\On;


class Navbar extends Component
{   
    public $club;
    public $uri;
    public $ecran;

    public function mount(){
        $this->uri = $_SERVER["REQUEST_URI"];
        
    }



    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
