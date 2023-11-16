<div>
    @php
        $rang =  0;
        $nbButDuPrecedant = null;
        $pareil = 0;
    @endphp
    <table>
        

        @foreach ($meilleursButeurs as $buteur)
            @php
                if($buteur['statistics']['0']['goals']['total'] !== $nbButDuPrecedant){
                  $rang++;  
                };
                
            @endphp
            <tr>
                <td> 
                    @if ($rang !== $pareil)
                        {{$rang}}
                    @endif
                
                </td>
                <td > {{$buteur['player']['name']}} </td>
                <td > {{$buteur['statistics']['0']['team']['name']}} </td>
                <td > {{$buteur['statistics']['0']['goals']['total']}} </td>
                <td > <img src=" {{$buteur['player']['photo']}} " alt=""> </td>
                
            </tr>
            @php
                $nbButDuPrecedant = $buteur['statistics']['0']['goals']['total'];  
                $pareil = $rang;              
            @endphp
        @endforeach

          
        
      </table>
      
    


</div>