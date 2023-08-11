<?php

namespace App\View\Components;

use App\Models\Publication;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminVerifComments extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function publication(){
        
        $publication = Publication::where('checked_at', null)->get();
        return $publication;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-verif-comments',[
            'publications' => $this->publication(),           
            
            
        ]);
    }
}
