<?php

namespace App\View\Components;

use Closure;
use App\Models\Club;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ApiDooze extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function clubs()
    {
        $clubs = Club::where('en_ligne',true)->select(['nom','id_club'])->orderBy('nom')->get();

        return $clubs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.api-dooze', [
            'clubs' => $this->clubs()
        ]);
    }
}
