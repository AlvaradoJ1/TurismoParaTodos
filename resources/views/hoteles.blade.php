    @extends('layout.funciones')
    @section('title', __('traslate.hotel'))
    @section('contenido')
        <!-- Buscador -->
        <div class="input-container-buscador dark-mode-target">
            <input
              class="input-buscador dark-mode-target"
              name="text-buscador"
              type="text-buscador"
              id="buscador"
              placeholder="{{ __('traslate.buscador') }}"
            />
          </div>
        <div class="sitios-container">
            @foreach ($hoteles as $hotel)
                @php
                    $slogans = json_decode($hotel->slogan, true);
                    $slogan = $slogans[app()->getLocale()] ?? 'slogan no disponible';
                    $servicios = json_decode($hotel->servicio, true);
                    $servicio = $servicios[app()->getLocale()] ?? 'Descripción no disponible';
                    $img = json_decode($hotel->img, true);
                @endphp
                <section class="sitio dark-mode-target" data-lugar="{{ $hotel->ciudad }}">
                    <h2 class="titulo dark-mode-target">🏨{{ $hotel->nombre }}</h2>
                    <p>{!! nl2br(e($slogan)) !!}</p>
                    <div class="carousel dark-mode-target">
                        <div class="carous dark-mode-target">
                            <div class="image-container dark-mode-target">
                                <img class="card dark-mode-target" src="img/{{ $img[0] }}" alt="Mirador del Cafetal - Vista 1">
                                <img class="card dark-mode-target" src="img/{{ $img[1] }}" alt="Mirador del Cafetal - Vista 2">
                                <img class="card dark-mode-target" src="img/{{ $img[2] }}" alt="Mirador del Cafetal - Vista 1">

                                <img class="card dark-mode-target" src="img/{{ $img[0] }}" alt="Mirador del Cafetal - Vista 1">
                                <img class="card dark-mode-target" src="img/{{ $img[1] }}" alt="Mirador del Cafetal - Vista 2">
                                <img class="card dark-mode-target" src="img/{{ $img[2] }}" alt="Mirador del Cafetal - Vista 2">
                            </div>
                        </div>
                    </div>
                    <p class="horario dark-mode-target">🕒 {!! nl2br(e($servicio)) !!}</p>
                        <div class="btn-ver-detalles">
                            <button class="ver-detalles dark-mode-target" onclick="window.location='{{ route('verHotel', $hotel->id) }}'">Ver Más Detalles</button>
                        </div>
                </section>
            @endforeach
        </div>
    @endsection
