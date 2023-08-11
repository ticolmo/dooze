@extends('layouts.home')

@section('content')

<main id="messagerie" class="form-signin m-auto">


    <div><a href="{{route('profil')}}">Retour à ton profil</a> / <a href="{{route('messagerie')}}">Messagerie</a> </div>

 
    
    <ul class="nav nav-underline mb-3 mailbox" id="underline-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="underline-home-tab" data-bs-toggle="tab" data-bs-target="#underline-home" type="button" role="tab" aria-controls="underline-home" aria-selected="true">Corbeille
           {{--  @if ($nbnewmessage > 0)  Mettre le nb corbeille
            {{$nbnewmessage}} 
            @endif --}}
        </button>
        </li>
        
    
    </ul>
    
      <div class="tab-content" id="underline-tabContent">
            <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab" tabindex="0">
                <form id="corbeille"action="{{route('forcedeletemessage')}}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">De</th>
                            <th scope="col">à</th>
                            <th scope="col">Objet</th>
                            <th scope="col">Reçu</th>
                            <th scope="col"><input type="checkbox" id="master-checkboxcorb" style="display:none"><label for="master-checkboxcorb">Tout sélectionner</label></th>     
                            <th></th>                       
                        </tr>                       
                        </thead>
                        <tbody>
                            @forelse ($corbeille as $message)
                               
                                    <tr>
                                        <th>  <a href="{{route('readmessage', "$message->id")}}">{{$message->expediteur->name}} </a> </th>
                                        <th>  <a href="{{route('readmessage', "$message->id")}}">{{$message->destinataire->name}} </a> </th>
                                        <td> <a href="{{route('readmessage', "$message->id")}}"> {{$message->objet}} </a> </td>
                                        <td> <a href="{{route('readmessage', "$message->id")}}"> {{date_format($message->created_at,'d M Y H:i:s')}} </a> </td>
                                        <td> <input type="checkbox" class="checkboxcorb" name="{{$message->id}}" value="{{now();}}"> </td>
                                        <td><a href="{{route('restoredeletedmessage', "$message->id")}}">Restaurer le message</a></td>
                                    </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="6">Corbeille vide</td>
                                </tr>
                            @endforelse
                        
                        
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="selection3">Supprimer définitivement <br> la sélection</td>
                                <td></td>
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