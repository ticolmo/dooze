<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogInLive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('livesession') && $request->session()->get('livesession') == "accepted"){
            return $next($request);
        }
        else {
            return back()->withErrors([
                'idlive' => "Erreur",
            ]);
        }

        
    }
}
