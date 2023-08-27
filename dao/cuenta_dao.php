<?php
    include_once "../modelo/cuenta.php";

    $Cuenta = new Cuenta();
    interface cuentaDao{
        public function iniciarSesion();
        public function cambiarContrasena();
        public function registrar();
        public function crearPerfil();
        public function verficiarDisponibilidadUsuario($usu);
        public function verficiarDisponibilidadEmail($ema);
        public function cerrarSesion();
    }
?>