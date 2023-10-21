<?php

namespace App\Listeners;

use App\Mail\NewUser;
use Illuminate\Http\Request;
use App\Events\AccountLogInEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AccountLogInEvent $event): void
    {   
        $request = app('request');
        if ($request->session()->has('bienvenue')) {        
            //Message de bienvenue
            //la valeur de la session est placée dans une session flash et est détruit pour être affichée seulement une seule fois
            $bienvenue = $request->session()->get('bienvenue');    
            session()->now('new', "$bienvenue");
            $request->session()->forget('bienvenue');  
            
            //Email de bienvenue
            Mail::to($event->fan->email)->send(new NewUser($event->fan));
          }
    }
}
