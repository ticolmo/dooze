<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class VerifyemailController extends Controller
{
    public function index(Request $request){
        
        // Vérification si nouveau utilisateur, envoi d'un message de bienvenue
        if ($request->session()->has('register')) {
            $request->session()->put('bienvenue', "Bienvenue sur Dooze !");
            $request->session()->forget(['register','bio']);  /* formulaire bio effacé */      
        }
        //  Message de confirmation de changement d'email
        else{
            $request->session()->put('email', "Votre email a été vérifié");  
        }   
        
        return view('auth.verify-email');
    }
}
