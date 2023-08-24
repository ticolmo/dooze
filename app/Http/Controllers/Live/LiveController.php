<?php

namespace App\Http\Controllers\Live;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveController extends Controller
{
    public function index(){        

        
        return view('live.live');
    }
}
