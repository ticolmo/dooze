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

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @if ($showClassement)                   
                    <li class="nav-item" role="presentation">
                      <button 
                        @class([
                                'nav-link',
                                'active' => $show,
                            ])
                        id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Classement</button>
                    </li>
                @endif

                    <li class="nav-item" role="presentation">
                      <button 
                        @class([
                                'nav-link',
                                'active' => !$show,
                        ])
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Journée</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Buteurs</button>
                    </li>                    
                  </ul>

                  {{-- contenu --}}

                  <div class="tab-content" id="pills-tabContent">
                    @if ($showClassement)  
                        <div 
                            @class([
                                    'tab-pane',
                                    'fade',
                                    'show' => $show,
                                    'active' => $show,
                                    ])
                            id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <x-statistiques.classement> {{$codeCompetition}} </x-statistiques.classement>
                        </div>
                    @endif
                    
                    <div  
                        @class([
                                    'tab-pane',
                                    'fade',
                                    'show' => !$show,
                                    'active' => !$show,
                            ])
                        id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <livewire:statistiques.journee :$journee :$codeCompetition /> 
                    </div>

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <x-statistiques.buteurs :$meilleursButeurs>  </x-statistiques.buteurs>
                    </div>
                    
                  </div>


            </div>

        </div>
    </div>
    




    
@endsection