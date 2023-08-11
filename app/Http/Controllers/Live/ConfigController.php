<?php

namespace App\Http\Controllers\Live;

use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        
        return view('live.create');
    }

    public function config(Request $request )
    {
        $live = new Live();
        
        $live->name = $request->name;
        $live->description = $request->description;
        $live->password = $request->password;
        $live->type = $request->type;
        $live->user_id = auth()->user()->id;

        /*si media (image, video) posté */
        if ($request->has('media')) {
            /*stockage fichier media*/ 
            $fichiermedia = uniqid().'.'.$request->media->extension();    
            $request->media->storeAs("live", $fichiermedia, 'public');
            /*base de données*/
            $live->image = $fichiermedia;
        }; 

        $live->save();

        if ($live->type == 'video'){
            return redirect()->route('home');
        }
        if ($live->type == 'chat'){
            return redirect()->route('home');
        }
       
        
        
    }
}
