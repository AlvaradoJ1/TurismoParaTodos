@if(auth()->user()->hasRole('admin'))
<ul class="nav-links dark-mode-target">
    <li>
        <button class="btnAdmin dark-mode-target"
            onclick="window.location.href='{{ route('sites.index') }}'">
            Admin Sitios
        </button>
    </li>
    <li>
        <button class="btnAdmin dark-mode-target"
            onclick="window.location.href='{{ route('restaurantes.index') }}'">
            Admin Restaurantes
        </button>
    </li>
    <li>
        <button class="btnAdmin dark-mode-target"
            onclick="window.location.href='{{ route('hoteles.index') }}'">
            Admin Hoteles
        </button>
    </li>
    <li>
        <button class="btnAdmin dark-mode-target"
            onclick="window.location.href='{{ route('transportes.index') }}'">
            Admin Transportes
        </button>
    </li>
</ul>
@endif