<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/imagenes/cuchillos_blanco.png" />
    <title>MesaClick</title>
    <!-- link css de Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link iconos de Bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- link css -->
    <link rel="stylesheet" href="Assets/estilos.css">
    <!--links Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
<?php 

require_once 'Controladores/UsuarioController.php';

$controlador = new UsuarioController();

// Verifica si se está haciendo un POST (registro) o si se pidió específicamente el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST' || (isset($_GET['accion']) && $_GET['accion'] === 'registro')) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controlador->registrar();
    } else {
        $controlador->mostrarFormulario();
    }
    exit; // Evita seguir cargando otras vistas después del formulario
}


include 'Vistas/Includes/header.html';

include 'Vistas/Includes/home.html';

include 'Vistas/Includes/footer.html';

?>
    <!--Script de Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>