<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

    public function club(Request $request, $club, ?string $feature = null){
        $choixclub = Club::where('url', $club )->firstOrFail(); 
        $timezone = $this->getTimezone($request);
        if (isset($feature))
        {
            dd($feature);
        }
         
        return view('club',[
            'club'=> $choixclub,  
            'timezone' => $timezone         
            
        ]);

    }
}
