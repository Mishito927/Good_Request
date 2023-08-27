<?php
    session_start();

    $usu = $_SESSION['usuGR'];
    $pas = $_SESSION['pasGR'];

    if(empty($usu) && empty($pas)){
        header("Location: ./vista/login.php");
        exit;
    }
    else{
        header("Location: ./vista/menu.php");
        exit;
    }
?>