<div class="entete" style="font-size:16px"> Commentaires supprimés</div>
<br>



        <table class="table table-striped table-hover">
            <thead>
                <tr class="titre">
                    <th>DE</th>
                    <th>Emplacement</th>
                    <th>Type</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Motif de suppression</th>
                    <th>Media</th>
                    <th></th>
                    <th></th>
                </tr>
                
            </thead>
                    
                    @foreach ($corbeille as $publication)            
                        <tr>
                            <td> {{$publication->user->name}} </td>
                            <td> {{$publication->club->nom}} </td>                
                            <td> {{ class_basename($publication->getMorphClass())}} </td>
                            <td> {{$publication->contenu}} </td>
                            <td> {{date_format($publication->updated_at,'d M Y H:i:s')}} </td>
                            <td> 
                                @php
                                $commentaire = $publication->getMorphClass();
                                $test = new $commentaire();
                                $test3 = $test::withTrashed()->find($publication->id);
                                $sfc = $test3->publication()->withTrashed()->first();
                                echo $sfc->motif_suppression;
                                @endphp
                            </td>
                            <td>
                                @if ($publication->fichier_media != null && Storage::disk('public')->exists("users/{$publication->user_id}/{$publication->fichier_media}") )            
                                    @php
                                    $fileExtension = pathinfo($publication->fichier_media, PATHINFO_EXTENSION);
                                    @endphp
                                    
                                    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    {{-- le fichier est une image --}}
                                    <div style="text-align:center;"><img  style="width:300px; height:auto" src='{{ Storage::url("users/{$publication->user_id}/{$publication->fichier_media}") }}' alt="">
                                    </div>
                                    @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                    {{-- le fichier est une vidéo --}}    
                                    <div style="text-align:center;"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/{$publication->user_id}/{$publication->fichier_media}") }}'></video>
                                    </div>         
                                    @endif                    
                                    
                                @endif
                            </td>                
                            
                            @php
                                $model = $publication->getMorphClass();
                            @endphp
                            <td>
                                <form action="{{route('admin.comment.restore')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="idcom" value="{{$publication->id}}">
                                    <input type="hidden" name="model" value="{{$model}}">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Restaurer le commentaire</button>
                                </form>
                             </td>
                            <td>
                                <form action="{{route('admin.comment.forcedelete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="idcom" value="{{$publication->id}}">
                                    <input type="hidden" name="model" value="{{$model}}">
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer définitivement le commentaire</button>
                                </form>
                            </td>
                        </tr>
                            
                    @endforeach
                    
        
        </table><br>
        
       
    </form>