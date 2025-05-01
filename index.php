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

session_start(); // Inicia la sesión al principio de la página


// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
    // Si está autenticado, mostrar su información
    $usuario = $_SESSION['usuario']; // Obtener la información del usuario

    include 'Vistas/Includes/header.html';
    echo "
        <div class='container'>
            <h2>Bienvenido, " . htmlspecialchars($usuario['nombre']) . "</h2>
            <a href='logout.php' class='btn btn-danger'>Cerrar sesión</a>
        </div>
    ";
    include 'Vistas/Includes/home.html';
    include 'Vistas/Includes/footer.html';
    exit; // Salir del script para no ejecutar más código
}

require_once 'Controladores/UsuarioController.php';
require_once 'Controladores/LoginController.php'; 
require_once "Controladores/ReservaController.php";
require_once "Controladores/ResenaController.php";
$accion = $_GET['accion'] ?? null;

$usuarioController = new UsuarioController();
$loginController = new LoginController();
$reservaController = new ReservaController();
$reservaController = new ResenaController();



// AJAX: Cargar mesas disponibles dinámicamente
if ($accion === 'obtenerMesas') {
    $reservaController->obtenerMesas();
    exit;
}

// Gestión del registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $accion === 'reserva') {
    $reservaController->reservar();
    exit;
}
// Mostrar formulario de reserva
if ($accion === 'reserva') {
    $reservaController->mostrarFormulario();
    exit;
}

// Gestión del registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $accion === 'registro') {
    $usuarioController->registrar();
    exit;
}

// Mostrar formulario de registro
if ($accion === 'registro') {
    $usuarioController->mostrarFormulario();
    exit;
}

// Mostrar formulario de login
if ($accion === 'login') {
    $loginController->mostrarFormulario();
    exit;
}

// Procesar autenticación del login
if ($accion === 'autenticar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->autenticar();
    exit;
}

// Mostrar reseñas
if ($accion === 'verResenas') {
    $resenaController->verResenas();
    exit;
}

// Mostrar formulario para dejar reseña
if ($accion === 'registroResena') {
    $resenaController->mostrarFormularioResena(); // 👈 La función la haremos ahora
    exit;
}

    include 'Vistas/Includes/header.html';
    include 'Vistas/Includes/home.html';
    include 'Vistas/Includes/footer.html';


?>
    <!--Script de Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>