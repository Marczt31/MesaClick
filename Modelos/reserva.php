<?php
require_once 'Config/baseDatos.php';

class Reserva {
    private $conn;

    public function __construct() {
        $db = new baseDatos();
        $this->conn = $db->getConnection();
    }


    public function obtenerMesasDisponibles($fecha, $hora) {
        $sql = "SELECT * FROM mesas WHERE id NOT IN (
            SELECT mesa_id FROM reservas WHERE fecha = :fecha AND hora = :hora
        )";
        
        // Preparar la consulta
        $stmt = $this->conn->prepare($sql);
        
        // Vincular los parámetros
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':hora', $hora, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Puedes cambiar esto según lo que necesites
    }
    

    /*
    public function guardarReserva($nombre, $email, $fecha, $hora, $mesa_id) {
        $stmt = $this->conn->prepare("INSERT INTO reservas (nombre_cliente, email, fecha, hora, mesa_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $nombre, $email, $fecha, $hora, $mesa_id);
        return $stmt->execute();
    }

    public function mesaOcupada($fecha, $hora, $mesa_id) {
        $stmt = $this->conn->prepare("SELECT * FROM reservas WHERE fecha = ? AND hora = ? AND mesa_id = ?");
        $stmt->bind_param("ssi", $fecha, $hora, $mesa_id);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }*/

    public function guardarReserva($nombre, $email, $fecha, $hora, $mesa_id) {
        $sql = "INSERT INTO reservas (nombre_cliente, email, fecha, hora, mesa_id) VALUES (:nombre, :email, :fecha, :hora, :mesa_id)";
    
        // Preparar la consulta
        $stmt = $this->conn->prepare($sql);
    
        // Ejecutar la consulta con los parámetros
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':fecha' => $fecha,
            ':hora' => $hora,
            ':mesa_id' => $mesa_id
        ]);
    }

    public function mesaOcupada($fecha, $hora, $mesa_id) {
        $sql = "SELECT * FROM reservas WHERE fecha = :fecha AND hora = :hora AND mesa_id = :mesa_id";
    
        // Preparar la consulta
        $stmt = $this->conn->prepare($sql);
    
        // Ejecutar la consulta con los parámetros
        $stmt->execute([
            ':fecha' => $fecha,
            ':hora' => $hora,
            ':mesa_id' => $mesa_id
        ]);
    
        // Verificar si hay resultados
        return $stmt->rowCount() > 0;
    }
    
    
}
