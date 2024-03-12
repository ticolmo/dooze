<?php

namespace App\Livewire\Auth;

use App\Models\Club;
use Livewire\Attributes\Validate; 
use Livewire\Component;

class ChoixClub extends Component
{
    public $clubs = [];
    #[Validate('required')] 
    public $club = '';

    public function mount(){
      $this->clubs = Club::where('en_ligne',true)->select(['id_club','nom'])->orderBy('nom')->get(); 
    }

    public function save()
    {
        $idclubs = [];
        foreach ($this->clubs as $club){
            $idclubs[] = $club->id_club;
        };
        $request = app('request');
        if(in_array($this->club, $idclubs)){
            
          $request->session()->put('club', "$this->club");  
        }else{
            abort(404);
        }

        return $this->redirect('/question', navigate: true);
        
    }
    

    public function render()
    {
        return view('livewire.auth.choix-club');
    }
}
