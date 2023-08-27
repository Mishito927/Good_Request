<?php
    class CuentaSeguida{
        private $idCntSgd;
        private $cuenta;
        private $cuenta_seguida;

        public function setIdCntSgd($idCntSgd) {
            $this->idCntSgd = $idCntSgd;
        }
    
        public function getIdCntSgd() {
            return $this->idCntSgd;
        }
    
        public function setCuenta($cuenta) {
            $this->cuenta = $cuenta;
        }
    
        public function getCuenta() {
            return $this->cuenta;
        }
    
        public function setCuentaSeguida($cuenta_seguida) {
            $this->cuenta_seguida = $cuenta_seguida;
        }
    
        public function getCuentaSeguida() {
            return $this->cuenta_seguida;
        }
    }
?>