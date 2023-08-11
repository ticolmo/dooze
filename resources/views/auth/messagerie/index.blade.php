@extends('layouts.home')

@section('content')

<main id="messagerie" class="form-signin m-auto">



    <div><a href="{{route('profil')}}">Retour à ton profil</a></div>
    <div class="h3 m-auto text-center"> Messagerie</div>

    
    <a href="{{route('corbeillemessagerie')}}" style="position: absolute; right:20%"> <div id="trash" class="btn btn-primary"> <i class="bi bi-trash3"></i>Corbeille
        @if ($corbeille > 0)
        <span class="badge text-bg-secondary"> {{$corbeille}} </span>
        @endif
    </div> </a>

    <ul class="nav nav-underline mb-3 mailbox" id="underline-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="underline-home-tab" data-bs-toggle="tab" data-bs-target="#underline-home" type="button" role="tab" aria-controls="underline-home" aria-selected="true">Boite de réception 
            @if ($nbnewmessage > 0)
            {{$nbnewmessage}} 
            @endif
        </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="underline-profile-tab" data-bs-toggle="tab" data-bs-target="#underline-profile" type="button" role="tab" aria-controls="underline-profile" aria-selected="false">Messages envoyés</button>
        </li>
    
    </ul>
    
      <div class="tab-content" id="underline-tabContent">
            <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab" tabindex="0">
                <form id="boitereception"action="{{route('deletemessage')}}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th scope="col">De</th>
                            <th scope="col">Objet</th>
                            <th scope="col">Reçu</th>
                            <th scope="col"><input type="checkbox" id="master-checkboxrep" style="display:none"><label for="master-checkboxrep">Tout sélectionner</label></th>                            
                        </tr>   
                        
                        </thead>
                        <tbody>
                            @forelse ($boitereception as $message)
                               
                                    <tr>
                                        <th>
                                            @if ($message->has_reply == true)
                                            <i class="bi bi-reply"></i>  
                                            @else
                                                @if ($message->read_at == null)
                                                <i class="bi bi-envelope"></i>
                                                @elseif ($message->read_at != null)
                                                <i class="bi bi-envelope-open"></i>
                                                @endif
                                            @endif
                                        </th>
                                        <th>  <a href="{{route('readmessage', "$message->id")}}">{{$message->expediteur->name}} </a> </th>
                                        <td> <a href="{{route('readmessage', "$message->id")}}"> {{$message->objet}} </a> </td>
                                        <td> <a href="{{route('readmessage', "$message->id")}}"> {{date_format($message->created_at,'d M Y H:i:s')}} </a> </td>
                                        <td> <input type="checkbox" class="checkboxrep" name="{{$message->id}}" value="{{now();}}"> </td>
                                    </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="5">Boite de réception vide</td>
                                </tr>
                            @endforelse
                        
                        
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="selection1">Supprimer la sélection</td>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="submit" style="display:none">xxxx</button>
                </form>
                
        
            </div>
            <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab" tabindex="0">
                <form id="boiteenvoi"action="{{route('deletemessage')}}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">à</th>
                            <th scope="col">Objet</th>
                            <th scope="col">Envoyé</th>
                            <th scope="col"><input type="checkbox" id="master-checkboxenv" style="display:none"><label for="master-checkbox">Tout sélectionner</label></th>                        
                        </tr>
                        
                        </thead>
                        <tbody>
                            
                            @forelse ($boiteenvoi as $message)                               
                            
                                <tr>
                                    
                                    <th> <a href="{{route('readmessage', $message->id)}}">{{$message->destinataire->name}} </a></th>
                                    <td><a href="{{route('readmessage', $message->id)}}"> {{$message->objet}} </a></td>
                                    <td> <a href="{{route('readmessage', $message->id)}}">{{date_format($message->created_at,'d M Y H:i:s')}}</a></td>
                                    <td> <input type="checkbox" class="checkboxenv" name="{{$message->id}}" value="{{now();}}"></td>
                                     
                                </tr>
                            
                            @empty
                                <tr>
                                    <td colspan="4">Boite d'envoi vide</td>
                                </tr>
                            @endforelse
                        
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="selection2">Supprimer la sélection</td>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="submit" style="display:none">xxxx</button>
                </form>
        
            </div>
       
        </div>
      
    
    
    



</main>
</div>
</div>




@endsection