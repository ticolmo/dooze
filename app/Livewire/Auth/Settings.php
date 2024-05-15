<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class Settings extends Component
{
    public $titre;
    public $sectionCompte = false;
    #[Url] 
    public $section;

    public function changeSection($intitule, $section)
    {        
        $this->titre = $intitule;
        $this->section = $section;
        /* $this->dispatch('urlsettings', url: $section)->to(Index::class); */

    }
    #[On('close')] 
    public function close()
    {         
        $close = "";    
        $this->section = $close;
        $this->titre = $close;
        $this->dispatch('page', selection: $close)->to(Index::class); 
        $this->skipRender();     

    }

    #[Layout('auth.index')] 
    public function render()
    {
        return view('livewire.auth.settings');
    }
}
