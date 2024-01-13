<div>
    <div style="text-align: end">
        <div class="btn btn-outline-secondary btn-sm"><a href="{{route('don')}}" > <i class="bi bi-person-badge"></i> Faire un don</a></div>
        <div class="btn btn-outline-secondary btn-sm"> <a href=""><i class="bi bi-gear"></i> Paramètres</a></div>
    </div>

    <div>
        <div> <i class="bi bi-envelope"></i>  Messagerie 
            @if ($newmessage > 0)
                <span class="badge rounded-pill bg-danger">
                    {{$newmessage}}+    
                </span>    
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">De</th>
                    <th scope="col">Objet</th>
                    <th scope="col">Reçu</th>   --}}   
                    <th colspan="3"> Les derniers messages</th>
                </tr>   
            </thead>
            <tbody>
                @forelse ($messages as $message)                
                        <tr>
                            <th>  <a href="{{route('readmessage', "$message->id")}}">{{$message->expediteur->name}} </a> </th>
                            <td> <a href="{{route('readmessage', "$message->id")}}"> {{$message->objet}} </a> </td>
                            <td> <a href="{{route('readmessage', "$message->id")}}"> {{date_format($message->created_at,'d M Y H:i:s')}} </a> </td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="3">Boite de réception vide</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div> Voir la liste des messages</div>
        <br>

        <div> Sondage 
           {{--  @if ($newsondage > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{$newsondage}}+    
                </span>    
            @endif --}}
        </div>
    </div>
</div>
