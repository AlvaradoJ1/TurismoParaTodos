<footer class="footer dark-mode-target">
    <div class="container text-center">
        @if (Auth::check())
        <p class="mb-0">
            © 2025 Turismo para Todos. Todos los derechos reservados. || Usuario: {{ Auth::user()->email }}
        </p>
        @else
        <p class="mb-0">
            © 2025 Turismo para Todos. Todos los derechos reservados. 
        </p>
        @endif
    </div>
</footer>