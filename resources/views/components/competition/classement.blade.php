<div style="background-color: white"> 

    
        @foreach ($classement as $index => $groupe)
                @php                        
                    $promotion = $groupe['0']['description'];
                    $intituleGroupe = $groupe['0']['group'];
                @endphp
            <table>
                <tr>
                    <td colspan="12">{{$intituleGroupe}}</td>
                </tr>
              <tr>
                <td colspan="3"> </td>
                <td> J </td>
                <td> V </td>
                <td> N</td>
                <td> P </td>                
                <td colspan="3"> Buts </td>
                <td> + / - </td>
                <td> Pts</td>
              </tr>
                

            @foreach ($groupe as $equipe)
                @if ($promotion !== $equipe['description'])
                <tr>
                    <td colspan="12"style="width: 100%"> <hr class="classementPromotion"> </td>
                </tr>
                
                @endif
                <tr> 
                    <td> {{$equipe['rank']}} </td>
                    <td> <img src="{{$equipe['team']['logo']}}" alt="" width="500" height="500"/> </td>
                    <td> {{$equipe['team']['name']}} </td>
                    <td> {{$equipe['all']['played']}} </td>
                    <td> {{$equipe['all']['win']}} </td>
                    <td> {{$equipe['all']['draw']}} </td>
                    <td> {{$equipe['all']['lose']}} </td>
                    <td> {{$equipe['all']['goals']['for']}} </td>
                    <td> - </td>
                    <td> {{$equipe['all']['goals']['against']}} </td>
                    <td> {{$equipe['goalsDiff']}} </td>
                    <td> {{$equipe['points']}} </td>                   
                </tr>                      

                @php
                    $intitule = $equipe['group'];
                    $promotion = $equipe['description'];
                @endphp
            @endforeach        
            </table>
            <br style="margin-bottom: 150px">
            
        @endforeach

    
   
    
</div>