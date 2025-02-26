@extends('layout.funciones')
@section('title', '🏨' . $hotel->nombre)
@section('contenido')
<script src="{{ asset('js/hotelMegusta.js') }}" defer></script>
<div class="sitios-container">
        @php
            $slogans = json_decode($hotel->slogan, true);
            $slogan = $slogans[app()->getLocale()] ?? 'slogan no disponible';
            $descripciones = json_decode($hotel->descripcion, true);
            $descripcion = $descripciones[app()->getLocale()] ?? 'Descripción no disponible';
            $img = json_decode($hotel->img, true);
        @endphp
        <section class="sitio dark-mode-target" data-lugar="{{ $hotel->ciudad }}">
            <h2 class="titulo dark-mode-target">🏨 {{ $hotel->nombre }}</h2>
            <p>{!! nl2br(e($slogan)) !!}</p>
            <div class="carousel dark-mode-target">
                <div class="carous dark-mode-target">
                    <div class="image-container dark-mode-target">
                        <img class="card dark-mode-target" src="/img/{{ $img[0] }}" alt="Vista 1">
                        <img class="card dark-mode-target" src="/img/{{ $img[1] }}" alt="Vista 2">
                        <img class="card dark-mode-target" src="/img/{{ $img[2] }}" alt="Vista 1">
        
                        <img class="card dark-mode-target" src="/img/{{ $img[0] }}" alt="Vista 1">
                        <img class="card dark-mode-target" src="/img/{{ $img[1] }}" alt="Vista 2">
                        <img class="card dark-mode-target" src="/img/{{ $img[2] }}" alt="Vista 2">
                    </div>
                </div>
            </div>
            <p class="horario dark-mode-target">🕒{!! nl2br(e($descripcion)) !!}</p>            
            <ul class="wrapper dark-mode-target">
                @if ($hotel->facebook)
                    <li class="icon facebook">
                        <span class="tooltip">Facebook</span>
                        <svg viewBox="0 0 320 512" height="1.2em" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                            </path>
                        </svg>
                    </li>
                @endif

                @if ($hotel->twitter)
                    <li class="icon twitter">
                        <span class="tooltip">Twitter</span>
                        <svg height="1.8em" fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"
                            class="twitter">
                            <path
                                d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                            </path>
                        </svg>
                    </li>
                @endif

                @if ($hotel->instagram)
                    <li class="icon instagram">
                        <span class="tooltip">Instagram</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" fill="currentColor" class="bi bi-instagram"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                            </path>
                        </svg>
                    </li>
                @endif
                @if ($hotel->tiktok)
                    <li class="icon tiktok">
                        <span class="tooltip">TikTok</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" fill="currentColor" viewBox="0 0 448 512">
                            <path
                                d="M448 209.3c-21.7 2.5-43.7-.3-64.3-8.4-20.4-8-38.7-21-53.6-37.2v133c0 28-7.8 55.4-22.6 79-15.1 23.9-36.5 43.8-61.8 57-25.7 13.4-54.5 20.3-83.5 20.3C72 453 0 381 0 295.5S72 138 157.7 138c9.7 0 19.3.8 28.7 2.5v78c-9.4-2.5-19.1-3.8-28.7-3.8-49.2 0-89 39.5-89 88.7s39.8 88.7 89 88.7c48.8 0 88.6-39.3 88.8-88V0h81c-.1 12 1.5 24 4.7 35.6 3 11.4 7.7 22.3 13.7 32.4 5.9 10.1 13.1 19.3 21.5 27.3 8.3 8.1 17.8 14.8 28.2 20 11 5.3 22.8 9.1 34.9 11.4 12.3 2.4 25 3.3 37.6 2.8v79z">
                            </path>
                        </svg>
                    </li>
                @endif

                @if ($hotel->whatsapp)
                    <li class="icon whatsapp">
                        <span class="tooltip">WhatsApp</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" fill="currentColor" viewBox="0 0 448 512">
                            <path
                                d="M380.9 97.1C340.3 56.4 285.1 32 224 32 103 32 3 132 3 253c0 43.6 11.5 86 33.2 123.3L0 480l107.2-35.2C145.3 467.6 184.2 480 224 480h.1c121 0 221.9-100.1 221.9-221.9 0-61.1-24.3-116.3-65.1-157zm-157 335.3c-33.8 0-66.7-9-95.5-26.1l-6.9-4.1-63.6 20.8 21.2-61.8-4.5-7C55.8 324.8 45 289.9 45 253 45 151.1 122.2 74 224 74c54 0 104.6 21 142.7 59.2C404 171.2 425 221.8 425 275.9 425 377.8 347.8 454.9 224 454.9zm117.3-138.7c-6.3-3.2-37.4-18.5-43.2-20.6-5.8-2.1-10.1-3.2-14.3 3.2-4.2 6.3-16.4 20.6-20.1 24.9-3.7 4.2-7.4 4.7-13.7 1.6-6.3-3.2-26.6-9.8-50.7-31.3-18.7-16.6-31.3-37.1-35-43.5-3.7-6.3-.4-9.8 2.8-13.2 2.9-2.9 6.3-7.4 9.5-11.1 1.1-1.3 2.1-2.7 3.2-4 2.1-2.6 3.2-4.2 4.8-7.4 2.1-4.2 1.1-7.9-.5-11.1-1.6-3.2-14.3-34.6-19.7-47.5-5.2-12.5-10.5-10.8-14.3-11s-8-.8-12.3-.8-11.1 1.6-17 7.9c-5.8 6.3-22.3 21.8-22.3 53.1s22.8 61.6 26 65.8c3.2 4.2 44.7 68.2 108.5 95.7 15.1 6.5 26.9 10.3 36.2 13.3 15.2 4.8 29 4.1 39.8 2.5 12.1-1.8 37.4-15.3 42.7-30 5.3-14.7 5.3-27.2 3.7-30.1-1.6-2.6-5.7-4.2-12.1-7.3z">
                            </path>
                        </svg>
                    </li>
                @endif
            </ul>
        </section>
    </div>
      <div class="sitios-container">
        <div class="cardC dark-mode-target">
            <span class="title dark-mode-target">Comentarios</span>
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            @foreach ($hotel->comentarios_hoteles as $comentario)
                <div class="comments">
                        <div class="comment-react dark-mode-target">
                            <button class="meGusta" data-id="{{ $comentario->id }}" data-tipo="{{ $tipo }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </path>
                                </svg>
                            </button>
                            <hr>
                            <span class="like-count">{{ $comentario->likes_count }}</span>
                        </div>
                    <div class="comment-container dark-mode-target">
                        <div class="user dark-mode-target">
                            <div class="user-pic dark-mode-target">
                                <svg fill="none" viewBox="0 0 24 24" height="20" width="20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linejoin="round" fill="#707277" stroke-linecap="round" stroke-width="2"
                                        stroke="#707277"
                                        d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z">
                                    </path>
                                    <path stroke-width="2" fill="#707277" stroke="#707277"
                                        d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <div class="user-info dark-mode-target">
                                    <span>{{ $comentario->usuario }}</span>
                                    @php
                                        $locale = app()->getLocale(); // Obtiene el idioma actual ('es' o 'en')
                                        \Carbon\Carbon::setLocale($locale);
                                    @endphp

                                    <p class="hora-comentario dark-mode-target">
                                        {{ \Carbon\Carbon::parse($comentario->created_at)->translatedFormat('l, F jS \a\t g:ia') }}
                                    </p>
                                </div>
                                <p class="comment-content dark-mode-target">
                                    <p>{!! $comentario->comentario ?? 'Sin contenido' !!}</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-box dark-mode-target">
                <div class="box-container dark-mode-target">
                    @if (Auth::check())
                        <form action="{{ route('comentarios.store.hotel', $hotel->id) }}" method="POST"
                            class="comment-form">
                            @csrf
                            <div class="comment-box dark-mode-target" contenteditable="true" placeholder="Escribe tu comentario..." id="commentBox"></div>
                            <input type="hidden" name="comentario" id="hiddenComment">
                            <div class="btnscomentarios">
                                <div class="formatting dark-mode-target">
                                    <button type="button" class="btn-bold" title="Negrita">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linejoin="round"
                                                d="M6.75 3.744h-.753v8.25h7.125a4.125 4.125 0 0 0 0-8.25H6.75Zm0 0v.38m0 16.122h6.747a4.5 4.5 0 0 0 0-9.001h-7.5v9h.753Zm0 0v-.37m0-15.751h6a3.75 3.75 0 1 1 0 7.5h-6m0-7.5v7.5m0 0v8.25m0-8.25h6.375a4.125 4.125 0 0 1 0 8.25H6.75m.747-15.38h4.875a3.375 3.375 0 0 1 0 6.75H7.497v-6.75Zm0 7.5h5.25a3.75 3.75 0 0 1 0 7.5h-5.25v-7.5Z" />
                                        </svg>
                                    </button>
                                    <!-- Cursiva -->
                                    <button type="button" class="btn-italic" title="Cursiva">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.248 20.246H9.05m0 0h3.696m-3.696 0 5.893-16.502m0 0h-3.697m3.697 0h3.803" />
                                        </svg>
                                    </button>
                                    <!-- Subrayado -->
                                    <button type="button" class="btn-underline" title="Subrayado">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.995 3.744v7.5a6 6 0 1 1-12 0v-7.5m-2.25 16.502h16.5" />
                                        </svg>
                                    </button>
                                    <!-- Tachado -->
                                    <button type="button" class="btn-strikethrough" title="Tachado">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 12a8.912 8.912 0 0 1-.318-.079c-1.585-.424-2.904-1.247-3.76-2.236-.873-1.009-1.265-2.19-.968-3.301.59-2.2 3.663-3.29 6.863-2.432A8.186 8.186 0 0 1 16.5 5.21M6.42 17.81c.857.99 2.176 1.812 3.761 2.237 3.2.858 6.274-.23 6.863-2.431.233-.868.044-1.779-.465-2.617M3.75 12h16.5" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn-emoji" title="Emoji" onclick="openEmojiPicker()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="emoji-picker dark-mode-target" id="emojiPicker">
                                    <span>😊</span> <!-- Feliz -->
                                    <span>😍</span> <!-- Encantado -->
                                    <span>🤩</span> <!-- Maravillado -->
                                    <span>👍</span> <!-- Me gusta -->
                                    <span>🌟</span> <!-- Excelente -->
                                    <span>🏝️</span> <!-- Playa -->
                                    <span>🏔️</span> <!-- Montaña -->
                                    <span>🚶‍♂️</span> <!-- Explorando -->
                                    <span>📸</span> <!-- Fotografía -->
                                    <span>🍽️</span> <!-- Gastronomía -->
                                    <span>🚗</span> <!-- Viaje -->
                                    <span>🛶</span> <!-- Aventura -->
                                    <span>🌄</span> <!-- Paisaje hermoso -->
                                    <span>❤️</span> <!-- Amor por el lugar -->
                                    <span>🔥</span> <!-- Increíble experiencia -->                              
                                </div>
                                <button type="submit" class="btnEnviar dark-mode-target">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                            d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                </div>
            @else
                <p class="login-message dark-mode-target">
                    <a href="{{ route('login') }}">Log in to leave a comment</a>
                </p>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
