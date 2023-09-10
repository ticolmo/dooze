<?php

namespace App\View\Components;

use Closure;
use App\Models\Live;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Lives extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $idclub)
    {
        
    }

    public function liveall()
    {
        $live = Live::where('club_id', $this->idclub )->latest()->get();
        
        return $live;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lives',[
            'lives'=> $this->liveall()
        ]);
    }
}
