<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OptionsCommentaire extends Component
{   
    public $commentaire;
    /**
     * Create a new component instance.
     */
    public function __construct($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.options-commentaire');
    }
}
