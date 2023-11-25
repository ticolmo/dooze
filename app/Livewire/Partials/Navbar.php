<?php

namespace App\Livewire\Partials;

use App\Models\Club;
use Livewire\Component;
use App\Api\ListeCompetition;

class Navbar extends Component
{
    public $recherches = [];

    public function mount(){
        $listeClub = Club::where('en_ligne',true)->select('nom')->pluck('nom')->toArray();
        $listCompet = new ListeCompetition();
        $listeCompetition = $listCompet->getIntitule();
        $this->recherches = array_merge($listeCompetition,$listeClub);
        
    }
    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
