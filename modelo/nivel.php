<?php
    class Nivel{
        private $idNvl;
        private $cuentaReceptor;
        private $id;
        private $nong;
        private $cancion;
        private $mensaje;
        private $usuario;

        public function setIdNvl($idNvl) {
            $this->idNvl = $idNvl;
        }
    
        public function getIdNvl() {
            return $this->idNvl;
        }
    
        public function setCuentaReceptor($cuentaReceptor) {
            $this->cuentaReceptor = $cuentaReceptor;
        }
    
        public function getCuentaReceptor() {
            return $this->cuentaReceptor;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setNong($nong) {
            $this->nong = $nong;
        }
    
        public function getNong() {
            return $this->nong;
        }
    
        public function setCancion($cancion) {
            $this->cancion = $cancion;
        }
    
        public function getCancion() {
            return $this->cancion;
        }
    
        public function setMensaje($mensaje) {
            $this->mensaje = $mensaje;
        }
    
        public function getMensaje() {
            return $this->mensaje;
        }

        public function setUsuario($nuevoUsuario) {
            $this->usuario = $nuevoUsuario;
        }
    
        public function getUsuario() {
            return $this->usuario;
        }
    }
?>