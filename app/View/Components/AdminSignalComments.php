<?php

namespace App\View\Components;

use Closure;
use App\Models\Signalement;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdminSignalComments extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function signalement(){
        
        $signalement = Signalement::all();
        return $signalement;
    }

    public function signalras(){
        
        $corbeille = Signalement::onlyTrashed()->get();;
        return $corbeille;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-signal-comments',[
            'signalements' => $this->signalement(),           
            'corbeille' => $this->signalras(),           
            
            
        ]);
    }
}
