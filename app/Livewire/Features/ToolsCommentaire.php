<?php

namespace App\Livewire\Features;

use Livewire\Component;
use App\Models\Commentaire;

class ToolsCommentaire extends Component
{
    public $id;
    public $reponse;
    public $jaime;
    public $partage;
    public $activeJaime = false;
    
    public function like($like, $id){
        $commentaire = Commentaire::findOrFail($id);
        if($this->activeJaime == false){
            $nb = $like + 1;
            $commentaire->nb_jaime = $nb;
            $commentaire->save();
            $this->jaime = $nb;
            $this->activeJaime = true;

        }else if($this->activeJaime == true){
            $nb = $like - 1;
            $commentaire->nb_jaime = $nb;
            $commentaire->save();
            $this->jaime = $nb;
            $this->activeJaime = false;
        }
    }
    public function render()
    {
        return view('livewire.features.tools-commentaire');
    }
}
