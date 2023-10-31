<ul class="nav nav-underline mb-3 justify-content-center" id="underline-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="underline-home-tab" data-bs-toggle="tab" data-bs-target="#underline-home" type="button" role="tab" aria-controls="underline-home" aria-selected="true">Liste des commentaires signalés par les utilisateurs</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="underline-profile-tab" data-bs-toggle="tab" data-bs-target="#underline-profile" type="button" role="tab" aria-controls="underline-profile" aria-selected="false">Corbeille pour signalement</button>
    </li>

  </ul>

  <div class="tab-content" id="underline-tabContent">
    <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab" tabindex="0">
        
               <table class="table table-striped table-hover">
                   <thead>
                       <tr class="titre">
                           <th>Signalé par</th>
                           <th>Motif</th>
                           <th>Emplacement</th>
                           <th>Type</th>
                           <th>Contenu</th>
                           <th>Date</th>
                           <th>Media</th>
                           
                           <th>Lien</th>
                           <th></th>
                           <th></th>
                       </tr>
                      
                       
                   </thead>
                       
                           @foreach ($signalements as $signalement) 
                                <tr>
                                   <td> {{$signalement->user->name ?? 'non trouvé'}} </td>
                                   <td> {{$signalement->motif}} </td>   
                                   <td> {{$signalement->publication->post->club->nom}} </td>                
                                   <td> {{ class_basename($signalement->publication->post->getMorphClass())}} </td>
                                   <td> {{$signalement->publication->post->contenu}} </td>
                                   <td> {{date_format($signalement->publication->post->updated_at,'d M Y H:i:s')}} </td>                                   
                                   <td>
                                       @if ($signalement->publication->post->fichier_media != null && Storage::disk('public')->exists("users/{$signalement->publication->post->user_id}/{$signalement->publication->post->fichier_media}") )            
                                           @php
                                           $fileExtension = pathinfo($signalement->publication->post->fichier_media, PATHINFO_EXTENSION);
                                           @endphp
                                           
                                           @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                           {{-- le fichier est une image --}}
                                           <div style="text-align:center;"><img  style="width:300px; height:auto" src='{{ Storage::url("users/{$signalement->publication->post->user_id}/{$signalement->publication->post->fichier_media}") }}' alt="">
                                           </div>
                                           @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                           {{-- le fichier est une vidéo --}}    
                                           <div style="text-align:center;"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/{$signalement->publication->post->user_id}/{$signalement->publication->post->fichier_media}") }}'></video>
                                           </div>         
                                           @endif                    
                                           
                                       @endif
                                   </td>                                         
                                   <td><a href="{{route('commentaire.pleinepage', $signalement->publication->id_publication)}}">voir</a></td>
                                   <td>
                                       <form action="{{route('admin.comments.signalras')}}" method="POST">
                                            @csrf
                                            <div>Note:</div>
                                            <input type="hidden" name="idsignalement" value="{{$signalement->id_signalement}}">
                                            <textarea name="note" id="" cols="30" rows="4"></textarea><br>
                                            <button type="submit" class="btn btn-success btn-sm"> Aucune infraction (Corbeille pour signalement)</button>
                                       </form>
                                   </td>
                                   <td>
                                    <a href="{{route('admin.comment.proceduredelete', $signalement->publication->id_publication)}}">Supprimer le commentaire</a>
                                   </td>
                               </tr>


                                   
                           @endforeach                         
               
               </table>
               
            
       

    </div>
    <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab" tabindex="0">
        <form action="{{route('admin.comments.signalrasconfirm')}}" method="POST">
            @csrf
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="titre">
                            <th>Signalé par</th>
                            <th>Motif</th>
                            <th>Emplacement</th>
                            <th>Type</th>
                            <th>Contenu</th>
                            <th>Date</th>
                            <th>Media</th>                    
                            <th>Lien</th>
                            <th>Note</th>
                            <th> <input type="checkbox" id="master-checkbox" style="display:none"><label for="master-checkbox">Confirmer la conformité</label></th>
                        </tr>
                        
                    </thead>
                        
                    @foreach ($corbeille as $signalement)            
                        <tr>
                            <td> {{$signalement->user->name}} </td>
                            <td> {{$signalement->motif}} </td>   
                            <td> {{$signalement->publication->post->club->nom}} </td>                
                            <td> {{ class_basename($signalement->publication->post->getMorphClass())}} </td>
                            <td> {{$signalement->publication->post->contenu}} </td>
                            <td> {{date_format($signalement->publication->post->updated_at,'d M Y H:i:s')}} </td>                                   
                            <td>
                                @if ($signalement->publication->post->fichier_media != null && Storage::disk('public')->exists("users/{$signalement->publication->post->user_id}/{$signalement->publication->post->fichier_media}") )            
                                    @php
                                    $fileExtension = pathinfo($signalement->publication->post->fichier_media, PATHINFO_EXTENSION);
                                    @endphp
                                    
                                    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    {{-- le fichier est une image --}}
                                    <div style="text-align:center;"><img  style="width:300px; height:auto" src='{{ Storage::url("users/{$signalement->publication->post->user_id}/{$signalement->publication->post->fichier_media}") }}' alt="">
                                    </div>
                                    @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                    {{-- le fichier est une vidéo --}}    
                                    <div style="text-align:center;"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/{$signalement->publication->post->user_id}/{$signalement->publication->post->fichier_media}") }}'></video>
                                    </div>         
                                    @endif                    
                                    
                                @endif
                            </td>                                         
                            <td><a href="{{route('commentaire.pleinepage', $signalement->publication->id_publication)}}">voir</a></td>
                            <td>
                                <div> "{{$signalement->note_administrateur}}" </div>
                                <div> {{$signalement->administrateur->name}}</div>
                            </td>
                            <td>
                                <input type="checkbox" class="checkbox" name="{{$signalement->id_signalement}}" value="{{$signalement->id_signalement}}">
                            </td>
                        </tr>
                            
                    @endforeach
                            
                
                </table>
            <div class="text-center">
            <button type="submit" class="btn btn-success btn-sm"> Confirmer la conformité des éléments selectionnés</button> 
            </div>
        </form>

    </div>
   
  </div>
  

<div> </div>
<br>
