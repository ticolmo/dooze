<?php

namespace App\Livewire\Competition;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use App\Api\ApiFootball\Statistiques;
use App\Api\ApiFootball\JourneePageStatistiques;

class Journee extends Component
{   
    public $journee;
    public $listeJournee;
    public $matchs = []; 
    public $codeCompetition;
 
    public function mount(Request $request, $codeCompetition)
    {   
        $competitionConfirmed = new Statistiques($codeCompetition); 
        /* si l'utilisateur a cliqué sur une journée sur la page club */       
        if ($request->session()->has('journee')) {
            $this->journee = session()->get('journee');
            $request->session()->forget('journee');
        }else{
            $this->journee = $competitionConfirmed->getCurrentJournee();
        }
        $this->listeJournee = $competitionConfirmed->getListeJournee();
        $this->codeCompetition = $codeCompetition;
         
        $data = new JourneePageStatistiques();
        $this->matchs = $this->triMatch($data->getListeMatchs($this->journee, $this->codeCompetition));         
    }

    public function triMatch($rencontres){
        /* tri par date */
        $tab0 = [];
        foreach ($rencontres as $item){      
            $bar = $item['fixture']['timestamp'];
            $tab0[] = $bar;            
        };       
        sort($tab0);
        $tab1 = [];
        foreach ($tab0 as $item){
            foreach ($rencontres as $item3){                               
                if( $item3['fixture']['timestamp'] == $item){
                    if(!in_array($item3, $tab1)){
                      $tab1[] = $item3;  
                    };                    
                };                
            };
        };
        return $tab1;

    }

    #[On('listeDeroulante')]
    public function changeJournee($choix){
        $this->journee = $choix;
        $data = new JourneePageStatistiques();
        $this->matchs = $this->triMatch($data->getListeMatchs($this->journee, $this->codeCompetition));
    }

    public function redirectDetailRencontre($idRencontre){
        $this->redirectRoute('detailrencontre', ['id' => $idRencontre]);

    }


    public function render()
    {
        return view('livewire.competition.journee');
    }
}
