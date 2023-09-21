<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\Commentaireclub;
use App\Models\Commentairevisiteur;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class Fans extends Component
{
    public $idclub;
    /**
     * Create a new component instance.
     */
    public function __construct($idclub)
    {
        $this->idclub = $idclub;
    }

    public function commentaireclub(){
        
        $commentaireclub = Commentaireclub::where('club_id', $this->idclub)->with('reponse.user','reponse.publication','user','publication')->withCount('reponse')->latest()->get();        
        
        return $commentaireclub;
    }

    public function commentairevisiteur(){
        
        $commentairevisiteur = Commentairevisiteur::where('club_id', $this->idclub)->with('reponse.user.club','reponse.publication','user.club','publication')->withCount('reponse')->latest()->get();
        return $commentairevisiteur;
    }
    


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fans',[
            'commentaireclub' => $this->commentaireclub(),
            'commentairevisiteur' => $this->commentairevisiteur(),
            
            
        ]);
    }
}
