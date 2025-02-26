    @extends('layout.funciones')
    @section('title', __('traslate.acer')) 
    @section("contenido")
<section class="acerca-de dark-mode-target">
    <div class="row">
        <div class="col-12">
            <center><h2 class="title-acerca">{{ __('traslate.acerca')}}</h2></center>
        </div>
        <!-- Texto Acerca de Nosotros -->
        <div class="col-md-8 order-md-1 order-2">
            <p>{!! __('traslate.acerca-1')!!}</p>
        </div>
    </div>
    <!-- Formulario de Contacto -->
    <div class="contacto">
        <h3>{{ __('traslate.contacto')}}</h3>
        <form>
            <div class="formulario-campos">
                <input class="dark-mode-target" type="text" placeholder="{{ __('traslate.nombre')}}" required>
                <input class="dark-mode-target" type="text" placeholder="{{ __('traslate.apellido')}}" required>
                <input class="dark-mode-target" type="email" placeholder="{{ __('traslate.email')}}" required>
            </div>
            <textarea class="dark-mode-target" placeholder="{{ __('traslate.comentario')}}" rows="4" required></textarea>
            <button class="dark-mode-target" type="submit">{{ __('traslate.enviar')}}</button>
        </form>
    </div>
</section>
@endsection