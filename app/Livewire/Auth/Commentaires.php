<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\Commentaire;

class Commentaires extends Component
{
    public $id;
    public $fan;

    public function mount(){
        $this->fan =  User::with(['club','langue'])->findOrFail(auth()->user()->id);   
    }
    
    public function render()
    {
        return view('livewire.auth.commentaires',[
            'commentaires' => Commentaire::where('user_id',$this->id)->get()
        ]);
    }
}
