<?php
    include_once "../modelo/nivel.php";
    include_once "../modelo/cuenta.php";
    include_once "../dao/inter_dao.php";
    include_once "../conexion/conexion.php";

    class interDaoImp implements interDao{
        public function deReceptoraId($receptor){
            $con = conexion();

            if(!empty($receptor)){
                $sql = "SELECT id_cnt FROM cuenta where usuario = :usuario";

                try{
                    $consulta = $con->prepare($sql);
                    $consulta->bindParam(":usuario", $receptor);
                    $consulta->execute();

                    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
                    
                    if ($resultado) {
                        $usuario = $resultado['id_cnt'];

                        return $usuario;
                    }
                    else{
                        return null;
                    }
                }
                catch (PDOException $e){
                    echo "Error en la consulta: " . $e->getMessage();
                    return null;
                }

            }
        }

        public function traerUsuario(){
            //session_start();
            $usu = $_SESSION['usuGR'];
            return $usu;
            
        }
    }
?>