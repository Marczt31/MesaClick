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
            SELECT mesa_id FROM reservas WHERE fecha = ? AND hora = ?
        )";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $fecha, $hora);
        $stmt->execute();
        return $stmt->get_result();
    }

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
    }
}
