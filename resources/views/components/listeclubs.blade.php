@foreach ($listeclubs as $club)
<li><a class="dropdown-item" href="http://dooze.test:8089/{{$club->url}}"> {{ $club->nom  }}</a></li>   
@endforeach