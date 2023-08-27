<?php
    function conexion(){
        $pdo = new PDO('mysql:host=localhost;dbname=good_request','root','');
        return $pdo;
    }
?>