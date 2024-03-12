<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Session;
use App\Models\Club;
use App\Api\Listepays;
use App\Models\Langue;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;


class Register extends Component
{
    
    public $idclub = '';
    public $langues = '';
    public $club = '';
    public $pays = '';
    public $listepays = '';          
    public $isinvalid = "";
    #[Validate('required|min:5')]
    public $password = '';

    public function mount(Request $request){
        $this->idclub = $request->session()->get('club');
        $this->langues = Langue::select(['id_langue','intitule'])->get();
        $this->club = Club::select('nom')->where('id_club', $this->idclub)->firstOrFail();
        $pays = new Listepays();
        $this->listepays = $pays->getlist();          
        $this->isinvalid = "";
        $request->session()->put('register', "ok");
    }

 

    public function render()
    {
        return view('livewire.auth.register');
    }
}
