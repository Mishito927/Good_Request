<?php
    include_once "../modelo/cuenta.php";
    include_once "../modelo/perfil.php";
    include_once "../dao/cuenta_dao.php";
    include_once "../conexion/conexion.php";
    include_once "../dao_imp/inter_dao_imp.php";

    

    class cuentaDaoImp implements cuentaDao{

        public function iniciarSesion(){
            $Cuenta = new Cuenta();
            $con = conexion();

            $Cuenta->setUsuario($_POST['usuario']);
            $Cuenta->setContrasena($_POST['contrasena']);

            if(!empty($Cuenta->getUsuario()) && !empty($Cuenta->getContrasena())){
                $sql = "SELECT usuario, contrasena FROM cuenta WHERE usuario = :usuario AND contrasena = :contrasena";

                $consulta = $con->prepare($sql);
                $consulta->bindParam(':usuario',$Cuenta->getUsuario());
                $consulta->bindParam(':contrasena', $Cuenta->getContrasena());
                $consulta->execute();

                $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

                if($resultado){
                    $usu = $resultado['usuario'];
                    $pas = $resultado['contrasena'];

                    if($usu = $Cuenta->getUsuario() && $pas = $Cuenta->getContrasena()){
                        session_start();
                        $_SESSION['usuGR'] = $Cuenta->getUsuario();
                        $_SESSION['pasGR'] = $Cuenta->getContrasena();
                        header("Location: ../vista/menu.php");
                        exit;
                    }

                }
                else{
                    header("Location: ../vista/login.php");
                    exit;
                }
            }
            else{
                header("Location: ../vista/login.php");
                exit;
            }

            
        }

        public function cerrarSesion(){
            session_start();

            unset($_SESSION['usuGR']);
            unset($_SESSION['pasGR']);

            header("Location: ../vista/login.php");
            exit;
        }

        public function cambiarContrasena(){
            $Cuenta = new Cuenta();
            $con = conexion();

            $cor = $this->corroborarContrasena($_POST['contrasena1'], $_POST['contrasena2']);

            if($cor = true){
                $Cuenta->setEmail($_POST['email']);
                $Cuenta->setContrasena($_POST['contrasena1']);

                $sql = "UPDATE cuenta SET contrasena = :contrasena WHERE email = :email";

                $consulta = $con->prepare($sql);
                $consulta->bindParam(':contrasena', $Cuenta->getContrasena());
                $consulta->bindParam(':email', $Cuenta->getEmail());

                $consulta->execute();

                header("Location: ../vista/login.php");
                exit;
            }
        }

        public function registrar(){
            $Cuenta = new Cuenta();
            $con = conexion();

            $cor = $this->corroborarContrasena($_POST['contrasena1'], $_POST['contrasena2']);


            if($cor = true){
                $Cuenta->setUsuario($_POST['usuario']);
                $Cuenta->setContrasena($_POST['contrasena1']);
                $Cuenta->setEmail($_POST['email']);
                
                $usuario = $Cuenta->getUsuario();
                $contrasena = $Cuenta->getContrasena();
                $email =  $Cuenta->getEmail();

                $sql = "INSERT INTO cuenta(usuario, contrasena, email) VALUES(:usuario, :contrasena, :email)";
                $consulta = $con->prepare($sql);
                $consulta->bindParam(':usuario', $usuario);
                $consulta->bindParam(':contrasena', $contrasena);
                $consulta->bindParam(':email', $email);

                $consulta->execute();
            }
            
        }
        
        public function crearPerfil(){
            $Perfil = new Perfil();
            $con = conexion();
            $Inter = new interDaoImp();

            $Perfil->setCuenta($Inter->deReceptoraId($_POST['usuario']));
            $Perfil->setLevreqEstado("T");

            $cuenta = $Perfil->getCuenta();
            $estado = $Perfil->getLevreqEstado();

            echo $cuenta."<br>";
            echo $estado;

            $sql = "INSERT INTO perfil(cuenta, levreq_estado) VALUES(:cuenta, :lvEstado)";
            $consulta = $con->prepare($sql);
            $consulta->bindParam(":cuenta", $cuenta);
            $consulta->bindParam(":lvEstado", $estado);

            $consulta->execute();
                
        }

        public function verficiarDisponibilidadUsuario($usu){
            
        }

        public function verficiarDisponibilidadEmail($ema){

        }

        private function corroborarContrasena($a, $b){
            if($a = $b){
                return true;
            }
            else if($a != $b){
                return false;
            }
        }
    }
?>