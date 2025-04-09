<?php

class ModeloDB
{
    private static $conexion = null;

    private static function conexionBd()
    {
        //Credenciales de la base de datos desde el fichero config.ini.  
        $ficheroConfig = parse_ini_file(__DIR__ . "/../Config/config.ini");
        //Valaido si hay una conexión previamente establecida
        if (self::$conexion === null) {
            self::$conexion = new mysqli($ficheroConfig['server'], $ficheroConfig['user'], $ficheroConfig['pasw'], 'mesaclickdb');
            //Error de conexión. 
            if (self::$conexion->connect_error) {
                die("Error de conexión " . self::$conexion->connect_error);
            }
            self::$conexion->set_charset('utf8');
        }
        return self::$conexion;
    }



    public static function consultaInsercion($nombre, $email, $telefono, $passwordHash)
    {
        // Consulta SQL con marcadores de posición
        $sql = "INSERT INTO usuarios (id,nombre, email, telefono, password) 
        VALUES (1,'$nombre', '$email', '$telefono', '$passwordHash')";

        // Obtener la conexión
        $conexion = self::conexionBd();

        if ($conexion->query($sql) === TRUE) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    /* 
        public static function consultaInsercion($consulta, ...$parametros)
        {
            $conexion = self::conexionBd();
            $preparacion = self::preparar($conexion, $consulta, ...$parametros);
            if ($preparacion->execute()) {
                return true;
            } else {
                //En caso de error se retorna
                return false;
            }
        } */


    // Esta función valida si hay parametros en la consulta y los prepara distinguiendo entre string y integer.
    private static function preparar($conexion, $consulta, ...$parametros)
    {
        $preparacion = $conexion->prepare($consulta);
        if ($parametros) {
            $tipos = "";
            foreach ($parametros as $parametro) {
                //Verifica si el paramtero es un número o un string
                $tipos .= is_int($parametro) ? 'i' : 's';
            }
            $preparacion->bind_param($tipos, ...$parametros);
        }
        return $preparacion;
    }


    //Función que retornara los datos consultados.
    public static function consultaLectura($consulta, ...$parametros): mixed
    {
        $conexion = self::conexionBd();
        $preparacion = self::preparar($conexion, $consulta, ...$parametros);
        $preparacion->execute();
        $resultado = $preparacion->get_result();

        //Comprobación de resultados
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }


    }
    public static function cerrarConexion()
    {
        if (self::$conexion !== null) {
            self::$conexion->close();
            self::$conexion = null;

        }
    }




}