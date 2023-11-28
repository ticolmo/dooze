<?php

namespace App\Livewire\Competition;

use Livewire\Component;
use Livewire\Attributes\Url;

class Index extends Component
{
    public $journee;
    public $competition;
    public $codeCompetition;
    public $meilleursButeurs;
    public $classement;
    #[Url]
    public $section = "";

    public function page($selection){
        $this->section = $selection;
    }
    public function render()
    {
        return view('livewire.competition.index');
    }
}
