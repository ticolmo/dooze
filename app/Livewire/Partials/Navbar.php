<?php

namespace App\Livewire\Partials;

use App\Models\Club;
use App\Models\User;
use Livewire\Component;
use App\Models\Competition;
use App\Api\ApiFootball\ListeCompetition;
use App\Http\Controllers\CompetitionController;

class Navbar extends Component
{    
    public $recherches = [];
    public $listeClub;
    public $listeCompetition;
    public $user = [];

    public function mount(){
        $this->listeClub = Club::where('en_ligne',true)->select('nom')->pluck('nom')->toArray();
        $this->listeCompetition = Competition::where('has_page_competition', true)->select('intitule')->pluck('intitule')->toArray();
        $pseudos = User::select('pseudo')->pluck('pseudo')->all();
        foreach ($pseudos as $pseudo){
            $this->user[] = "@".$pseudo;
        }
        $this->recherches = array_merge($this->listeCompetition,$this->listeClub, $this->user);
        
    }

    public function redirectRecherche($resultat){
        if (in_array($resultat, $this->listeClub)) {      
            $club = Club::where('nom',$resultat)->select('url')->firstOrFail();
            $urlClub = $club->url;
            $this->redirectRoute('club', ['club' => $urlClub]);
        } elseif (in_array($resultat, $this->listeCompetition)) {
            $urlCompet = Competition::where('intitule',$resultat)->firstOrFail();
            $this->redirectRoute('competition', ['url' => $urlCompet->url]);
        }elseif (in_array($resultat, $this->user)) {
            $urlPseudo = substr($resultat, 1);
            $this->redirectRoute('profilpublic', ['pseudo' => $urlPseudo]);
        }else{
            abort('404');
        }

    }
    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
