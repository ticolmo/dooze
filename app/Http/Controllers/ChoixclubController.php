<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class ChoixclubController extends Controller
{
    public function index(){        

        $listeclub = Club::where('en_ligne',true)->select(['id_club','nom'])->orderBy('nom')->get();

        return view('auth.choixclub',[
            'listeclub'=> $listeclub
        ]);
    }

    public function store(Request $request){

        $club = $request->session()->get('club');

        $questionnaire = Questionnaire::where('ref_club', '=', $club )->firstOrFail();

        $request->session()->put('reponse', "$questionnaire->reponse");
        $request->session()->put('club', "$club");
        $bouton = true;

        return view('auth.question',[
            'questionnaire'=> $questionnaire,
            'bouton'=> $bouton
        ]);
    }

    public function validation(Request $request){

        $team = $request->session()->get('club');

        $questionnaire = Questionnaire::where('ref_club', '=', $team )->firstOrFail();

        if ($request->session()->get('reponse') == $request->input('questionhonneur')){
            $message = 'Bravo ! Tu peux continuer!';
            $suivant = true;
            $bouton = false;
            $request->session()->put('questionnaire', "valide");
            
            
        } else{
            $message = 'Désolé ! Réponse fausse !!';
            $suivant = false;
            $bouton = true;          

        }   


        return view('auth.question',[
            'questionnaire'=> $questionnaire,
            'message' => $message,
            'suivant' => $suivant,
            'bouton'=> $bouton
          
        ]);
    }
}
