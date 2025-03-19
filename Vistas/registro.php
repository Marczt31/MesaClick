<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Don Giovanni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Assets/scriptsValidacionFormulario.js"></script>
    <link rel="stylesheet" href="CSS/Style.css">
     <!-- link css de Bootsrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link iconos de Bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- link css -->
    <link rel="stylesheet" href="../Assets/estilos.css">
    <!--links Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    
</head>    
    
<body>

<?php 
    include 'Includes/header.html';
?>
  
  <section id="altaUsuario">
        
        <h2 class="tituloSeccion">Alta de Usuarios</h2>

            <form action="" id="formularioAltaUsuario">

                <input type="text" id="nombre" name="Nombre" placeholder="Nombre y Apellidos" required>
                <input type="email" id="email" name="email" placeholder="email" required>
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono Ej: +34 600 123 456" required>
                <input type="password" id="password" name="password" placeholder="password" required>
                <input type="password" id="confirmarClave" name="confirmarClave" placeholder="confirmarClave" required="">                
                <input id="botonEnviar" type="submit" name="submit" placeholder="Enviar">

            </form>

        </div>

    </section>

    <?php 
    
    include 'Includes/footer.html';
    
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>