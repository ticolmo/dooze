<div>
    <div style="text-align: end">
        <div class="btn btn-outline-secondary btn-sm"><a href="{{route('don')}}" > <i class="bi bi-person-badge"></i> Faire un don</a></div>
        <div class="btn btn-outline-secondary btn-sm" wire:click="changePart('settings')"> <i class="bi bi-gear"></i> Paramètres</div>
    </div>
    @if ($part == "settings")
        <x-auth.edit />        
    @endif

    @if($part == "")
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
    @endif

</div>
