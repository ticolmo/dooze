<div>
    @section('section')
    Meilleurs Buteurs
    @endsection
    @php
        $rang =  0;
        $nbButDuPrecedant = null;
        $pareil = 0;
    @endphp
    <table>
        <tr>
            <td>Dg :</td>
            <td> Duels gagnés</td>
        </tr>
        <tr>
            <td>Tt :</td>
            <td> Tirs totals</td>
        </tr>
        <tr>
            <td>Mj :</td>
            <td> Matchs joués</td>
        </tr>
    </table>
    <table id="buteurs">
        <tr>
            <td></td>
            <td></td>
            <td>Equipe</td>
            <td>Dg</td>
            <td>Tt</td>
            <td>Mj</td>
            <td>%</td>
            <td>Buts</td>
            <td></td>
        </tr>
        

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
                <td > {{$buteur['player']['name']}} <br> Age: {{$buteur['player']['age']}} </td>
                <td > {{$buteur['statistics']['0']['team']['name']}} </td>
                <td > {{$buteur['statistics']['0']['duels']['won']}} </td>                               
                <td > {{$buteur['statistics']['0']['shots']['total']}} </td>
                <td > {{$buteur['statistics']['0']['games']['appearences']}} </td> 
                <td>
                    @php
                        $ratio = $buteur['statistics']['0']['goals']['total'] / $buteur['statistics']['0']['games']['appearences'];
                    @endphp
                    {{number_format($ratio,2)}}
                </td>
                <td > {{$buteur['statistics']['0']['goals']['total']}} </td>
                <td> <img class="photoButeur" src=" {{$buteur['player']['photo']}} " alt=""> </td>
                
            </tr>
            @php
                $nbButDuPrecedant = $buteur['statistics']['0']['goals']['total'];  
                $pareil = $rang;              
            @endphp
        @endforeach

          
        
      </table>
      
    


</div>