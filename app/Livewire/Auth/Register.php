<?php

namespace App\Livewire\Auth;

use App\Models\Club;
use App\Models\User;
use App\Rules\Majuscule;
use App\Api\Listepays;
use App\Models\Langue;
use App\Rules\Chiffre;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\CaractereSpecial;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Validator;


class Register extends Component
{
    public $user;
    #[Session(key: 'club')] 
    public $idclub;
    public $langues = '';
    public $clubs;
    public $pays = '';
    public $listepays = '';          
    public $isinvalid = "";
    #[Validate]
    public $password = '';
    #[Validate]
    public $pseudo = '';
    public $formulaireValide = false;

    public function mount(Request $request){
        $this->langues = Langue::select(['id_langue','intitule'])->get();
        $this->clubs = Club::select('nom')->where('id_club', $this->idclub)->get();
        $pays = new Listepays();
        $this->listepays = $pays->getlist();          
        $this->isinvalid = "";
        $request->session()->put('register', "ok");
    }

  

    public function rules()
    {
        $this->user = new User();
        return [
            'pseudo' => [
                'required',
                'min:5',
                Rule::unique('users')->ignore($this->user), 
            ],
            'password' => ['required', 'string', 'min:8', new Majuscule, new Chiffre, new CaractereSpecial],

        ];
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
