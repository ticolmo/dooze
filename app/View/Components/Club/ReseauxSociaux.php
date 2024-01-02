<?php

namespace App\View\Components\Club;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReseauxSociaux extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $fluxrs)
    { }

    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        try { 
            
            $xml = simplexml_load_file($this->fluxrs);
          } catch (\Exception $e) {
            return view('errors.events.BadConnexionActu');
            
        };  
        return view('components.club.reseaux-sociaux', [
            'xml' => $xml
        ]);
    }
}
