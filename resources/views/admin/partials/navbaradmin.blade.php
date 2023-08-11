<nav class="navbar navbar-expand-lg bg-light mb-lg-3 entete">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://dooze.test:8089/">Dooze</a>

    <div> Portail d'administation</div>
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-globe2"></i> Autres Clubs
          </a>

          <ul class="dropdown-menu scrollable-menu">
            <li><input id="myInput" style="width:100%" type="text" placeholder="Rechercher..."></li>

      {{-- composant - liste des clubs --}}
            <x-listeclubs />


          </ul>
        </li>


        
        
              
      <li class="nav-item">
          <form action="{{route('logout')}}" method="post"> 
            @csrf
            <button id="buttonnavbar" class="nav-link"type="submit"><i class="bi bi-person-slash"></i>  Deconnexion</button> </form>          
        </li> 
      
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-translate"></i> Langue
          </a>
          <!-- Cookies -->
          <ul class="dropdown-menu scrollable-menu">
            <li><a class="dropdown-item" href="ManUnited.html?lang=en">ENG</a></li>
            <li><a class="dropdown-item" href="ManUnited.html?lang=es">ESP</a></li>
            <li><a class="dropdown-item" href="ManUnited.html?lang=de">DEU</a></li>
            <li><a class="dropdown-item" href="ManUnited.html?lang=fr">FR</a></li>
            <li><a class="dropdown-item" href="ManUnited.html?lang=it">IT</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>