@extends('layouts.master')

@section('content')
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
        <form class="d-flex me-auto" method="GET" action="{{ route('post') }}">
          <input class="form-control me-1" type="date" name="date" id="date" placeholder="Buscar un blog por fecha" title="Buscar post por fecha" aria-label="Search">
          <button class="btn btn-successP" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        @if (Route::has('login'))
            <div class="top-right links row__entry">
              @auth
                  <a href="{{ url('/home') }}">Inicio</a>
              @else
                  <a class="btn btn-successP" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Ingresar</a>
                  <a class="btn btn-warningP" href="{{ route('register') }}"><i class="fa-solid fa-circle-plus"></i> Registrarse</a>
              @endauth
            </div>
          @endif
      </div>
    </div>
  </nav>

  <!-- end navigation -->

  <!-- start main -->
  <main class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>Ultimos Post Agregados en DentOs</h1>
        </div>
      </div>
      <hr>
      <div class="row row__post">
        @forelse($posts as $post)<!-- data post in Bd -->
          <div class="col-sm-12 col-md-6 col-lg-4 card row__post">
            <div class="card__post">
              <h3>{{ $post['title_post'] }}</h3>
              <p>{{ $post['description_post'] }}</p>
              <div class="date"><i class="fa-solid fa-calendar-days"></i> {{ $post['created_at'] }}</div>
            </div>
          </div>
        @empty
          <h3>No existen post para mostrar para la fecha indicada!</h3><!-- messenge if data is empty -->
        @endforelse
      </div>
  </main>
  <!-- end main -->
@endsection