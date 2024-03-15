<?php

namespace App\View\Components\Profil;

use Closure;
use App\Models\Commentaire;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Commentaires extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $id)
    {}


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profil.commentaires',[
            'commentaires' => Commentaire::where('user_id',$this->id)->get()
        ]);
    }
}
