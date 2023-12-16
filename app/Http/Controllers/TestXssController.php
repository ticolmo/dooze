<?php

namespace App\Http\Controllers;

use voku\helper\AntiXSS;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class TestXssController extends Controller
{
    public function index(){
        $antiXss =  new AntiXSS();
        $harm_string = "In rhoncus risus ante, id tincidunt leo ultricies vel. Nulla ut eros dignissim, scelerisque quam in, finibus ex. Vestibulum finibus varius accumsan. <img onclick=alert('sdfs') src='https://media2.giphy.com/media/5PCVduitYsPPL8BQvL/200.gif?cid=40ab9f2bu3knukav15kchfhnggzzq7zv5zg22pg41kwr6i2s&amp;ep=v1_gifs_trending&amp;rid=200.gif&amp;ct=g' style='width:auto; height: 200px!important'>";
        $harmless_string = $antiXss->xss_clean($harm_string);
        $bool = $antiXss->isXssFound(); 
       /*  dd($bool); */
       $purif = Purifier::clean($harm_string);
        return view('testxss',[
            'bool'=> $bool,
            'clean'=> $harmless_string,
            'purif' => $purif,
            'dirty' => $harm_string
        ]);
    }
}
