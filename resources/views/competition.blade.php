@extends('layouts.app')

@section('title')
{{$nameCompetition}}
@endsection

@section('content')

<div id="competition">
    <div id="representationPays" {{-- style="background-image: url({{ Storage::url('competitions/imagePays' . $codeBackgroundImage.'.jpg') }});
            background-size: cover; background-position-x: 25%;" --}}>

        <img src="{{ Storage::url('competitions/imagePays' . $codeBackgroundImage.'.jpg') }}"
            style="position:fixed;z-index:-1;width:auto; height: 100%;transform: translatex(-10%)">

    </div>   
    
    <div id="activityCompetition">
        <livewire:competition.index :$codeCompetition :$classement />
    </div>
    <div id="bulletinCompetition">
        <livewire:partials.navbar />

        <div id="infoCompetition">
            <div id="logoCompetition">
                <img src="https://media-4.api-sports.io/football/leagues/{{$codeCompetition}}.png" alt="">
            </div>
            <div>{{$nameCompetition}}</div>
            <div id="infoNameCompetition"> <a href="https://www.{{$competition->site_web}}">{{$competition->site_web}}</a> </div>
            <div>
                <div class="infoTitre"> Champion en titre: </div>
                <div>{{$competition->champion}} <i class="bi bi-trophy"></i></div>
            </div>

            <div>
                <div class="infoTitre"> Club le plus titré: </div>
                <div>{{$competition->club_plus_titre}}</div>
            </div>

            <div>
                <div class="infoTitre"> Meilleur buteur en une seule saison: </div>
                <div>{{$competition->meilleur_buteur_sur_saison}}</div>
            </div>


        </div>
    </div>
  


</div>






@endsection