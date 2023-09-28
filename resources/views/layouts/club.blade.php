<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title') - Dooze</title>
  @vite(['resources/css/club.css', 'resources/js/app.js','resources/css/bootstrap.scss','resources/js/bootstrapjs.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
 
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>

  {{-- emoji --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
  
 
  <script src="https://pagination.js.org/dist/2.6.0/pagination.js"></script>


  <style>
    .nav-link:hover {
      color: <?php echo $club->couleur_survol?> !important;
    }

    .blog h2 a:hover {
      color: <?php echo $club->couleur_survol?> !important;
    }
  </style>


</head>

<body>
  @include('partials.don')
  @include('partials.navbar')
  @yield('content')


  

    

</body>

</html>