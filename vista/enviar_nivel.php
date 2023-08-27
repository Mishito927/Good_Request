<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        include "../include/head.php"
    ?>
    <title>Envio de niveles</title>
</head>
<body class="bg-dark">
    <div class="container py-5 d-flex justify-content-center align-items-center">
        <form action="../service/enviar_nivel.php" method="POST">
            
            <h1 class="display-1 text-white">           Envia tu nivel        </h1>
            <?php
                include "../dao_imp/level_req_dao_imp.php";
                
                session_start();
                $usuario = $_SESSION['usuGR'];
                $lrImp = new levelReqDaoImp();
                
                $estado = $lrImp->estadoLR($usuario);
                
                if (isset($_GET['elhost'])) {
                    $elhostValue = $_GET['elhost'];
                    echo "<input type='hidden' name='receptor' id='receptor' value='".$elhostValue."'>";

                } else {
                    echo "<h3 class='text-white'>No se proporcionó el valor de elhost en la URL.</h3>";
                }

                if($estado == "activo"){
                    include "../include/lr_activo.php";
                }
                else if($estado == "inactivo"){
                    include "../include/lr_inactivo.php";
                }
            ?>
            
            

            
            
        </form>
        <script>
            const checkboxMp3 = document.getElementById('checkboxMp3');
            const archivoInput = document.getElementById('archivo');

            checkboxMp3.addEventListener('change', function () {
                archivoInput.disabled = !checkboxMp3.checked;
            });
        </script>
    </div>
    
</body>
</html>