<div>
    <livewire:partials.navbar />

    <hr>

      <div class="logo">        
        <a href="{{$siteofficiel}}" target="_blank">
          <img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$nom.'.png')}}" alt="">
        </a>
      </div>
      <div id="infoclub">
        <span id="clickSite"> 
          <a href="{{$siteofficiel}}" target="_blank"> Site du club </a>
          <div id="site_officiel">
            <a href="{{$siteofficiel}}" target="_blank">
              {{(substr($siteofficiel,8))}}
            </a>
          </div>
        </span>
        <span> Billeterie officiel</span>
      </div>
      
      <div class="infot" style="border:{{$couleur}}">
        {{-- composant tableau des scores --}} 
        <x-scores.tableau-scores-club :$scoreshomme :$scoresfemme /> 
      </div>
     <audio id="chant" src="{{Storage::url('audio/'.$nom.' Audio.mp3')}}" autoplay controls></audio>
</div>