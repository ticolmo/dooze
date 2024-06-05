<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class Settings extends Component
{
    public $titre;
    public $niveauAccount = ['account', 'info', 'password', 'annulation'];
    public $niveauNotif = ['notifications'];
    #[Url] 
    public $section = "";
    public $precedentNiveau;

    public function changeSection($section)
    {    
        if($this->section == 'account' || $this->section == 'notifications'){
            $this->precedentNiveau = "?section=".$this->section;
        } 
        $this->section = $section; 
    }

    public function render()
    {
        return view('livewire.auth.settings');
    }
}
