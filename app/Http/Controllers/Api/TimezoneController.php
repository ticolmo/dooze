<?php

namespace App\Http\Controllers\Api;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class TimezoneController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request) 
    {        
      /*   if ($request->has('fuseau')) {
            dd("asdfsa");} */

            $query = $request->query("fuseau");
            if (!empty($query)) {
                dd("Somic");
               
            }
    }
}