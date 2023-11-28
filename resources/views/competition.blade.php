@extends('layouts.app')

@section('title')
{{$nameCompetition}}
@endsection

@section('content')

    <div id="pageCompetition">
        <div 
            id="representationPays"
          
         {{-- style="background-image: url({{ Storage::url('competitions/imagePays' . $codeBackgroundImage.'.jpg') }});
            background-size: cover; background-position-x: 25%;"  --}}
            >

          <img src="{{ Storage::url('competitions/imagePays' . $codeBackgroundImage.'.jpg') }}" style="position:fixed;z-index:-1;width:auto; height: 100%;transform: translatex(-10%)"> 

        </div>
        <div style="background-color: white">
            <div id="logoCompetition">
                <img src="https://media-4.api-sports.io/football/leagues/{{$codeCompetition}}.png" alt="">
                <span></span>
            </div>
            <div id="listeCompetition"> </div>   
            <div id="statistiques">                    

               <livewire:competition.index :$codeCompetition :$competition :$classement/>            
        

            </div>

        </div>
    </div>
    




    
@endsection