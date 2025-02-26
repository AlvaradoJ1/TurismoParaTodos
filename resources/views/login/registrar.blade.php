    @extends('layout.funciones')
    @section('title', __('traslate.registrar'))
    @section('contenido')
        <div class="login-box dark-mode-target">
            <p>{{ __('traslate.registrar') }}</p>
            <form method="POST" action="{{ Route('registrar.store') }}">
                <div class="user-box dark-mode-target">
                    <input type="usuario" class="dark-mode-target" id="usuario" name="usuario" placeholder=""
                        value="{{ old('name') }}" required>
                    <label for="email" class="form-label">{{ __('traslate.name') }}</label>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="user-box dark-mode-target">
                    <input type="email" class="dark-mode-target" id="email" name="email" placeholder=""
                        value="{{ old('email') }}" required>
                    <label for="email" class="form-label">{{ __('traslate.email') }}</label>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="user-box dark-mode-target">
                    <input type="password" class="dark-mode-target" id="password" name="password" placeholder="" required>
                    <label for="password" class="form-label">{{ __('traslate.password') }}</label>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn-acceder dark-mode-target">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    {{ __('traslate.registrar') }}</button>
                @csrf
            </form>
            <div class="card-footer text-center">
                <p>{{ __('traslate.registrado') }} <a href="{{ route('login') }}"
                        class="a2 dark-mode-target">{{ __('traslate.ingresar') }}</a></p>
            </div>
        </div>
    @endsection
