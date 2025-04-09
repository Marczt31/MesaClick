<?php
require_once __DIR__ . '/modeloDB.php';

class UsuarioModelo {
    public static function insertar($nombre, $email, $telefono, $passwordHash) {
        return ModeloDB::consultaInsercion($nombre,$email,$telefono,$passwordHash);
        /* return ModeloDB::consultaInsercion($sql, $nombre, $email, $telefono, $passwordHash); */
    }
}