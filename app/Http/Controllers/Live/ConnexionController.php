<?php

namespace App\Http\Controllers\Live;

use App\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConnexionController extends Controller
{
    public function index($idlive)
    {
        $live = Live::findOrfail($idlive);
        
        return view('live.connexion',[
            'live' => $live
        ]);
    }

    public function connect(Request $request)
    {
        $request->validate([
            'password' => ['required','string', 'max:255'],
            'idclub' => ['required','string', 'max:36'],
        ]);

        $listelive = Live::select('club_id')->get()->toArray();        

        if (!in_array($listelive, $request->idclub)){
            return back()->withErrors([
                'password' => 'Live inconnu',
            ]);
        }
        else{
            $live = Live::where('club_id',$request->idclub )->firstOrFail();
            if($live->password === $request->password){
                $request->session()->put('livesession', "accepted");
                return route('live.session');
            }else{
                return back()->withErrors([
                    'password' => trans('auth.password'),
                ]);
            }

        };

        
    }

    
}
