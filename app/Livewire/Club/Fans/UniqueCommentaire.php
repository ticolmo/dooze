<?php

namespace App\Livewire\Club\Fans;

use Livewire\Component;
use App\Models\Commentaire;
use Livewire\Attributes\Url;

class UniqueCommentaire extends Component
{
    public $activeJaime = false;
    #[Url]    
    public $edit;

    public function mount() {
       if ($this->edit == ""){
        abort(404);
       }
    }
    public function jaime($like, $id){
        $commentaire = Commentaire::findOrFail($id);
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
    public function exit(){
        $commentaire = Commentaire::findOrFail($this->edit);
        $url = $commentaire->club->url;
        $this->redirect("/club/$url/?page=fans", navigate: true);
    }

    public function render()
    {
        return view('livewire.club.fans.unique-commentaire',[
            'commentaire' => Commentaire::findOrFail($this->edit),
            'reponses' => Commentaire::where('reponse_id',$this->edit)->latest()->paginate(6)
        ]);
    }
}
