@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col__logout">
            <h5>
            <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}
            </h5>
            <a class="btn btn-dangerP" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Cerrar Sesión <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col__create__post">
            <a class="btn btn-successP"href="#" data-bs-toggle="modal" id="api" data-bs-target="#post__externo" data-bs-whatever="@mdo"><i class="fa-solid fa-file-arrow-up"></i> Cargar Post Externos</a>
            <a class="btn btn-warningP" href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-circle-plus"></i> Crear Post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de tus Post</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        @forelse($posts as $post)<!-- data post in Bd -->
          <div class="col-sm-12 col-md-6 col-lg-4 card row__post">
            <div class="card__post">
              <h3>{{ $post['title_post'] }}</h3>
              <p>{{ $post['description_post'] }}</p>
              <div class="date"><i class="fa-solid fa-calendar-days"></i> {{ $post['created_at'] }}</div>
            </div>
          </div>
        @empty
          <h3 class="is__Post">No haz creado ningún post para mostrar en el BlogDentos!</h3><!-- messenge if data is empty -->
        @endforelse
      </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg__success">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('store') }}">
                @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Titulo Del Post:</label>
                        <input type="text" class="form-control" name="title_post" id="title_post" minlength="5" maxlength="40"  required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" id="description_post" name="description_post" minlength="8" maxlength="250" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dangerP" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" href="#" class="btn btn-primaryP">Crear</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="post__externo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg__success">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Post Externo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="new__post">
                    <!-- here data of apiRest -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dangerP" data-bs-dismiss="modal">Cerrar</button>
                <button  data-bs-dismiss="modal" aria-label="Close" id="create__post" href="#" class="btn btn-primaryP">Crear Posts</button>
            </div>
        </div>
    </div>
</div>

@endsection
