<?php
    include_once "../dao_imp/cuenta_dao_imp.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cntImp = new cuentaDaoImp;
        $cntImp->registrar();
        $cntImp->crearPerfil();

        header("Location: ../vista/login.php");
        exit;
    }
?>