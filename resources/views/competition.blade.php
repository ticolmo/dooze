@extends('layouts.club')

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
    <div style="background-color: white">
        <div id="pageCompetition">
            <div>
                <livewire:competition.index :$codeCompetition :$classement />
            </div>
            <div>
                <livewire:partials.navbar />

                <div id="infoCompetition">
                    <div id="logoCompetition">
                        <img src="https://media-4.api-sports.io/football/leagues/{{$codeCompetition}}.png" alt="">
                    </div>
                    <div>{{$nameCompetition}}</div>
                    <div> <a href="https://www.{{$competition->site_web}}">{{$competition->site_web}}</a> </div>
                    <div>
                        <div> Champion en titre: </div>
                        <div>{{$competition->champion}}</div>
                    </div>

                    <div>
                        <div> Club le plus titré: </div>
                        <div>{{$competition->club_plus_titre}}</div>
                    </div>

                    <div>
                        <div> Meilleurs buteurs en une seule saison: </div>
                        <div>{{$competition->meilleur_buteur_sur_saison}}</div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</div>






@endsection