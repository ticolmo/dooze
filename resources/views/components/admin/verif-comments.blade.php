<div class="entete" style="font-size:16px"> Liste des commentaires non vérifiés du site</div>
<br>
<form action="{{route('admin.comments.check')}}" method="POST">
     @csrf
        <table class="table table-striped table-hover">
            <thead>
                <tr class="titre">
                    <th>DE</th>
                    <th>Emplacement</th>
                    <th>Type</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th >Vérifié</th>
                    <th>Media</th>
                    <th>Lien</th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td > <input type="checkbox" id="master-checkbox" style="display:none"><label for="master-checkbox" style="text-align: center">Tout sélectionner</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </thead>
                
                    @foreach ($publications as $publication)            
                        <tr>
                            <td> {{$publication->post->user->name}} </td>
                            <td> {{$publication->post->club->nom}} </td>                
                            <td> {{ class_basename($publication->post->getMorphClass())}} </td>
                            <td> {{ $publication->post->contenu}} </td>
                            <td> {{date_format($publication->post->updated_at,'d M Y H:i:s')}} </td>
                            <td style="text-align: center"> <input type="checkbox" class="checkbox" name="{{$publication->id_publication}}" value="{{now();}}"></td>
                            <td>
                                @if ($publication->post->fichier_media != null && Storage::disk('public')->exists("users/{$publication->post->user_id}/{$publication->post->fichier_media}") )            
                                    @php
                                    $fileExtension = pathinfo($publication->post->fichier_media, PATHINFO_EXTENSION);
                                    @endphp
                                    
                                    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    {{-- le fichier est une image --}}
                                    <div style="text-align:center;"><img  style="width:300px; height:auto" src='{{ Storage::url("users/{$publication->post->user_id}/{$publication->post->fichier_media}") }}' alt="">
                                    </div>
                                    @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                    {{-- le fichier est une vidéo --}}    
                                    <div style="text-align:center;"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/{$publication->post->user_id}/{$publication->post->fichier_media}") }}'></video>
                                    </div>         
                                    @endif                    
                                    
                                @endif
                            </td>                
                            <td><a href="{{route('commentaire.pleinepage', $publication->id_publication)}}">voir</a></td>
                            <td>
                                <a href="{{route('admin.comment.proceduredelete', $publication->id_publication)}}">Supprimer le commentaire</a>
                            </td>
                        </tr>
                            
                    @endforeach
                    
        
        </table><br>
        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm"> Confirmer la vérification des éléments selectionnés</button> 
        </div>
    </form>
