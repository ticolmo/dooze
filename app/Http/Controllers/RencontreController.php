<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RencontreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        return view('rencontre',[
            'id'=> $id,
        
        ]);
    }
}
