// document.addEventListener("DOMContentLoaded", function () {
//     const formulario = document.getElementById('registroForm');

//     formulario.addEventListener('submit', function (event) {
//         const email = document.getElementById('email').value;
//         const password = document.getElementById('password').value;

//         // Validar que el correo tenga un formato válido
//         if (!/\S+@\S+\.\S+/.test(email)) {
//             alert('Por favor, ingresa un correo electrónico válido.');
//             event.preventDefault();
//             return;
//         }

//         // Validar que la contraseña tenga al menos 6 caracteres
//         if (password.length < 6) {
//             alert('La contraseña debe tener al menos 6 caracteres.');
//             event.preventDefault();
//             return;
//         }
//     });
// });