@extends('layout.funciones')
@section('title', __('traslate.logo')) 
@section('contenido')
     <!-- Sección de bienvenida -->
     <section class="hero">
        <h2>{{ __('traslate.hero-title') }}</h2>
        <p class="texto-index-titulo">{{ __('traslate.hero-text') }}</p>
        <div class="hero-image dark-mode-target">
            <picture>
                <source srcset="img/webp/index_1.webp" type="image/webp">
                <img src="img/index_1.png" alt="Sur del Huila">
            </picture>
        </div>
    </section>
    <!-- Sección de Información -->
    <section class="why-visit">
        <h2>{{ __('traslate.why-visit-title') }}</h2>
        <div class="cards-container">
            <div class="card dark-mode-target">
                <div> <!-- Nuevo div para la imagen -->
                    <picture class="imgDescripcionIndex">
                        <source srcset="img/webp/index_2.webp" type="image/webp">
                        <img src="img/index_2.png" alt="Paisajes Inigualables">
                    </picture>
                </div>
                <div class="text-visit"> <!-- Nuevo div para el texto -->
                    <h3 class="visit-title">{{ __('traslate.card1-title') }}</h3>
                    <p  class="text-visit">{{ __('traslate.card1-text') }}</p>
                </div>
            </div>
            <div class="card dark-mode-target">
                <div>
                    <picture class="imgDescripcionIndex">
                        <source srcset="img/webp/index_3.webp" type="image/webp">
                        <img src="img/index_3.png" alt="Patrimonio Arqueológico">
                    </picture>
                </div>
                <div>
                    <h3 class="visit-title">{{ __('traslate.card2-title') }}</h3>
                    <p  class="text-visit">{{ __('traslate.card2-text') }}</p>
                </div>
            </div>
            <div class="card dark-mode-target">
                <div>
                    <picture class="imgDescripcionIndex">
                        <source srcset="img/webp/index_4.webp" type="image/webp">
                        <img src="img/index_4.png" alt="Gastronomía Auténtica">
                    </picture>
                </div>
                <div>
                    <h3 class="visit-title">{{ __('traslate.card3-title') }}</h3>
                    <p class="text-visit">{{ __('traslate.card3-text') }}</p>
                </div>
            </div>
        </div>
    </section>   
@endsection
