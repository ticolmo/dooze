<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Renderless;
use Illuminate\Support\Facades\Cookie;

class Cookies extends Component
{
    public $show = true;

    public function mount(Request $request){
        if ($request->cookie('rgpd') == 'consentement') {
            $this->show = false;
        }
    }

    #[Renderless] 
    public function close($selection){
        if($selection == 'consentement'){
            /* stockage du cookie RGPD pendant 6 mois - 43830 */   
            Cookie::queue('rgpd', $selection, 43830);            
        }else if($selection == 'refus'){
            /* effacement du cookie RGPD */
            Cookie::expire('rgpd');          
        }        
    }
    
    public function render()
    {
        return view('livewire.partials.cookies');
    }
}
