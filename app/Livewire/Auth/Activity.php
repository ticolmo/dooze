<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Renderless;

class Activity extends Component
{
    public $id;
    public $couleur;
    public $idpagedashboard;
    public $activity;
    public $foo = false;


    public function render()
    {       
        return view('livewire.auth.activity');
    }
}
