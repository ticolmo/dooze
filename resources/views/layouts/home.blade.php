<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">        
        <title>Dooze</title>        
        @vite(['resources/css/home.css', 'resources/js/home.js', 'resources/css/bootstrap.scss','resources/js/bootstrapjs.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />         
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      />        
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script> 
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
       
        {{-- Cookies validés - RGPD --}}
        @session("rgpd")
          <x-partials.rgpd />
        @endsession

  </head>
      
      
<body>

  
    <div id="accueil">

      <div id="vid1" style="background-color: black">
          @persist('video')
          <div id="filtreVideo"></div>
          <video id="myvideo"src="{{Storage::url('videos/Video1.mp4')}}" autoplay loop muted disablePictureInPicture></video>
          @endpersist
      </div>
      <div id="connect1">

        <livewire:partials.navbar-home />      
        @yield('content') 

      </div>
    </div>
    <livewire:partials.cookies/> 

   

<script>
    var swiper = new Swiper(".swiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    speed: 900,
    slidesPerGroup: 4,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: true,
    },
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
   
</body>
</html>