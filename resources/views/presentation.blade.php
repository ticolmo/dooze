@extends('layouts.home')

@section('content')
<div>
    <p> En toute convivialité, le but de Dooze est de mettre en avant les sites web et medias des supporters de
        club de football. </p>
    <p> Ce qui donne vie au football, c'est ce qui se passe sur le terrain. Mais aussi la passion qu'il y a autour du
        carré vert. </p> 
        <p> <strong> Sans cette passion, le foot n'est rien.</strong> </p>
    <p> Le nom "dooze" vient de cette conviction. On dit bien que le public d'un stade est le douzième homme.</p>
    <p> Dooze a également ces objectifs:</p>
    <ul>
        <li>contribuer à l’interaction entre supporters</li>
        <li>apporter des divers outils et informations utiles aux amoureux de foot</li>
        <li></li>
    </ul>
    <h2> Proposez un club !</h2>
    <p> Vous trouvez le concept de Dooze original et intéressant. Vous souhaitez proposer votre club favori, n'hésitez pas à remplir la fiche contact et à fournir toutes les infos utiles.</p>
    <p><a href="#club">Listes des clubs</a></p>
    <h2 id="don"> Fonctionnement: Don</h2>
    <p>Dooze ne vend pas vos données à des fins publicitaires ou autres. Il ne diffuse pas non plus de publicité.</p>
    <p>Le site fonctionne uniquement par don. </p>
    <p>Pour que ce projet continue à fonctionner dans de bonnnes conditions, n'hésitez pas à faire un don. La moitié
        des fonds seront reversés aux sites web de votre club favori diffusés sur Dooze. N'oubliez donc pas à indiquer votre club favori dans le
        processus. D'avance, nous vous remercions beaucoup !!! </p>
    
    <h2 id="clubs"> Liste des clubs</h2>
    <ul>
        @foreach ($clubs as $club)
            <li> <a href="{{route('club', $club->url)}}">{{$club->nom}}</a></li> 
        @endforeach       
    </ul>
    <h2 id="competitions"> Liste des compétitions</h2>
    <ul>
        @foreach ($competitions as $competition)
          <li> <a href="{{route('competition', $competition['url'])}}">{{$competition['intitule']}}</a> </li>  
        @endforeach        
    </ul>


    </div>
@endsection