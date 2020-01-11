<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GestApp</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <!--javascript-->
    <script src="https://kit.fontawesome.com/2dfc94baeb.js"></script>
</head>
<body class="bg-light">
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GestApp</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{ route ('logout')}}">Se déconnecter</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar bg-white">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link @if (request()->segment(1)=='home') {{ 'active' }} @endif" href="{{route('home')}}">
                <span data-feather="home"></span>
                Accueil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Factures
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (request()->segment(1)=='produits') {{ 'active' }} @endif" href="{{route('produits.show')}}">
                <span data-feather="shopping-cart"></span>
                Produits
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (request()->segment(1)=='clients') {{ 'active' }} @endif" href="{{route('clients.show')}}">
                <span data-feather="users"></span>
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (request()->segment(1)=='fournisseurs') {{ 'active' }} @endif" href="{{route('fournisseurs.show')}}">
                <span data-feather="users"></span>
                fournisseurs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (request()->segment(1)=='statistiques') {{ 'active' }} @endif" href="#">
                <span data-feather="bar-chart-2"></span>
                Statistiques
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (request()->segment(1)=='stocks') {{ 'active' }} @endif" href="#">
                <span data-feather="layers"></span>
                Stock
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 bg-light">
        
          @yield('content')

      </main>
    </div>
  </div>


  <!-- Scripts -->

 
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" ></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>


  @yield('javascript')
  
  
</body>
</html>
