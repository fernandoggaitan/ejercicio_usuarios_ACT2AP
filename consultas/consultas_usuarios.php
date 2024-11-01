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

function getUsuarioByEmail(PDO $conexion, $email)
{

    $consulta = $conexion->prepare('
        SELECT id, nombre, rol
        FROM usuarios
        WHERE email = :email
    ');

    $consulta->bindValue(':email', $email);

    $consulta->execute();

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    return $usuario;

}

function addUsuario(PDO $conexion, array $data)
{

    $consulta = $conexion->prepare('
        INSERT INTO usuarios(nombre, email, contrasena, cv, rol)
        VALUES(:nombre, :email, :contrasena, :cv, "Postulante")
    ');

    $consulta->bindValue(':nombre', $data['nombre']);
    $consulta->bindValue(':email', $data['email']);
    $consulta->bindValue(':contrasena', $data['contrasena']);
    $consulta->bindValue(':cv', $data['cv']);

    $consulta->execute();

}