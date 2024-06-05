<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Birthday extends Component
{
    public $day = 01;
    public $month;
    public $year;
    
    public function render()
    {
        return view('livewire.auth.birthday');
    }
}
