<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Models\Commentaireclub;
use App\Models\Commentairevisiteur;
use Livewire\Attributes\Url;

class Index extends Component
{
    public $idclub;
    public $page = 15;
    #[Url]
    public $section = "";

    public function selectSection($selection){
        $this->section = $selection;        
    }

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
