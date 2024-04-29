<?php

namespace App\View\Components\Partials;

use Closure;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Rgpd extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $show = false)
    {
        //
    }

    public function consentement(Request $request){
        if ($request->cookie('rgpd') == 'consentement') {
            $this->show = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.rgpd',[
            'show' => $this->show
        ]                
    );
    }
}
