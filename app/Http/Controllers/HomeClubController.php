<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;

class HomeClubController extends Controller
{   

    private function getTimezone(Request $request)
    {   
        if ($request->session()->has('timezone')) {
            $timezone = $request->session()->get('timezone');
        }else{
            $ip = $request->ip();        
            $location = GeoIP::getLocation($ip); 
            $fuseau = $location["timezone"]; 
            $timezone = $fuseau;
        }
              
       
        return $timezone;
    }

    

    public function home(Request $request){       
           
        $listeclub = Club::where('en_ligne',true)->select(['nom','url','site_officiel'])->orderBy('nom')->get();
        $timezone = $this->getTimezone($request);

        return view('home',[
            'listeclub'=> $listeclub,
            'timezone' => $timezone
        ]);
    }

    public function club(Request $request, string $club){        
        $choixclub = Club::where('url', $club )->firstOrFail(); 
        $timezone = $this->getTimezone($request);
     
        return view('club',[
            'club'=> $choixclub,  
            'timezone' => $timezone         
            
        ]);

    }
}
