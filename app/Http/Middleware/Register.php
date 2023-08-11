<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Register
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //middleware vérifiant que le futur utilisateur a bien répondu au questionnaire du club avant de créer son compte
        if ($request->isMethod('get')) {          
    
            if($request->session()->get('questionnaire') == "valide"){
            
            //$request->session()->forget('questionnaire');
            return $next($request); 
            }else{
                return redirect()->route('createaccount');
            }
         }
         return $next($request);
    }
}
