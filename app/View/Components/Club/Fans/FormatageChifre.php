<?php

namespace App\View\Components\Club\Fans;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormatageChifre extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $chiffre)
    {
        //
    }

    function formatage($number) {
        // Si le nombre est supérieur ou égal à 1 milliard, formate comme "xMd"
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . ' Md';
        }
        // Si le nombre est supérieur ou égal à 1 million, formate comme "xM"
        elseif ($number >= 1000000) {
            return number_format($number / 1000000, 1) . ' M';
        }
        // Si le nombre est supérieur ou égal à 1000, formate comme "xk"
        elseif ($number >= 1000) {
            return number_format($number / 1000, 1) . ' k';
        }
        elseif ($number == 0) {
            return null;
        }
        // Sinon, retourne le nombre tel quel
        return $number;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.club.fans.formatage-chifre',[
            'chiffreFormate' => $this->formatage($this->chiffre)
        ]);
    }
}
