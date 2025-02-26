<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield("title")</title>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/carrusel.css') }}">
<link rel="stylesheet" href="{{ asset('css/carrusel2.css') }}">
<link rel="stylesheet" href="{{ asset('css/darkMode.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<script src="{{ asset('js/script.js')}}" defer ></script>
<script src="{{ asset('js/evento.js') }}" defer></script>
<script src="{{ asset('js/darkMode.js') }}" defer></script>
<!-- Pasa la URL de cambio de idioma y el idioma actual como atributos data-* -->
<span id="language-data"
      data-switch-route="{{ route('language.switch', ':locale') }}"
      data-current-locale="{{ app()->getLocale() }}"
      hidden>
</span>
</head>
<body class="{{ session('theme', 'light') === 'dark' ? 'dark-mode' : '' }}">
    <x-cabecera></x-cabecera>
    <x-admin></x-admin>
@yield("contenido")
</div>
<x-footer></x-footer>
</body>
</html>