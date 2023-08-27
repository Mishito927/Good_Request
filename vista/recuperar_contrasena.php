<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        include "../include/head.php"
    ?>
    <title>Login</title>
</head>
<body class="bg-dark">
    <div class="container py-5 d-flex justify-content-center align-items-center">
        <form action=".../service/recuperar_contrasena_service.php" method="POST">
            <h1 class="display-6 text-white">CAMBIAR CONTRASEÑA</h1><br>
            <label class="text-white" for="email">Correo Electronico</label><br>
            <input class="form-control bg-dark text-white" type="email" name="email" id="email" placeholder=""><br>
            <label class="text-white" for="contrasena1">Contraseña</label><br>
            <input class="form-control bg-dark text-white" type="password" name="contrasena1" id="contrasena1"><br>
            <label class="text-white" for="contrasena2">Confirmar contraseña</label><br>
            <input class="form-control bg-dark text-white" type="password" name="contrasena2" id="contrasena2"><br>

            <input class="btn btn-primary text-white" type="submit" value="Cambiar Contraseña"><br><br>
            <p class="text-white">¿Ya recordaste tu contraseña?, <a href="./login.php">Inicia Sesión</a></p>
            <p class="text-white">¿No tienes una cuenta?, <a href="./register.php">Registrate</a></p>
            
        </form>
    </div>
    
</body>
</html>