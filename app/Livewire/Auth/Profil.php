<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Commentaire;

class Profil extends Component
{
    public $id;
    
    public function render()
    {
        return view('livewire.auth.profil',[
            'commentaires' => Commentaire::where('user_id',$this->id)
        ]);
    }
}
