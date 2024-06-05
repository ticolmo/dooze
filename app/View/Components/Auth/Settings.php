<?php

namespace App\View\Components\Auth;

use Closure;
use App\Api\Listepays;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Settings extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $part)
    {
        //
    }

    public function messageModificationEmail(Request $request){
        if ($request->session()->has('email')) {
            //la valeur de la session est placée dans une session flash et est détruit pour être affichée seulement une seule fois
            $message = $request->session()->get('email');    
            session()->now('modifemail', "$message");
            $request->session()->forget('email');
        }
    }

    public function listePays(){
        $pays = new Listepays();
        $liste = $pays->getlist();  
        return $liste; 
    }

    public function listeLangue(){
        $langue = Langue::select(['id_langue','intitule'])->get();
        return $langue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->part == 'info'){
           return view('components.auth.settings.info',[
            'langues'=> $this->listeLangue(),      
            'listepays'=> $this->listePays()            
            ]); 
        }else if ($this->part == 'password'){
           return view('components.auth.settings.password'); 

        }else if ($this->part == 'annulation'){
           return view('components.auth.settings.annulation'); 
        }
        
    }
}
