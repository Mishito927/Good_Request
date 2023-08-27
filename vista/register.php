<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        include "../include/head.php"
    ?>
    <title>Registrate</title>
</head>
<body class="bg-dark">
    <div class="container py-5 d-flex justify-content-center align-items-center">
        <form action="../service/register_service.php" method="POST">
            <h1 class="display-6 text-white">REGISTRATE</h1><br>
            <label class="text-white" for="usuario">Nombre de usuario</label><br>
            <input class="form-control bg-dark text-white" type="text" name="usuario" id="usuario" placeholder="ejm: minabo359"><br>
            <label class="text-white" for="contrasena1">Contraseña</label><br>
            <input class="form-control bg-dark text-white" type="password" name="contrasena1" id="contrasena1"><br>
            <label class="text-white" for="contrasena2">Confirmar contraseña</label><br>
            <input class="form-control bg-dark text-white" type="password" name="contrasena2" id="contrasena2"><br>
            <label class="text-white" for="email">Correo Electronico</label><br>
            <input class="form-control bg-dark text-white" type="email" name="email" id="email" placeholder="ejm: asereje@jadeje.com"><br>

            <input class="btn btn-primary text-white" type="submit" value="Registrarte"><br><br>
            <p class="text-white">Si ya posees una cuenta, <a class="font-weight-bold" href="./login.php">Inicia Sesión</a></p>
            
        </form>
    </div>
    
    
</body>
</html>