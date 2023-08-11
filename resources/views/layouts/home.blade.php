<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dooze</title>
        @vite(['resources/css/home1.css', 'resources/js/home.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js "></script>
        {{-- emoji --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
  

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      </head>
      
      
<body>
    <div id="accueil">

        <div id="vid1">
          <video id="myvideo"src="{{Storage::url('videos/Video1.mp4')}}" autoplay loop muted disablePictureInPicture></video>
    
        </div>
        <div id="connect1">

    @include('partials.navbarhome')          
    @yield('content')


<script
    type="module"
    src="https://widgets.api-sports.io/2.0.3/widgets.js">
</script>
   
</body>
</html>