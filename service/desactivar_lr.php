<?php
    if (isset($_GET['est'])) {
        $est = $_GET['est'];

        include_once "../dao_imp/level_req_dao_imp.php";
        $lrImp = new levelReqDaoImp();

        echo $est;
        $lrImp->desactivarLevelReq();

    }
?>