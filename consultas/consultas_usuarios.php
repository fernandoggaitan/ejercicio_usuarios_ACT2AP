<?php

//Fetch all:
/*
    [
        [
            ID => 1,
            nombre => 'Algo'
        ],
        [
            ID => 2,
            nombre => 'Algo 2'
        ]
    ]
*/

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

function login(PDO $conexion, $email, $contrasena)
{

    $consulta = $conexion->prepare('
        SELECT id, nombre, rol
        FROM usuarios
        WHERE email = :email
        AND contrasena = :contrasena
    ');

    $consulta->bindValue(':email', $email);
    $consulta->bindValue(':contrasena', $contrasena);

    $consulta->execute();

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    return $usuario;

}