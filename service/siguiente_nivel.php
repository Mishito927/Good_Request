<?php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        include_once "../dao_imp/level_req_dao_imp.php";

        if(!empty($id)){

            echo $id;
            $lrImp = new levelReqDaoImp();
            $lrImp->siguienteNivel($id);

            //header("Location: ../vista/level_request.php");
            //exit;
        }
        else{
            echo "Está vacio ono";
        }
    }
?>