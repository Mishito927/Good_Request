<?php
    class Cuenta{
        private $idCnt;
        private $usuario;
        private $contrasena;
        private $email;

        public function setIdCnt($idCnt) {
            $this->idCnt = $idCnt;
        }
    
        public function getIdCnt() {
            return $this->idCnt;
        }
    
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
    
        public function getUsuario() {
            return $this->usuario;
        }
    
        public function setContrasena($contrasena) {
            $this->contrasena = $contrasena;
        }
    
        public function getContrasena() {
            return $this->contrasena;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function getEmail() {
            return $this->email;
        }
    }
?>