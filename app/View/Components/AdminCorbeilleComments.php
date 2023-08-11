<?php

namespace App\View\Components;

use Closure;
use App\Models\Publication;
use Illuminate\View\Component;
use App\Models\Commentaireclub;
use App\Models\Commentairevisiteur;
use App\Models\Reponseclub;
use App\Models\Reponsevisiteur;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class AdminCorbeilleComments extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function corbeille(){

        $commentaireclub = Commentaireclub::onlyTrashed()->get();
        $commentairevisiteur = Commentairevisiteur::onlyTrashed()->get();
        $reponseclub = Reponseclub::onlyTrashed()->get();
        $reponsevisiteur = Reponsevisiteur::onlyTrashed()->get();

        $corbeille = $commentaireclub->concat($commentairevisiteur)->concat($reponseclub)->concat($reponsevisiteur);

       
        return $corbeille;        
    }

   

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-corbeille-comments',[
            'corbeille' => $this->corbeille(),
        ]);
    }
}
