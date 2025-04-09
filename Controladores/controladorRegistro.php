<?php
 require_once __DIR__ . "/../Modelos/modeloUsuario.php"; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmarClave = $_POST['confirmarClave'] ?? '';

    if ($password !== $confirmarClave) {
        die("Las contraseñas no coinciden.");
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $resultado = UsuarioModelo::insertar($nombre, $email, $telefono, $passwordHash);

    if ($resultado) {
        header("Location: registro.php?success=1");
        exit;
    } else {
        echo "Error al registrar el usuario.";
    }
}
