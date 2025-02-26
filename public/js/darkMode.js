document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('dark-mode-toggle');
    const body = document.body;
    const elementsToToggle = document.querySelectorAll('.dark-mode-target'); // Selecciona todos los elementos con la clase dark-mode-target

    // Obtener el tema actual de localStorage o sesión
    const savedTheme = localStorage.getItem('theme') || 'light';

    // Función para aplicar el tema
    const applyTheme = (isDarkMode) => {
        body.classList.toggle('dark-mode', isDarkMode);
        elementsToToggle.forEach(element => {
            element.classList.toggle('dark-mode', isDarkMode); // Aplica a todos los elementos con dark-mode-target
        });
    };

    // Aplicar el tema guardado
    if (savedTheme === 'dark') {
        applyTheme(true);
        toggle.checked = true;
    } else {
        applyTheme(false);
        toggle.checked = false;
    }

    // Detectar el cambio del checkbox y aplicar el tema inmediatamente
    toggle.addEventListener('change', function() {
        const isDarkMode = toggle.checked;

        // Aplicar el cambio de tema en tiempo real
        applyTheme(isDarkMode);

        // Guardar en localStorage
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

        // Enviar el tema al servidor para que se guarde en la sesión
        fetch('/set-theme', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ theme: isDarkMode ? 'dark' : 'light' })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al guardar el tema');
            }
            return response.json();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});