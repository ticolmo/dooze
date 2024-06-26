@extends('admin.layouts.admin')

@section('content')



<div style="text-align:center; margin-bottom:15px">
    <a href="{{route('admin.index')}}">Accueil</a> / <a href="{{route('admin.mailbox')}}">Messagerie</a> 
</div>
<div id="trash" style="text-align:center"> <i class="bi bi-trash3" style="font-size: 2rem"></i>
</div>

<ul class="nav nav-underline mb-3 " id="underline-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="underline-home-tab" data-bs-toggle="tab" data-bs-target="#underline-home" type="button" role="tab" aria-controls="underline-home" aria-selected="true">Corbeille

    </button>
    </li>
    

</ul>

  <div class="tab-content" id="underline-tabContent">
        <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab" tabindex="0">
            <form id="corbeille"action="{{route('admin.forcedeletemail')}}" method="POST">
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
                                    <th>  <a href="{{route('admin.readmail', "$message->id")}}">{{$message->expediteur->name}} </a> </th>
                                    <th>  <a href="{{route('admin.readmail', "$message->id")}}">{{$message->destinataire->name}} </a> </th>
                                    <td> <a href="{{route('admin.readmail', "$message->id")}}"> {{$message->objet}} </a> </td>
                                    <td> <a href="{{route('admin.readmail', "$message->id")}}"> {{date_format($message->created_at,'d M Y H:i:s')}} </a> </td>
                                    <td> <input type="checkbox" class="checkboxcorb" name="{{$message->id}}" value="{{now();}}"> </td>
                                    <td><a href="{{route('admin.restoredeletedmail', "$message->id")}}">Restaurer le message</a></td>
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
                            <td id="selection3">Supprimer définitivement la sélection</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <button type="submit" style="display:none">xxxx</button>
            </form>
            
    
        </div>
        
   
    </div>
  






  
    
@endsection