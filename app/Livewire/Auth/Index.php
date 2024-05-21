<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;


class Index extends Component
{
    public $fan; 
    public $activity = null; 

    public function mount(){
        $this->fan = User::with(['club','langue'])->findOrFail(auth()->user()->id);   
        // Enregistrement de la date de connexion  
        $this->fan->derniere_connexion = now();
        $this->fan->save();
        // Si l'utilisateur est administrateur
        if ($this->fan->is_admin) {    
        return redirect()->route('admin.index');
        };
       
    }

    
    public function render()
    {        
        return view('livewire.auth.index'); 
        ;
    }
}
