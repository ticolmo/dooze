<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Models\Commentaire;

class Commentaires extends Component
{
    public $idclub;
    public $visiteur;

    public function render()
    {
        return view('livewire.club.fans.commentaires', [
            'commentaires' => Commentaire::where([
                ['club_id', '=', $this->idclub],
                ['reponse_id', '=', null],
                ['secteur_visiteur', '=', $this->visiteur],
                ])->with('user')->latest()->paginate(2),
        ]);
    }
}
