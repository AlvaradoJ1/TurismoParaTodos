
function changeLanguage() {
    const currentLocale = document.getElementById('language-data').getAttribute('data-current-locale');
    const newLocale = currentLocale === 'es' ? 'en' : 'es';

    // Redirige a la ruta que cambia el idioma
    const switchRoute = document.getElementById('language-data').getAttribute('data-switch-route');
    window.location.href = switchRoute.replace(':locale', newLocale);
}

document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll('.card'); // Selecciona todas las tarjetas

    cards.forEach(card => {
        // Agrandar la tarjeta al pasar el mouse
        card.addEventListener('mouseenter', function () {
            card.style.transform = 'scale(1.05)'; // Aumenta el tamaño en un 5%
            card.style.transition = 'transform 0.3s ease'; // Suaviza la transición
        });

        // Restaurar el tamaño original al quitar el mouse
        card.addEventListener('mouseleave', function () {
            card.style.transform = 'scale(1)'; // Vuelve al tamaño original
        });
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const carousels = document.querySelectorAll('.carousel2');

    function obtenerTarjetaFrontal(carousel) {
        let tarjetaFrontal = null;
        let zIndexMax = -1;

        const cards = carousel.querySelectorAll('.card2');
        cards.forEach(card => {
            const zIndex = parseInt(window.getComputedStyle(card).zIndex);
            if (zIndex > zIndexMax) {
                zIndexMax = zIndex;
                tarjetaFrontal = card;
            }
        });

        return tarjetaFrontal;
    }

    carousels.forEach(carousel => {
        const cards = carousel.querySelectorAll('.card2');

        cards.forEach(card => {
            card.addEventListener('mouseenter', function () {
                const tarjetaFrontal = obtenerTarjetaFrontal(carousel);
                if (tarjetaFrontal === card) {
                    card.style.transform = 'scale(1.05)';
                    card.style.transition = 'transform 0.3s ease';
                }
            });

            card.addEventListener('mouseleave', function () {
                const tarjetaFrontal = obtenerTarjetaFrontal(carousel);
                if (tarjetaFrontal === card) {
                    card.style.transform = 'scale(1)';
                }
            });
        });
    });

    function iniciarCarrusel(claseCard, intervalo) {
        carousels.forEach(carousel => {
            const images = carousel.querySelectorAll(claseCard);
            let index = 0;
            let intervaloCarrusel;

            function updateCarousel() {
                images.forEach((img, i) => {
                    const offset = ((i - index + images.length) % images.length) - Math.floor(images.length / 2);
                    img.style.transform = `translateX(${offset * 30}%) scale(${1 - Math.abs(offset) * 0.1})`;
                    img.style.zIndex = `${100 - Math.abs(offset)}`;
                    img.style.opacity = `${1 - Math.abs(offset) * 0.3}`;
                });
                index = (index + 1) % images.length;
            }

            function iniciarIntervalo() {
                intervaloCarrusel = setInterval(updateCarousel, intervalo);
                updateCarousel();
            }

            function detenerIntervalo() {
                clearInterval(intervaloCarrusel);
            }

            carousel.addEventListener('mouseenter', detenerIntervalo);
            carousel.addEventListener('mouseleave', iniciarIntervalo);

            iniciarIntervalo();
        });
    }

    iniciarCarrusel('.card2', 3000);
});


document.addEventListener("DOMContentLoaded", function () {
    const commentBox = document.getElementById("commentBox");
    const hiddenComment = document.getElementById("hiddenComment");
    const form = document.querySelector(".comment-form");
if(commentBox){
    // 🎨 Botones de formato (Negrita, Cursiva, Subrayado, Tachado)
    const buttons = {
        bold: document.querySelector(".btn-bold"),
        italic: document.querySelector(".btn-italic"),
        underline: document.querySelector(".btn-underline"),
        strikethrough: document.querySelector(".btn-strikethrough"),
    };

    function applyFormat(command, button) {
        document.execCommand(command, false, null);
        button.classList.toggle("active");
        commentBox.focus();
    }

    buttons.bold.addEventListener("click", function () {
        applyFormat("bold", this);
    });

    buttons.italic.addEventListener("click", function () {
        applyFormat("italic", this);
    });

    buttons.underline.addEventListener("click", function () {
        applyFormat("underline", this);
    });

    buttons.strikethrough.addEventListener("click", function () {
        applyFormat("strikeThrough", this);
    });

    // 🖊️ Evento para actualizar el input oculto
    commentBox.addEventListener("input", function () {
        hiddenComment.value = commentBox.innerHTML.trim();
        checkEmptyContent();
    });

    function checkEmptyContent() {
        if (commentBox.innerText.trim() === "") {
            Object.values(buttons).forEach(button => button.classList.remove("active"));
        }
    }

    // ✍️ Placeholder funcional
    commentBox.addEventListener("focus", function () {
        if (commentBox.innerText === "Escribe tu comentario...") {
            commentBox.innerText = "";
        }
    });

    commentBox.addEventListener("blur", function () {
        if (commentBox.innerText.trim() === "") {
            commentBox.innerText = "Escribe tu comentario...";
        }
    });

    // ✅ Validación antes de enviar el formulario
    form.addEventListener("submit", function (event) {
        if (commentBox.innerText.trim() === "") {
            event.preventDefault();
            alert("Por favor, escribe un comentario antes de enviar.");
            return;
        }
        hiddenComment.value = commentBox.innerHTML;
    });

    // 😊 Interacción con emojis
    const emojiButton = document.querySelector(".btn-emoji");
    const emojiPicker = document.getElementById("emojiPicker");
    let lastRange;

    emojiButton.addEventListener("click", function (event) {
        event.stopPropagation();
        const rect = emojiButton.getBoundingClientRect();
        emojiPicker.style.top = `1120px`;
        emojiPicker.style.left = `320px`;
        emojiPicker.style.display = emojiPicker.style.display === "block" ? "none" : "block";
    });

    commentBox.addEventListener("mouseup", saveCursorPosition);
    commentBox.addEventListener("keyup", saveCursorPosition);

    function saveCursorPosition() {
        const selection = window.getSelection();
        if (selection.rangeCount > 0) {
            lastRange = selection.getRangeAt(0);
        }
    }

    emojiPicker.addEventListener("click", function (event) {
        if (event.target.tagName === "SPAN") {
            insertEmoji(event.target.innerText);
        }
    });

    document.addEventListener("click", function (event) {
        if (!emojiPicker.contains(event.target) && event.target !== emojiButton) {
            emojiPicker.style.display = "none";
        }
    });

    function insertEmoji(emoji) {
        commentBox.focus();
        const selection = window.getSelection();
        if (lastRange) {
            selection.removeAllRanges();
            selection.addRange(lastRange);
            const range = selection.getRangeAt(0);
            range.deleteContents();
            const textNode = document.createTextNode(emoji);
            range.insertNode(textNode);
            range.setStartAfter(textNode);
            range.setEndAfter(textNode);
            selection.removeAllRanges();
            selection.addRange(range);
            lastRange = range;
        }
    }
}
});