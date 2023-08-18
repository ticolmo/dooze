<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div id="wg-api-football-game"
    data-host="v3.football.api-sports.io"
    data-key="dd8bf5fada55f6377910ef4ee79f7916"
    data-id=""
    data-theme="gray"
    data-refresh="15"
    data-show-errors="false"
    data-show-logos="true">
    </div> 
<script>        
      
      let standings = document.getElementById('wg-api-football-game')
      var id = {{$id}};
        console.log(id); // 1104957
      
      standings.setAttribute('data-id', id)
      
</script>
<script
    type="module"
    src="https://widgets.api-sports.io/2.0.3/widgets.js">
</script>








