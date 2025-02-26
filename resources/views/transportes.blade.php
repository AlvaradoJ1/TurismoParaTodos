@extends('layout.funciones')
@section('title', __('traslate.transport'))
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
        @foreach ($transportes as $transporte)
            @php
                $slogans = json_decode($transporte->slogan, true);
                $slogan = $slogans[app()->getLocale()] ?? 'slogan no disponible';
                $servicios = json_decode($transporte->servicio, true);
                $servicio = $servicios[app()->getLocale()] ?? 'Descripción no disponible';
                $img = json_decode($transporte->img, true);
            @endphp
            <section class="sitio dark-mode-target" data-lugar="{{ $transporte->ciudad }}">
                <h2 class="titulo dark-mode-target">{{ $transporte->icono . $transporte->nombre }}</h2>
                <div class="transporte-container">
                    <!-- Imagen principal a la izquierda -->
                    <div class="imagen-izquierda dark-mode-target">
                        <img src="img/{{ $img[0] }}" alt="Taxi Líneas Timanco">
                    </div>
                    <!-- Contenedor con imagen secundaria y texto -->
                    <div class="info-derecha dark-mode-target">
                        <img src="img/{{ $img[1] }}" alt="Flota de Taxis">
                        <div class="info-texto  dark-mode-target">
                            <p>🕒{!! nl2br(e($servicio)) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="info-texto dark-mode-target">
                    <center>
                        <p>{!! nl2br(e($slogan)) !!}</p>
                    </center>
                </div>
                <div class="btn-ver-detalles">
                    <button class="ver-detalles dark-mode-target" onclick="window.location='{{ route('verTransporte', $transporte->id) }}'">Ver Más Detalles</button></div>
            </section>
        @endforeach
    </div>

    @endsection
