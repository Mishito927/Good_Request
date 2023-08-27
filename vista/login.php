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
        
        <form action="../service/login_service.php" method="POST">

            <h1 class="display-6 text-white">INICIO DE SESION</h1><br><br>

            <label class="text-white" for="usuario">Nombre de usuario</label><br>
            <input class="form-control bg-dark text-white" type="text" name="usuario" id="usuario"><br>
            
            <label class="text-white " for="contrasena">Contraseña</label><br>
            <input class="form-control bg-dark text-white" type="password" name="contrasena" id="contrasena"><br>

            <input class="font-weight-bold btn btn-success justify-content-center " type="submit" value="Ingresar"><br><br>
            
            <p class="text-white">¿Olvidaste tu contraseña?, <a class="font-weight-bold" href="./recuperar_contrasena.php">Recupera tu contraseña</a></p>
            <p class="text-white">¿No tienes una cuenta?, <a class="font-weight-bold" href="./register.php">Registrate</a></p>
            
        </form>
    </div>
</body>
</html>