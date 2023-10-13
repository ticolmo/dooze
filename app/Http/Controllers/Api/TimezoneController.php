<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TimezoneController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request) 
    {
<<<<<<< HEAD
        
        
        return ;
=======
        dd($request->fuseau);
     /*    
        if ($request->has('fuseau')) {

            $fuseau = $request->fuseau;
            
            $request->session()->put('fuseau', "$fuseau");

            return back();
        } else {
            abort(403);
        } */
        
>>>>>>> 531a7dc4d7862febc66c76e81314b6cb037f5dee
    }
}
