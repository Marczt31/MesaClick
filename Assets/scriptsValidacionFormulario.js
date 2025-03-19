$(document).ready(function() {
    // Manejar el evento de envío del formulario
    $("#formularioAltaUsuario").submit(function(e) {
        e.preventDefault();  // Evitar el envío tradicional

        // Limpiar mensajes de error previos
        $(".error").remove();

        // Obtener los valores de los campos
        let nombre = $("#nombre").val().trim();
        let email = $("#email").val().trim();
        let telefono = $("#telefono").val().trim();
        let password = $("#password").val();
        let confirmarClave = $("#confirmarClave").val();

        let valido = true;  // Bandera para verificar la validez

        // Validación de cada campo

        // Validación de 'Nombre'
        if (!nombre) {
            $("#nombre").after('<span class="error">El campo "Nombre" es obligatorio.</span>');
            valido = false;
        }

        // Validación de 'Email'
        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email || !emailRegex.test(email)) {
            $("#email").after('<span class="error">Por favor, ingrese un email válido.</span>');
            valido = false;
        }

        // Validación de 'Teléfono'
        let telefonoRegex = /^\+?\d{1,3}?[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}$/;
        if (!telefono || !telefonoRegex.test(telefono)) {
            $("#telefono").after('<span class="error">Por favor, ingrese un teléfono válido.</span>');
            valido = false;
        }

        // Validación de 'Contraseña'
        if (!password) {
            $("#password").after('<span class="error">El campo "Contraseña" es obligatorio.</span>');
            valido = false;
        }

        // Validación de 'Confirmar Contraseña'
        if (password !== confirmarClave) {
            $("#confirmarClave").after('<span class="error">Las contraseñas no coinciden.</span>');
            valido = false;
        }

        // Si todo es válido, enviar los datos con AJAX
        /*if (valido) {
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
                    // Limpiar el formulario si es necesario
                    $("#formularioAltaUsuario")[0].reset();
                },
                error: function() {
                    alert('Hubo un error al enviar el formulario.');
                }
            });
        } else {
            // Si hay errores, mostrar una alerta general
            alert("Por favor, corrija los errores en el formulario.");
        }*/
    });
});