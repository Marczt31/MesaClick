<?php
require_once 'Modelos/resenaModelo.php';

class ResenaController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ResenaModelo();
    }

    public function verResenas() {
        $resenas = $this->modelo->obtenerResenas();
        include 'Vistas/verResenas.php';
    }
}
?>