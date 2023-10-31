<?php

namespace App\View\Components\Admin;

use Closure;
use App\Models\Signalement;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SignalComments extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        try {
            $signalement = Signalement::all();
            $corbeille = Signalement::onlyTrashed()->get();

        } catch(\Exception $e) {
            $classeException = get_class($e);

            return view('errors.events.admin.Erreur',[
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'ligne' => $e->getLine(),
                'class' => $classeException
            ]);            
        };  
        


        return view('components.admin.signal-comments',[
            'signalements' => $signalement,           
            'corbeille' => $corbeille,           
            
            
        ]);
    }
}
