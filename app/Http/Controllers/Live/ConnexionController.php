<?php

namespace App\Http\Controllers\Live;

use App\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ConnexionController extends Controller
{
    public function index($idlive)
    {
        $live = Live::findOrfail($idlive);
        
        return view('live.connexion',[
            'live' => $live
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required','string', 'max:255'],
            'idlive' => ['required','string', 'max:36'],
        ]);

        $listelive = Live::select('id')->pluck('id')->all();        

        if (!in_array($request->idlive, $listelive)){
          
            return back()->withErrors([
                'idlive' => 'Live inconnu',
            ]);
            
        }
        else{
            $live = Live::findOrFail($request->idlive);
             
            if(Hash::check($request->password, $live->password)){
                $request->session()->put('livesession', "accepted");
                return redirect()->route('live.session');
            } else {
                return back()->withErrors([
                    'password' => "Mot de passe invalide",
                ]);
            }

        };

        
    }

    
}
