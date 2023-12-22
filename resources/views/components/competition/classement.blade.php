<div id="pageClassement" style="background-color: white"> 

    
        @foreach ($classement as $index => $groupe)
                @php                        
                    $promotion = $groupe['0']['description'];
                    $intituleGroupe = $groupe['0']['group'];
                @endphp
            <table id="tableClassement">
                <tr>
                    <td colspan="12">{{$intituleGroupe}}</td>
                </tr>
              <tr id="titreColonne">
                <td colspan="3"> </td>
                <td> J </td>
                <td> V </td>
                <td> N</td>
                <td> P </td>                
                <td colspan="3"> Buts </td>
                <td > + / - </td>
                <td> Pts</td>
              </tr>
                {{-- <tr>
                    <td colspan="12"style="width: 100%"> <hr class="classementPromotion"> </td>
                </tr> --}}

            @foreach ($groupe as $equipe)
                
                <tr 
                    class="ligneClassement"
                    @if ($promotion !== $equipe['description'])
                    style=" border-top: 2px solid rgba(128, 128, 128, 0.93)!important"
                
                    @endif
                    > 
                    <td> {{$equipe['rank']}} </td>
                    <td class="clubClassement"> <img class="logoClub" src="{{$equipe['team']['logo']}}" alt="" width="500" height="500"/> </td>
                    <td class="clubClassement"> {{$equipe['team']['name']}} </td>
                    <td> {{$equipe['all']['played']}} </td>
                    <td> {{$equipe['all']['win']}} </td>
                    <td> {{$equipe['all']['draw']}} </td>
                    <td> {{$equipe['all']['lose']}} </td>
                    <td class="butsFor"> {{$equipe['all']['goals']['for']}} </td>
                    <td > - </td>
                    <td class="butsAgainst"> {{$equipe['all']['goals']['against']}} </td>
                    <td > {{$equipe['goalsDiff']}} </td>
                    <td class="points"> {{$equipe['points']}} </td>                   
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