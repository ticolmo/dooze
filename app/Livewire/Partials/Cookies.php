<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Renderless;

class Cookies extends Component
{
    public $show = false;

    public function mount(){
        if (session()->missing('rgpd')) {
            $this->show = true;
        }
    }

    #[Renderless] 
    public function close(Request $request, $selection){

        if($selection == 'consentement'){
            $request->session()->put('rgpd', $selection);
        }else if($selection == 'refus'){
            $request->session()->forget('rgpd');
        }
    }
    
    public function render()
    {
        return view('livewire.partials.cookies');
    }
}
