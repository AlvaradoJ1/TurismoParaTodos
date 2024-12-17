    // Captura el input y todos los sitios
    const buscador = document.getElementById('buscador');
    const sitios = document.querySelectorAll('.sitio');

    // Evento input para filtrar sitios
    buscador.addEventListener('input', () => {
        const filtro = buscador.value.toLowerCase();
        sitios.forEach(sitio => {
            const lugar = sitio.getAttribute('data-lugar').toLowerCase();
            // Mostrar u ocultar el sitio
            if (lugar.includes(filtro)) {
                sitio.style.display = 'block';
            } else {
                sitio.style.display = 'none';
            }
        });
    });
