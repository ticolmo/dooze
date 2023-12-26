<?php

namespace App\Livewire\Club\Bulletin;

use Livewire\Component;

class RedirectRencontre extends Component
{
    public $lastmatch;
    public $redirection = false;

    public function mount($lastmatch){
        if (in_array($lastmatch['fixture']['status']['short'], ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'SUSP', 'INT','FT', 'AET', 'PEN'])){
            $this->redirection = true;    
        }
    }

    public function redirectDetailRencontre($idRencontre){
        $this->redirectRoute('detailrencontre', ['id' => $idRencontre]);
    }
    public function render()
    {
        return view('livewire.club.bulletin.redirect-rencontre');
    }
}
