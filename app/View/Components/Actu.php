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
        
        try { 
            
            $xml = simplexml_load_file($this->flux);
          } catch (\Exception $e) {
            return view('errors.events.BadConnexionActu');
            
        };  


        return view('components.actu',[
            'xml'=>$xml,
        ]);
    }

  
}
