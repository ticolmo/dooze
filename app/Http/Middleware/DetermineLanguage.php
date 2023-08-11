<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class DetermineLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('choicelangue') && in_array($request->session()->get('choicelangue'), ['en', 'es', 'fr','de','it'])) {
            App::setLocale($request->session()->get('choicelangue'));           
            } else{ 
                $detectlangue = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                if (in_array($detectlangue, ['en', 'es', 'fr','de','it'])) {
                    App::setLocale($detectlangue);                  
                }else{
                    App::setLocale('en');                   
                }
       } 
        return $next($request);
    }
}
