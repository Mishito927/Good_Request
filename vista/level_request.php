<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        include "../include/head.php"
    ?>
    <title>Level Request</title>
</head>
<body class="bg-dark">
    <div class="container py-5 d-flex justify-content-center align-items-center">
        <form>
            <?php
                include "../dao_imp/level_req_dao_imp.php";
                
                session_start();
                $usuario = $_SESSION['usuGR'];
                $lrImp = new levelReqDaoImp();
                $datos = $lrImp->mostrarNivel();
                $estado = $lrImp->estadoLR($usuario);

                echo $estado;

                echo "<h1 class='display-6 text-white'>LEVEL REQUEST DE ".strtoupper($usuario)."</h1> <br>";

                if(!empty($datos)){
                    foreach ($datos as $nivel) {
                        $id = $nivel->getIdNvl();
                        
                        echo "<input type='hidden' name='' value='".$nivel->getIdNvl()."'>";
                        echo "<h3 class='text-white'>" . $nivel->getUsuario() . "</h3>";
                        echo "<h1 class='display-1 text-white'>" . $nivel->getId() . "</h1>";
                        echo "<h4 class='text-white'>" . $nivel->getMensaje() . "</h4>";
    
                        $url = "../service/siguiente_nivel.php?id=" . urlencode($id);
                        echo "<a class='btn btn-primary class='text-white'' href='$url'>Siguiente Nivel</a><br><br>";   
                    }
                    
                }
                else{
                    echo "<h1 class='text-white'>No hay niveles :(</h1>";
                    echo "<h3 class='text-white'>Espere a que envien algun nivel</h3><br>";
                    echo "<h6 class='text-white'>Si esto no funciona entonces recargue la pagina</h3><br><br>";
                }

                if($estado == "activo"){
                    echo "<a class='btn btn-danger text-white' href='../service/desactivar_lr.php?est=".$estado."'>Desactivar level Request</a><br><br>";
                }
                else if($estado == "inactivo"){
                    echo "<a class='btn btn-success text-white' href='../service/activar_lr.php?est=".$estado."'>Activar level Request</a><br><br>";
                }

                if(isset($_SESSION['usuGR'])){
                    echo "<label class='text-white' for='link'>Link para enviar niveles:</label>";
                    echo "<p class='text-white'>http://localhost/goodRequest/vista/enviar_nivel.php?elhost=".$usuario."</p>";
                }
                
            ?>

            
            
        </form>
    </div> 
</body>
</html>