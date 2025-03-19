<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Don Giovanni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Assets/scriptsValidacionFormulario.js"></script>
    
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
          
<h2 class="tituloSeccion text-center mb-4">Registro</h2>

<form action="" id="formularioAltaUsuario" class="container mt-4 p-4 border rounded bg-light shadow">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre y Apellidos</label>
            <input type="text" id="nombre" name="Nombre" class="form-control" placeholder="Nombre y Apellidos" autocomplete="off" required>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="email" autocomplete="off" required>
        </div>
    </div>
    
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Teléfono Ej: +34 600 123 456" autocomplete="off" required>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" autocomplete="off" required>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="confirmarClave" class="form-label">Confirmar Contraseña</label>
            <input type="password" id="confirmarClave" name="confirmarClave" class="form-control" placeholder="Confirmar contraseña" autocomplete="off" required>
        </div>
    </div>
    
    <button id="botonEnviar" type="submit" class="btn btn-primary w-100">Enviar</button>
</form>

    <?php 
    
    include 'Includes/footer.html';
    
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>