<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Models\Commentaire;

class Commentaires extends Component
{
    public $idclub;
    public $visiteur;
    public $activeJaime = false;

    public function jaime($like, $id){
        $commentaire = Commentaire::find($id);
        if($this->activeJaime == false){
            $nb = $like + 1;
            $commentaire->nb_jaime = $nb;
            $commentaire->save();
            $this->activeJaime = true;

        }else if($this->activeJaime == true){
            $nb = $like - 1;
            $commentaire->nb_jaime = $nb;
            $commentaire->save();
            $this->activeJaime = false;
        }

    }

    public function render()
    {
        return view('livewire.club.fans.commentaires', [
            'commentaires' => Commentaire::where([
                ['club_id', '=', $this->idclub],
                ['reponse_id', '=', null],
                ['secteur_visiteur', '=', $this->visiteur],
                ])->with('user')->latest()->paginate(6),
        ]);
    }
}
