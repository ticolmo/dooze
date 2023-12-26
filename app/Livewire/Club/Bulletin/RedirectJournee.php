<?php

namespace App\Livewire\Club\Bulletin;

use Livewire\Component;
use Illuminate\Http\Request;

class RedirectJournee extends Component
{
    public $league; 
    public $url;
    public $pagecompet;
    
    public function redirectJournee(Request $request, $url){
        $request->session()->put('journee', $this->league); 
        $this->redirectRoute('competition',['url' => $url]);
    }
    public function render()
    {
        return view('livewire.club.bulletin.redirect-journee');
    }
}
