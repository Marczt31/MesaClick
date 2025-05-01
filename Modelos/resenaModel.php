<?php
require_once 'baseDatos.php';

class ResenaModelo {
    private $conn;

    public function __construct() {
        $db = new baseDatos();
        $this->conn= $db->getConnection();
    }

    public function obtenerResenas() {
        $sql = "SELECT r.calificacion, r.comentario, r.fecha_resena, u.nombre AS usuario
                FROM resena r
                JOIN usuario u ON r.usuario_id = u.id
                ORDER BY r.fecha_resena DESC";
        $stmt = $this->conn>prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
