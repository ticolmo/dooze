<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\Commentaireclub;
use App\Models\Commentairevisiteur;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ProfilpublicController extends Controller
{
    public function show($iduser){
        $fan = User::with('club')->where('id', $iduser)->firstOrFail();

        /* Page 404 si le fan est administrateur*/
        if($fan->is_admin === true){
            abort(404);
        }        

        $posts = Publication::whereHasMorph('post', '*', function (Builder $query) use ($iduser) {
            $query->where('user_id', $iduser);
            })->with([
                'post' => function (MorphTo $morphTo) {
                    $morphTo->morphWithCount([
                        Commentaireclub::class => ['reponse'],
                        Commentairevisiteur::class => ['reponse'],
                    ]);
                }])->latest()->get();     
                             
        
        return view('profilpublic',[
            'fan'=> $fan,
            'posts'=> $posts,
        ]);    
    }

    public function mail($destinataireid){
        $destinataire = User::findOrFail($destinataireid);

        return view('envoimessageprive',[
            'destinataire'=> $destinataire,
        
        ]);    

    }

    public function complete($iduser){
        $user = User::findOrFail($iduser);

        return view('auth.editprofilpublic',[
            'user'=> $user,
        
        ]); 

    }

    public function update(Request $request){

        $request->validate([      
            'avatar' => ['nullable','mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml,image/webp','max:10000'],
            'hashtag' => ['nullable','max:300'],
            'bio' => ['nullable','max:300'],
            'titrelien1' => ['nullable','max:50'],
            'lien1' => ['nullable','max:100'],
            'titrelien2' => ['nullable','max:50'],
            'lien2' => ['nullable','max:100'],
            
        ]);

        $profil = User::find(auth()->user()->id);

        if($request->has('avatar')){
            /*stockage fichier media*/ 
            $fichiermedia = uniqid().'.'.$request->avatar->extension();    
            $request->avatar->storeAs("users/".auth()->user()->id."/avatar\/", $fichiermedia, 'public');
            /*base de données*/
            $profil->photoprofil = $fichiermedia;
        }; 

        $input = collect($request->all())->except(['_token', 'avatar'])->toArray();

        foreach($input as $key => $value){

            if ($key == 'hashtag'){
                if ($value != null){
                    if(substr($value, 0,1)!= "#"){
                    $hashtag = $value;
                    $value = '#'.$hashtag;
                    }
                }                
            }
            if ($key == 'lien1' || $key == 'lien2'){
                if ($value != null){
                    if(substr($value, 0,6)!= "http://"){
                    $url = $value;
                    $value = 'http://'.$url;
                    }
                }                
            }
            $profil->$key = $value;
        }
        
        $profil->save();


        return back();
    }
}
