<?php
    include_once "../dao_imp/level_req_dao_imp.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lrImp = new levelReqDaoImp();
        $lrImp->enviarNivel();
    }
?>