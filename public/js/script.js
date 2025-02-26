    // Captura el input y todos los sitios
    const buscador = document.getElementById('buscador');
    const sitios = document.querySelectorAll('.sitio');
if(buscador){
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
}
//buscador filtro
document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById('buscador2');
    if(buscador){
    const filas = document.querySelectorAll('.Filtro');
    buscador.addEventListener('input', () => {
        const filtro = buscador.value.toLowerCase();
        filas.forEach(fila => {
            const nombre = fila.getAttribute('data-nombre').toLowerCase();
            const ciudad = fila.getAttribute('data-ciudad').toLowerCase();
            const departamento = fila.getAttribute('data-departamento').toLowerCase();

            if (nombre.includes(filtro) || ciudad.includes(filtro) || departamento.includes(filtro)) {
                fila.style.display = 'table-row';
            } else {
                fila.style.display = 'none';
            }
        });
    });
}
});



document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll(".inputBox input, .inputBox textarea");

    function checkInputValue(input) {
        if (input.value.trim() !== "") {
            input.classList.add("has-content");
        } else {
            input.classList.remove("has-content");
        }
    }

    inputs.forEach(input => {
        checkInputValue(input);
        input.addEventListener("input", function() {
            checkInputValue(this);
        });
    });
});

