$(document).ready(function() {
    // Manejar el evento de envío del formulario
    $("#formularioAltaUsuario").submit(function(e) {
        e.preventDefault();  // Evitar el envío tradicional

        // Obtener los valores de los campos
        let nombre = $("#nombre").val().trim();
        let email = $("#email").val().trim();
        let telefono = $("#telefono").val().trim();
        let password = $("#password").val();
        let confirmarClave = $("#confirmarClave").val();

        let valido = true;  // Bandera para verificar la validez

        // Validación de cada campo
        if (!nombre) {
            alert("El campo 'Nombre' es obligatorio.");
            valido = false;
        }

        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!email || !emailRegex.test(email)) {
            alert("Por favor, ingrese un email válido.");
            valido = false;
        }

        let telefonoRegex = /^\+?\d{1,3}?[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}$/;
        if (!telefono || !telefonoRegex.test(telefono)) {
            alert("Por favor, ingrese un teléfono válido.");
            valido = false;
        }

        if (!password) {
            alert("El campo 'Contraseña' es obligatorio.");
            valido = false;
        }

        if (password !== confirmarClave) {
            alert("Las contraseñas no coinciden.");
            valido = false;
        }

        // Si todo es válido, enviar los datos con AJAX
        if (valido) {
            $.ajax({
                url: 'servidor.php',  // URL donde enviarás los datos
                type: 'POST',
                data: {
                    nombre: nombre,
                    email: email,
                    telefono: telefono,
                    password: password
                },
                success: function(response) {
                    alert('Formulario enviado correctamente.');
                    // Aquí podrías hacer algo más con la respuesta del servidor
                },
                error: function() {
                    alert('Hubo un error al enviar el formulario.');
                }
            });
        } else {
            alert("Por favor, corrija los errores en el formulario.");
        }
    });
});