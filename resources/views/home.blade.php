@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col__logout">
            <h5>
                {{ Auth::user()->name }}
            </h5>
            <a class="btn btn-dangerP" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Cerrar Sesión
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
            <a class="btn btn-successP"href="#">Cargar Post Externos</a>
            <a class="btn btn-warningP"href="#">Crear Post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de tus Post</h1>
        </div>
    </div>
    <hr>
    <div class="row">
    </div>
</div>
@endsection
