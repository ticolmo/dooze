@extends('layouts.app2')

@section('content')

    <div id="pageRencontre">
        <div>
            <img src="{{ Storage::url('divers/rencontre.jpg') }}" alt="" style="position:fixed;z-index:-1;width:auto; height: 100%;transform: translatex(-30%)">
        </div>
        <div 
            id="wg-api-football-game"
            data-host="v3.football.api-sports.io"
            data-key="dd8bf5fada55f6377910ef4ee79f7916"
            data-id="{{$id}}"
            data-theme="gray"
            data-refresh="0"
            data-show-errors="false"
            data-show-logos="true"
            style="background-color: white"
            >
        </div> 


    </div>

    

<script
    type="module"
    src="https://widgets.api-sports.io/2.0.3/widgets.js">
</script>

@endsection







