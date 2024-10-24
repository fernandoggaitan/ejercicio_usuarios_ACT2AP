<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=clase11;charset=utf8', 'root2222', '');
}catch(PDOException $e){
    echo 'Ha surgido un error por favor intente más tarde';
    exit;
}