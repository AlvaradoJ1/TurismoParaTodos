@extends('layout.funciones')
@section('title', __('traslate.ingresar'))
@section('contenido')

    <div class="login-box dark-mode-target">
        <p>{{ __('traslate.ingresar') }}</p>
        <form method="POST" action="{{ route('login.auth') }}">
            <div class="user-box dark-mode-target">
                <input type="email" class="dark-mode-target" id="email" name="email" placeholder="" required>
                <label>{{ __('traslate.email') }}</label>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="user-box dark-mode-target">
                <input type="password" class="dark-mode-target" id="password" name="password" placeholder="" required>                <label>{{ __('traslate.password') }}</label>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
                <button type="submit" class="btn-acceder dark-mode-target">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    {{ __('traslate.ingresar') }}
                </button>

            @csrf
        </form>
        <div class="card-footer">
            <p>{{ __('traslate.noRegistrado') }}  <a href="{{ route('registrar') }} " class="a2 dark-mode-target">{{ __('traslate.registrar') }}</a>
            </p>
        </div>
    </div>

@endsection
