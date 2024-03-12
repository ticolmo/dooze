<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Questionnaire as Sondage;

class Questionnaire extends Component
{
    public $questionnaire;
    public $bouton = true;
    public $mauvaiseReponse = false;
    public $bonneReponse = false;
    public $reponse = '';

    public function mount(Request $request){
        $club = $request->session()->get('club');
        $this->questionnaire = Sondage::where('ref_club', '=', $club )->firstOrFail();
    }

    public function save(Request $request)
    {
        if ($this->reponse == $this->questionnaire->reponse){
            $request->session()->put('questionnaire', "valide");
            $this->bouton = false;
            $this->bonneReponse = true;
            $this->mauvaiseReponse = false;
        } else{
            $this->mauvaiseReponse = true;
            $this->bonneReponse = false;
        }
        
        
    }
    public function render()
    {
        return view('livewire.auth.questionnaire');
    }
}
