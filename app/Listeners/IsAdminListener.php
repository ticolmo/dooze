<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\AccountLogInEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IsAdminListener
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
    public function handle(AccountLogInEvent $event)
    {
        if ($event->user->is_admin) {
            $admin = User::findOrFail($event->user->id);
            $admin->derniere_connexion = now();
            $admin->save();            
            return redirect()->route('admin.index');
          }
    }
}
