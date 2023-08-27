<?php
    interface levelReqDao{
        public function enviarNivel();
        public function siguienteNivel($id);
        public function activarLevelReq();
        public function desactivarLevelReq();
        public function cargarCuentas();
        public function mostrarNivel();
        public function estadoLR($usu);
    }
?>