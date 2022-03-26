@extends('layouts.master')

@section('content')
<!-- form register new user -->
<section class="container__login">
    <form class="form__register" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        @csrf
        <img src="{{ asset('img/logoDentos.png') }}" alt="">
        <input class="usuario {{ $errors->has('name') ? ' is-invalid' : '' }}" id="email" name="email" type="text" placeholder="Email" >
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input class="email {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" type="text" placeholder="Usuario">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <input class="pwd {{ $errors->has('name') ? ' is-invalid' : '' }}" id="password" name="password" type="password" placeholder="Contraseña">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input class="pwd {{ $errors->has('name') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" name="password" type="password" placeholder="Confirmar Contraseña">
        <input class="check__adult" name="check" type="checkbox" placeholder="Contraseña"><span>Declaro que soy mayor de edad.</span>

        <button type="submit" class="btn btn-primaryP" href="#">Registrar</button>
        <a href="{{ route('post') }}" class="btn btn-successP"><i class="fa-solid fa-share-from-square"></i> Volver a Inicio</a>

    </form>
</section>
@endsection
