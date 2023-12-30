<?php

namespace App\View\Components\Club;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Bulletin extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $scoreshomme,
        public string $scoresfemme,
        public string $nom,
        public string $siteofficiel

    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.club.bulletin');
    }
}
