<?php

namespace App\View\Components;


use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Actu extends Component
{
    public $flux;

    public $nom;
    /**
     * Create a new component instance.
     */
    public function __construct($flux,$nom)
    {
        $this->flux = $flux;
        $this->nom = $nom;
    }

 



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.actu');
    }

  
}
