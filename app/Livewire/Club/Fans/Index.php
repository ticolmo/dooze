<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Models\Commentaireclub;
use App\Models\Commentairevisiteur;

class Index extends Component
{
    public $idclub;
    public $page = 2;

    public function pagination(){
        $this->page = $this->page + 6;
    }

    public function render()
    {
        return view('livewire.club.fans.index',[
            'commentaireclub' => Commentaireclub::where('club_id', $this->idclub)->with('reponse.user','reponse.publication','user','publication')->withCount('reponse')->latest()->limit($this->page)->get(),
            'commentairevisiteur' => Commentairevisiteur::where('club_id', $this->idclub)->with('reponse.user.club','reponse.publication','user.club','publication')->withCount('reponse')->latest()->limit($this->page)->get(),
        ]);
    }
}
