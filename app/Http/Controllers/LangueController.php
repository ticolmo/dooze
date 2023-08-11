<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangueController extends Controller
{
  

    public function choice (Request $request, $choice){
        if (in_array($choice, ['en', 'es', 'fr','de','it'])) {
            $request->session()->put('choicelangue', $choice);                
        }else{
            $request->session()->put('choicelangue','en');   
        };
        /* dd($request->session()->get('choicelangue')); */
        return redirect()->back();
    }
}
