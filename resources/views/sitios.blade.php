@extends('layout.funciones')
@section('title', __('traslate.sit'))
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
    <!-- Listar lugares -->
    <div class="sitios-container">
        @foreach ($sitios as $sitio)
            @php
                $slogans = json_decode($sitio->slogan, true);
                 $slogan = $slogans[app()->getLocale()] ?? 'slogan no disponible';
                $descripciones = json_decode($sitio->descripcion, true);
                $descripcion = $descripciones[app()->getLocale()] ?? 'Descripción no disponible';
                $servicios = json_decode($sitio->servicio, true);
                $servicio = $servicios[app()->getLocale()] ?? 'servicio no disponible';
                $img = json_decode($sitio->img, true);
            @endphp
            <section class="sitio dark-mode-target" data-lugar="{{ $sitio->ciudad }}">
                <h2 class="titulo dark-mode-target">📍{{ $sitio->nombre }}</h2>
                <p>{!! nl2br(e($slogan)) !!}</p>
                <div class="carousel2 dark-mode-target">
                    <div class="image-container2 dark-mode-target">
                        <img class="card2 dark-mode-target" src="img/{{ $img[0] }}" alt="Mirador del Cafetal - Vista 1">
                        <img class="card2 dark-mode-target" src="img/{{ $img[1] }}" alt="Mirador del Cafetal - Vista 2">
                        <img class="card2 dark-mode-target" src="img/{{ $img[2] }}" alt="Mirador del Cafetal - Vista 1">

                        <img class="card2 dark-mode-target" src="img/{{ $img[0] }}" alt="Mirador del Cafetal - Vista 1">
                        <img class="card2 dark-mode-target" src="img/{{ $img[1] }}" alt="Mirador del Cafetal - Vista 2">
                        <img class="card2 dark-mode-target" src="img/{{ $img[2] }}" alt="Mirador del Cafetal - Vista 2">
                    </div>
                </div>
                <p class="horario dark-mode-target">🕒 {!! nl2br(e($servicio)) !!}</p>
                <div class="btn-ver-detalles">
                    <button class="ver-detalles dark-mode-target" onclick="window.location='{{ route('verSitio', $sitio->id) }}'">Ver Más Detalles</button>
                </div>
            </section>
        @endforeach
    </div>
@endsection
