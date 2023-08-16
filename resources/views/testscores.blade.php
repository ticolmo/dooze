
@php

use App\Api\ScoresPageHome;
use App\Api\ApifootballPageHome;
$apiscores = date("Y-m-d");
$test = new ScoresPageHome($apiscores);
$api3 = new ApifootballPageHome($apiscores);

echo substr(now(),0,10)."<br>";


    
$matchsdujour = $test->matchdujour();

/*var_dump($matchsdujour[]);
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

  @if (isset($matchsdujour))
    @foreach ($matchsdujour as $competition)             
      @if ($competition!=null)
        @foreach ($competition as $matchs)
       
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
        @endforeach
      @endif
    
    @endforeach
  @endif   

 

  
</body>
</html>