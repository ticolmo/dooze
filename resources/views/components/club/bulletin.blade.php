<div>
    <livewire:partials.navbar />

    <hr>

    <div class="logo">
        <span> Site officiel</span>
        <a href="<?php echo $siteofficiel?>" target="_blank">
          <img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$nom.'.png')}}" alt="">
        </a>
        <div class="site_officiel">
          <a href="<?php echo $siteofficiel;?>" target="_blank">
            <?php echo(substr($siteofficiel,8))?>
          </a>
        </div>
      </div>
      <div class="infot" style="border:{{$couleur}}">
        {{-- composant tableau des scores --}} 
        <x-scores.tableau-scores-club :$scoreshomme :$scoresfemme /> 
      </div>
     <audio id="chant" src="{{Storage::url('audio/'.$nom.' Audio.mp3')}}" autoplay controls></audio>
</div>