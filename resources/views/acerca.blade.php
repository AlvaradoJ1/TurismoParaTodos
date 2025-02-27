    @extends('layout.funciones')
    @section('title', __('traslate.acer')) 
    @section("contenido")
<section class="acerca-de dark-mode-target">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
        <form action="{{ route('contacto.enviar') }}" method="POST">
            @csrf
            <div class="formulario">
            <div class="inputBox">
                <input class="lugarEvento" type="text" name="nombre" required>
                <span>{{ __('traslate.nombre')}}:</span>
            </div>
            <div class="inputBox">
                <input class="lugarEvento" type="text" name="numero" required>
                <span>{{ __('traslate.numero')}}:</span>
            </div>
            <div class="inputBox">
                <input class="lugarEvento" type="email" name="email" required>
                <span>{{ __('traslate.email')}}:</span>
            </div>
            </div>
            <div class="inputBox">
                <textarea class="lugarEvento" name="comentario"></textarea>
                <span>{{ __('traslate.comentario')}}:</span>
            </div>
            <button type="submit" class="enter">{{ __('traslate.envia')}}</button>
        </form>
            <!-- #region 
            
            
        -->
    </div>
</section>
@endsection