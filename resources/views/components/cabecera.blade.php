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
                    <li class="linea"><a class="lineaa" href="{{ route('sitios') }}"
                            id="sitios">{{ __('traslate.sitios') }}</a></li>
                    <li class="linea"><a class="lineaa" href="{{ route('restaurantes') }}"
                            id="restaurantes">{{ __('traslate.restaurantes') }}</a></li>
                    <li class="linea"><a class="lineaa" href="{{ route('hoteles') }}"
                            id="hoteles">{{ __('traslate.hoteles') }}</a></li>
                    <li class="linea"><a class="lineaa" href="{{ route('transportes') }}"
                            id="transporte">{{ __('traslate.transporte') }}</a></li>
                    <li class="acerca-container">
                        <button class="btn-acercaa dark-mode-target"
                            onclick="window.location.href='{{ route('acerca') }}'">
                            <a> {{ __('traslate.acerca1') }}</a>
                        </button>
                    </li>

                    @if (Auth::check())
                        <li>
                            <button class="btn-login dark-mode-target"
                                onclick="window.location.href='{{ route('logout') }}'">{{ __('traslate.logouts') }}</button>
                        </li>
                    @else
                        <li>
                            <button class="btn-login dark-mode-target"
                                onclick="window.location.href='{{ route('login') }}'">{{ __('traslate.logins') }}</button>
                        </li>
                    @endif
                    <!-- Botón para cambiar idioma -->
                    <li>

                        <button class="language-switch dark-mode-target" onclick="changeLanguage()">
                            <a class="noLinea">
                                @if (App::getLocale() == 'en')
                                    <svg width="30" height="20" viewBox="0 0 60 40"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="60" height="40" fill="#00247D" />
                                        <polygon
                                            points="0,0 8,0 30,16 52,0 60,0 60,8 38,20 60,32 60,40 52,40 30,24 8,40 0,40 0,32 22,20 0,8"
                                            fill="white" />
                                        <polygon
                                            points="0,0 5,0 30,18 55,0 60,0 60,5 35,20 60,35 60,40 55,40 30,22 5,40 0,40 0,35 25,20 0,5"
                                            fill="#CF142B" />
                                        <rect x="25" width="10" height="40" fill="white" />
                                        <rect y="15" width="60" height="10" fill="white" />
                                        <rect x="27" width="6" height="40" fill="#CF142B" />
                                        <rect y="17" width="60" height="6" fill="#CF142B" />
                                    </svg>
                                @else
                                    <svg width="30" height="20" viewBox="0 0 6 4"
                                        xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;">
                                        <rect width="6" height="4" fill="#FFD700" />
                                        <rect y="2" width="6" height="1" fill="#0033A0" />
                                        <rect y="3" width="6" height="1" fill="#CE1126" />
                                    </svg>
                                @endif

                            </a>
                        </button>


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
