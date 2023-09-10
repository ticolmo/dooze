<?php

namespace App\Http\Controllers\Live;

use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'name' => ['required','string', 'max:50'],
            'description' => ['required','string', 'max:1000'],
            'with_password' => ['required','boolean'],
            'password'=> 'nullable|confirmed',
            'type' => ['required','string', 'max:5'],
            'image' => ['nullable','mimetypes:image/jpeg,image/png,image/bmp,image/gif','max:10000']
        ]);

        $live = new Live();
        
        $live->name = $request->name;
        $live->description = $request->description;
        $live->with_password = $request->with_password;
        if ($request->has('password') && $request->with_password) {
            $live->password = Hash::make($request->password) ;
        };         
        $live->type = $request->type;
        $live->user_id = auth()->user()->id;
        $live->club_id = auth()->user()->club->id_club;

        /*si media (image, video) posté */
        if ($request->has('media')) {
            /*stockage fichier media*/ 
            $fichiermedia = uniqid().'.'.$request->media->extension();    
            $request->media->storeAs("live/", $fichiermedia, 'public');
            /*base de données*/
            $live->image = $fichiermedia;
        }; 

        $live->save();

            return redirect()->route('live.session');
  
       
        
        
    }
}
