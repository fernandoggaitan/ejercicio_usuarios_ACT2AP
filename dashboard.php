<?php

session_start();

$usuario = $_SESSION['usuario'] ?? null;

if( $usuario ){
    echo "Bienvenida/o {$usuario['nombre']} tu id es: {$usuario['id']} y tu rol es: {$usuario['rol']}";
}else{
    header('Location: login.php');
}

?>