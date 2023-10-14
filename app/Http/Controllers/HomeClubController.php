<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Torann\GeoIP\Facades\GeoIP;

class HomeClubController extends Controller
{   

    private function getTimezone()
    {
        $ip = app('request')->ip();
        $location = GeoIP::getLocation($ip); 
        $timezone = $location["timezone"];       
       
        return $timezone;
    }

    public function home(Request $request){       
           
        $listeclub = Club::where('en_ligne',true)->select(['nom','url','site_officiel'])->orderBy('nom')->get();
        $query = $request->fuseau;
        if (!empty($query)) {
            $fuseau = $query;
           
        }else{
            $fuseau = $this->getTimezone();
        }

        return view('home',[
            'listeclub'=> $listeclub,
            'timezone' => $fuseau 
        ]);
    }

    public function club($club){
        $choixclub = Club::where('url', $club )->firstOrFail();       
         
        return view('club',[
            'club'=> $choixclub,  
            'timezone' => $this->getTimezone()           
            
        ]);

    }
}
