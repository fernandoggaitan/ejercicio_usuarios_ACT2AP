<?php

function getUsuarios(PDO $conexion, $rol=null)
{
    $usuarios = [];
    if( $rol ){
        $consulta = $conexion->prepare('SELECT id, nombre, email, rol FROM usuarios WHERE rol = :rol');
        $consulta->bindValue(':rol', $rol);
        $consulta->execute();
        $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $consulta = $conexion->query('SELECT id, nombre, email, rol FROM usuarios');
        $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    return $usuarios;
}