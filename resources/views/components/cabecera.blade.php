<header class="dark-mode-target">
    <div class="log dark-mode-target">
     <!-- Logo con traducción -->
     <h1 class="logo">
        <a href="{{ url('/') }}" id="logo">{{ __('traslate.logo') }}</a>
    </h1>
    <div>
    <nav class="navbar">
        
        <ul class="nav-links dark-mode-target">
            <!-- Enlaces con traducciones -->
            <li class="linea"><a href="{{ route('sitios') }}" id="sitios">{{ __('traslate.sitios') }}</a></li>
            <li class="linea"><a href="{{ route('restaurantes') }}" id="restaurantes">{{ __('traslate.restaurantes') }}</a></li>
            <li class="linea"><a href="{{ route('hoteles') }}" id="hoteles">{{ __('traslate.hoteles') }}</a></li>
            <li class="linea"><a href="{{ route('transportes') }}" id="transporte">{{ __('traslate.transporte') }}</a></li>
            <li class="acerca-container">
                <button class="btn-acercaa dark-mode-target" onclick="window.location.href='{{ route('acerca') }}'">
                   <a> {{ __('traslate.acerca1') }}</a>
                </button>
            </li>
            
            @if (Auth::check())
            <li>
                <button class="btn-login dark-mode-target" onclick="window.location.href='{{ route('logout') }}'">{{ __('traslate.logouts') }}</button>
                </li>
            @else
            <li>
                <button class="btn-login dark-mode-target" onclick="window.location.href='{{ route('login') }}'">{{ __('traslate.logins') }}</button>
                </li>
            @endif
            <!-- Botón para cambiar idioma -->
            <li>
                <center><button class="language-switch dark-mode-target" onclick="changeLanguage()"><a> {{ __('traslate.language-switch') }}</a>
                </button></center>
            </li>

            <li>
                <label class="switch">
                    <input type="checkbox" id="dark-mode-toggle">
                    <span class="slider dark-mode-target">
                        <span class="switch__indicator"></span>
                        <span class="switch__decoration"></span>
                        <span class="switch__decoration1"></span>
                        <span class="switch__decoration2"></span>
                    </span>
                  </label>
            </li>
        </ul>

    </nav>
</header>