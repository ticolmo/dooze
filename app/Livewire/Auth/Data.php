<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Data extends Component
{
    public $id; 
    public $photo; 
    public $name;
    public $pseudo; 
    public $bio; 
    public $categorie; 
    public $titrelienone;
    public $lienone; 
    public $titrelientwo; 
    public $lientwo;


    public function render()
    {
        return view('livewire.auth.data');
    }
}
