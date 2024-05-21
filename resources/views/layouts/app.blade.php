<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- Open Graph --}}
  <meta property="og:title" content="Titre de votre page">
  <meta property="og:description" content=@yield('og:description')>
  <meta property="og:image" content="URL de l'image à afficher">
  <meta property="og:url" content="https://wisteriassistante.ch/prestations/" />
	<meta property="og:site_name" content="Dooze" />

  <title> @yield('title') - Dooze</title>
  @livewireStyles
  @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/bootstrap.scss','resources/js/bootstrapjs.js'])

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"> 
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
  <script src=" https://cdn.jsdelivr.net/npm/twitter-widgets@2.0.0/index.min.js "></script>
  <script src=" https://cdn.jsdelivr.net/npm/lazyloadxt@1.1.0/dist/jquery.lazyloadxt.min.js "></script>

  {{-- emoji --}}

  <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
  <script src="https://unpkg.com/twemoji@latest/dist/twemoji.min.js" crossorigin="anonymous"></script>
  {{-- Cookies validés - RGPD --}}
  <x-partials.rgpd />

@php
    $langueEnCours = App::currentLocale();    
@endphp
<script>        
  window.Langue = {{ Js::from($langueEnCours) }}           
</script>  



</head>

<body>

  <livewire:partials.don/> 

  @yield('content')
  <livewire:partials.cookies/> 
  
  <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>

  @livewireScriptConfig 
</body>

</html>