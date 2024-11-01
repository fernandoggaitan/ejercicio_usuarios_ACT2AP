<?php

session_start();

//Verificar si el usuario está logueado o no.
$usuario = $_SESSION['usuario'] ?? null;

if(!$usuario)
{
    header('Location: login.php');
}

?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Iniciar sesión </title>
</head>

<body>

    <?php require('layout/_nav.php') ?>

    <div class="container">

        <h1> Página de inicio </h1>

        <?php if($usuario['rol'] == 'Postulante'): ?>
            <div class="alert alert-warning"> Estamos analizando tu perfil. Nos pondremos en contacto con vos a la brevedad. </div>
        <?php else: ?>
            <div class="alert alert-success"> Gracias por trabajar con nosotros </div>
        <?php endif ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>