<?php

namespace App\View\Components;

use App\Models\Club;
use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class Listeclubs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function getlistclub()
    {

        $navbar = Club::where('en_ligne',true)->select(['nom','url','site_officiel'])->orderBy('nom')->get();
            
        
        return $navbar;
}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listeclubs',[
            'listeclubs' => $this->getlistclub()
        ]);
    }
}
