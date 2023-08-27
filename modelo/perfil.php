<?php
    class Perfil{
        private $idPrf;
        private $cuenta;
        private $fotoPerfil;
        private $levreq_estado;
        private $descripcion;
        private $seguidores;

        public function setIdPrf($idPrf) {
            $this->idPrf = $idPrf;
        }
    
        public function getIdPrf() {
            return $this->idPrf;
        }
    
        public function setCuenta($cuenta) {
            $this->cuenta = $cuenta;
        }
    
        public function getCuenta() {
            return $this->cuenta;
        }
    
        public function setFotoPerfil($fotoPerfil) {
            $this->fotoPerfil = $fotoPerfil;
        }
    
        public function getFotoPerfil() {
            return $this->fotoPerfil;
        }
    
        public function setLevreqEstado($levreq_estado) {
            $this->levreq_estado = $levreq_estado;
        }
    
        public function getLevreqEstado() {
            return $this->levreq_estado;
        }
    
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }
    
        public function setSeguidores($seguidores) {
            $this->seguidores = $seguidores;
        }
    
        public function getSeguidores() {
            return $this->seguidores;
        }
    }
?>