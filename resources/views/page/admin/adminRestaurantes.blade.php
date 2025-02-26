@extends(__('layout.funciones'))

@section('contenido')
    <div class="containerAdmin">
        <div class="cardAdmin dark-mode-target">
            <a class="singup">Gestión de Restaurantes</a>

            {{-- Mostrar Mensajes --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Formulario para Agregar o Editar un restaurante --}}
            @php
                $isEditing = isset($restaurant) && $restaurant->id;
                $route = $isEditing ? route('restaurantes.update', $restaurant->id) : route('restaurantes.store');
                $method = $isEditing ? 'PUT' : 'POST';

                $slogan = json_decode($restaurant->slogan ?? '{}', true);
                $descripcion = json_decode($restaurant->descripcion ?? '{}', true);
                $servicio = json_decode($restaurant->servicio ?? '{}', true);
                $img = json_decode($restaurant->img ?? '{}', true);
            @endphp

            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($isEditing)
                    @method('PUT')
                @endif

                <div class="formulario">
                    @foreach ([
            'nombre' => 'Nombre',
            'departamento' => 'Departamento',
            'ciudad' => 'Ciudad',
        ] as $name => $label)
                        <div class="inputBox">
                            <input type="text" class="lugarEvento" name="{{ $name }}" required
                                value="{{ old($name, $restaurant->$name ?? '') }}">
                            <span>{{ $label }}:</span>
                        </div>
                    @endforeach
                    @foreach ([
            'direccion' => 'Dirección',
            'whatsapp' => 'WhatsApp',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'tiktok' => 'TikTok',
        ] as $name1 => $label1)
                        <div class="inputBox">
                            <input type="text" class="lugarEvento" name="{{ $name1 }}"
                                value="{{ old($name1, $restaurant->$name1 ?? '') }}">
                            <span>{{ $label1 }}:</span>
                        </div>
                    @endforeach
                    {{-- Campo para imágenes --}}
                    @for ($i = 0; $i < 3; $i++)
                        <div class="inputBox">
                            <input type="text" class="lugarEvento" name="img_{{ $i }}"
                                value="{{ old("img_$i", $img[$i] ?? '') }}">
                            <span>Imagen {{ $i + 1 }}:</span>
                        </div>
                    @endfor

                    {{-- Campos para textos en diferentes idiomas --}}
                    @foreach (['slogan', 'servicio', 'descripcion'] as $field)
                        @foreach (['es' => 'ES', 'en' => 'EN'] as $lang => $langLabel)
                            <div class="inputBox">
                                <textarea class="lugarEvento" name="{{ $field }}_{{ $lang }}">{{ old("{$field}_{$lang}", ${$field}[$lang] ?? '') }}</textarea>
                                <span>{{ ucfirst($field) }} ({{ $langLabel }}):</span>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <button type="submit" class="enter">{{ $isEditing ? 'Actualizar' : 'Guardar' }}</button>
            </form>


        </div>
    </div>

    @if (isset($restaurant) && $restaurant->id)
    @else
        <!-- Buscador -->
        <div class="input-container-buscador dark-mode-target">
            <input class="input-buscador dark-mode-target" name="text-buscador" type="text-buscador" id="buscador2"
                placeholder="{{ __('traslate.buscador') }}" />
        </div>
        <table class="table dark-mode-target table-bordered mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurantes as $restaurant)
                <tr class="Filtro" 
                data-nombre="{{ $restaurant->nombre }}" 
                data-ciudad="{{ $restaurant->ciudad ?? '' }}" 
                data-departamento="{{ $restaurant->departamento ?? '' }}">
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->nombre }}</td>
                        <td>{{ $restaurant->departamento }}</td>
                        <td>{{ $restaurant->ciudad }}</td>
                        <td>{{ $restaurant->direccion }}</td>
                        <td class="acciones">
                            <button class="editBtn" type="button"
                                onclick="window.location='{{ route('restaurantes.updateId', $restaurant->id) }}'">
                                <svg height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                    </path>
                                </svg>
                            </button>

                            <form action="{{ route('restaurantes.destroy', $restaurant->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este restaurant?');">
                                @csrf
                                @method('DELETE')
                                <!-- From Uiverse.io by vinodjangid07 -->
                                <button type="submit" class="bin-button">
                                    <svg class="bin-top" viewBox="0 0 39 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line y1="5" x2="39" y2="5" stroke="white" stroke-width="4">
                                        </line>
                                        <line x1="12" y1="1.5" x2="26.0357" y2="1.5" stroke="white"
                                            stroke-width="3"></line>
                                    </svg>
                                    <svg class="bin-bottom" viewBox="0 0 33 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_8_19" fill="white">
                                            <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z">
                                            </path>
                                        </mask>
                                        <path
                                            d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
                                            fill="white" mask="url(#path-1-inside-1_8_19)"></path>
                                        <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
                                        <path d="M21 6V29" stroke="white" stroke-width="4"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    @endif
    
    </table>
@endsection
