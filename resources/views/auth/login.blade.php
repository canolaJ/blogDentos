@extends('layouts.master')

@section('content')
<section class="container__login">
    <form class="form__login" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
        <img src="{{ asset('img/logoDentos.png') }}" alt="">
        <input class="usuario {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="text" placeholder="Usuario">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input class="pwd {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" placeholder="Contraseña">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <button type="submit" class="btn btn-primaryP" href="#">Ingresar</button>
        <a href="{{ route('post') }}" class="btn btn-successP"><i class="fa-solid fa-share-from-square"></i> Volver a Inicio</a>

    </form>
</section>
@endsection
