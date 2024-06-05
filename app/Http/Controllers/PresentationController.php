<?php

namespace App\Http\Controllers;

use App\Api\ApiFootball\ListeCompetition;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PresentationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $clubs = Club::where('en_ligne',true)->select(['nom','url'])->orderBy('nom')->get();
        $compet = new ListeCompetition();
        $intitules = $compet->getIntitule();
        $urls = $compet->getUrl();
        $competitions = [];
        foreach ($intitules as $key => $intitule){
            $competitions[$key]['intitule'] = $intitule;            
        };
        foreach ($urls as $key => $url){
            $competitions[$key]['url'] = $url;
        };
      
        
        return view('presentation',[
            'clubs' => $clubs,
            'competitions' => $competitions
        ]);
    }


}
