<?php
require_once 'Config/baseDatos.php';

class Usuario {
    public $nombre;
    public $email;
    public $telefono;
    public $password;
    private $conn;

    public function __construct() {
        $db = new baseDatos();
        $this->conn = $db->getConnection();
    }

    public function guardar() {

        // Verificar si el correo electrónico ya está registrado
        $query = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // Si el correo ya está registrado, retornar un error
        if ($count > 0) {
            // Mostrar un mensaje de error con un botón para regresar al registro
            
            echo "<h2>El correo electrónico ya está registrado. Por favor, usa otro correo.</h2>";
            
            return false;
        }

        // Si el correo no está registrado, proceder con el registro del usuario
        $query = "INSERT INTO usuarios (nombre, email, telefono, password) VALUES (:nombre, :email, :telefono, :password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':password', $this->password);

        return $stmt->execute();
    }
}
