<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logoDentos.png') }}" type="image/png" sizes="40x40">
    <title>BlogDentos</title>
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontAwesome/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
</head>
<body>
  <!-- start navigation -->

  <nav class="navbar navbar-expand-lg navbar-light bg__primary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <span class="navbar-brand" href="#">
            <img class="img__brand" src="{{ asset('img/logoDentos.png') }}" alt="" width="90" height="40">
        </span>
        <form class="d-flex me-auto">
          <input class="form-control me-1" type="search" placeholder="Buscar en el blog por fecha" aria-label="Search">
          <button class="btn btn-successP" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        @if (Route::has('login'))
            <div class="top-right links">
              @auth
                  <a href="{{ url('/home') }}">Inicio</a>
              @else
                  <button class="btn btn-successP" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Ingresar</button>
                  <button class="btn btn-warningP" href="{{ route('register') }}"><i class="fa-solid fa-circle-plus"></i> Registrarse</button>
              @endauth
            </div>
          @endif
      </div>
    </div>
  </nav>

  <!-- end navigation -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>