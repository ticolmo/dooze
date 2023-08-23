
@php

use App\Api\ScoresPageHome;



$apiscores = date("Y-m-d");
$test = new ScoresPageHome($apiscores);


echo substr(now(),0,10)."<br>";



    
$matchsdujour = $test->matchdujour();
/*
var_dump($matchsdujour[0]);
echo"<pre>";
print_r($matchsdujour);
echo"<pre>";  
*/

  /*  var_dump($england);
  var_dump($competition);

    */

/*   echo"<pre>";
print_r($england['PremierLeague']);
echo"<pre>";   */ 
   
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  @php
  
      /* dd($matchsdujour); */ 
  @endphp
<div style="display: inline-block;">
  <div>girl</div>
  <div>girl</div>
</div>
<div style="display: inline-block;">
  <div>boy</div>
  <div>boy</div>
</div>

{{--   @if (isset($matchsdujour))
    @foreach ($matchsdujour as $competition)             
      @if ($competition!=null)     
        @foreach ($competition as $matchs)
          @if (isset($matchs[0]["league"]["logo"]))
            <img src="{{$matchs[0]["league"]["logo"]}}" alt="">      
          
            @foreach ($matchs as $rencontre)
              <div> 
                <span> {{$rencontre['teams']['home']['name']}}</span> 
                  @if ($rencontre['fixture']['status']['short'] == 'NS')
                  {{date('H:i', $rencontre['fixture']['timestamp'])}}
                  @endif
                <span> {{$rencontre['goals']['home']." - ".$rencontre['goals']['away']}}</span> 
                <span>{{$rencontre['teams']['away']['name']}}</span> 
              </div>
            @endforeach
          @endif
        @endforeach
      @endif
    
    @endforeach
  @endif   

  --}}

  {{--  <div id="wg-api-football-games"
     data-host="v3.football.api-sports.io"
     data-key="dd8bf5fada55f6377910ef4ee79f7916"
     data-date="2023-05-03"
     data-league="39"
     data-season="2022"
     data-theme="false"
     data-refresh="15"
     data-show-toolbar="true"
     data-show-errors="false"
     data-show-logos="true"
     data-modal-game="true"
     data-modal-standings="true"
     data-modal-show-logos="false">
</div>  --}}
<br>
{{-- <div id="wg-api-football-standings"
    data-host="v3.football.api-sports.io"
    data-key="dd8bf5fada55f6377910ef4ee79f7916"
    data-league="39"
    data-team=""
    data-season="2022"
    data-theme="false"
    data-show-errors="false"
    data-show-logos="false"
    class="wg_loader">
</div> --}}
{{--  <div id="wg-api-football-game"
    data-host="v3.football.api-sports.io"
    data-key="dd8bf5fada55f6377910ef4ee79f7916"
    data-id="718243"
    data-theme="gray"
    data-refresh="15"
    data-show-errors="false"
    data-show-logos="true">
</div>  --}}
  
</body>
</html>