<?php
require_once 'Modelos/Usuario.php';

class UsuarioController {
    public function mostrarFormulario() {
        include 'Vistas/registro.php';
    }

    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = new Usuario();
            $usuario->nombre = $_POST['Nombre'];
            $usuario->email = $_POST['email'];
            $usuario->telefono = $_POST['telefono'];
            $usuario->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($usuario->guardar()) {
                include 'Vistas/success.php';
            } else {
                echo "<h2>Error al registrar el usuario.</h2>"; 
                echo "<a href='Vistas/registro.php'>Volver al registro</a>";
            }
        }
    }
}
