<?php
    include_once "../modelo/nivel.php";
    include_once "../modelo/cuenta.php";
    include_once "../modelo/perfil.php";
    include_once "../dao/level_req_dao.php";
    include_once "../conexion/conexion.php";
    include_once "../dao_imp/inter_dao_imp.php";

    class levelReqDaoImp implements levelReqDao{
        public function enviarNivel(){
            $Nivel = new Nivel();
            $inter = new interDaoImp();
            $con = conexion();
        
            $Nivel->setCuentaReceptor($_POST['receptor']);
            $Nivel->setId($_POST['nivel']);
            $Nivel->setUsuario($_POST['usuario']);
            $Nivel->setMensaje($_POST['mensaje']);
        
            $sql = "INSERT INTO nivel(id, usuario, mensaje, cuenta_receptor) VALUES(:id, :usuario, :mensaje, :cuenta_receptor)";
        
            try {
                $cuenta_receptor = $inter->deReceptoraId($Nivel->getCuentaReceptor());
                $id = $Nivel->getId();
                $mensaje = $Nivel->getMensaje();
                $usuario = $Nivel->getUsuario();
        
                echo $cuenta_receptor . "<br>";
                echo $id. "<br>";
                echo $mensaje. "<br>";
                echo $usuario. "<br>";

                $consulta = $con->prepare($sql);
                $consulta->bindParam(':cuenta_receptor', $cuenta_receptor); // Usar la variable
                $consulta->bindParam(':id', $id);
                $consulta->bindParam(':mensaje', $mensaje);
                $consulta->bindParam(':usuario', $usuario);
        
                $consulta->execute();
        
                $url = "../vista/enviar_nivel.php?elhost=".$Nivel->getCuentaReceptor();
                header("Location:".$url);
                exit;
            } catch(PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }

        

        public function cargarCuentas(){
            $con = conexion();
            $sql = "SELECT usuario FROM cuenta";

            $consulta = $con->prepare($sql);
            $consulta->execute();

            $usuarios = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);
            return $usuarios;
        }

        public function mostrarNivel(){
            $con = conexion();
            $inter = new interDaoImp();

            //traer la id del host:

            $xusu = $inter->traerUsuario();
            $usuario = $inter->deReceptoraId($xusu);
            
            //owo

            $sql = "SELECT id_nvl, usuario, id, mensaje FROM nivel where cuenta_receptor = :receptor LIMIT 1";

            $consulta = $con->prepare($sql);
            $consulta->bindParam(":receptor", $usuario);
            $consulta->execute();
            $NivelDatos = [];

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datos as $dato){

                $Nivel = new Nivel();

                $Nivel->setIdNvl($dato['id_nvl']);
                $Nivel->setId($dato['id']);
                $Nivel->setUsuario($dato['usuario']);
                $Nivel->setMensaje($dato['mensaje']);
                $NivelDatos[] = $Nivel;
            }

            return $NivelDatos;
        }

        public function siguienteNivel($id){
            $con = conexion();
            $sql = "DELETE FROM nivel WHERE id_nvl = :id_nvl";
            
            try{
                $consulta = $con->prepare($sql);
                $consulta->bindParam(":id_nvl", $id);
    
                $consulta->execute();

                header("Location: ../vista/level_request.php");
                exit;
                
            }
            catch(PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
            }

            
        }

        public function activarLevelReq(){
            $con = conexion();
            $inter = new interDaoImp();
            
            session_start();
            $usu = $_SESSION['usuGR'];
            $cuenta = $inter->deReceptoraId($usu);

            $sql = "UPDATE perfil SET levreq_estado = :estado WHERE cuenta = :cuenta";

            try{
                $consulta = $con->prepare($sql);
                $consulta->bindValue(":estado", "T");
                $consulta->bindParam(":cuenta", $cuenta);
                $consulta->execute();

                header("Location: ../vista/level_request.php");
                exit;
            }
            catch (PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return null;
            }

        }

        public function desactivarLevelReq(){
            $con = conexion();
            $inter = new interDaoImp();
            
            session_start();
            $usu = $_SESSION['usuGR'];
            $cuenta = $inter->deReceptoraId($usu);

            $sql = "UPDATE perfil SET levreq_estado = :estado WHERE cuenta = :cuenta";

            try{
                $consulta = $con->prepare($sql);
                $consulta->bindValue(":estado", "F");
                $consulta->bindParam(":cuenta", $cuenta);
                $consulta->execute();
                header("Location: ../vista/level_request.php");
                exit;
            }
            catch (PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return null;
            }
        }

        public function estadoLR($usu){
            $con = conexion();
            $inter = new interDaoImp();
            
            $usuario = $usu;
            $cuenta = $inter->deReceptoraId($usuario);

            $sql = "SELECT levreq_estado FROM perfil where cuenta = :cuenta";

            try{
                $consulta = $con->prepare($sql);
                $consulta->bindParam(":cuenta", $cuenta);
                $consulta->execute();

                $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
                    
                if ($resultado['levreq_estado'] == "T") {
                    $estado = "activo";
                    return $estado;
                }

                else if($resultado['levreq_estado'] == "F"){
                    $estado = "inactivo";
                    return $estado;
                }
            }
            catch (PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return null;
            }
        }
    }
?>