<?php

session_start();

$usuario = $_SESSION['usuario'] ?? null;

if(!$usuario || $usuario['rol'] == 'Postulante')
{
    header('Location: login.php');
}

require_once ('./consultas/conexion.php');
require_once('./consultas/consultas_usuarios.php');
require_once('./funciones/funciones_paginador.php');

$rol = $_GET['rol'] ?? null;
$pagina_actual = $_GET['pag'] ?? 1;
$cuantos_por_pagina = 10;

$usuarios = getUsuarios($conexion, $rol);
$cantidad = count($usuarios);

$usuarios = paginador_lista($usuarios, $pagina_actual, $cuantos_por_pagina);
$enlaces = paginador_enlaces($cantidad, $pagina_actual, $cuantos_por_pagina);

?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Lista de usuarios </title>
</head>

<body>

    <?php require('layout/_nav.php') ?>

    <div class="container">

        <h1> Lista de usuarios </h1>

        <form action="usuarios.php" method="get" class="mb-3">
            <div class="mb-3">
                <label for="rol" class="form-label"> Filtrar por rol </label>
                <select name="rol" id="rol" class="form-control">
                    <option value=""></option>
                    <option value="Administrador"> Administrador </option>
                    <option value="Empleado"> Empleado </option>
                    <option value="Postulante"> Postulante </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"> Filtrar </button>
            <a href="usuarios.php"> Limpiar </a>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th> Nombre </th>
                    <th> Email </th>
                    <th> Rol </th>
                    <th> Acciones </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $item): ?>
                    <tr>
                        <td> <?php echo $item['nombre'] ?> </td>
                        <td> <?php echo $item['email'] ?> </td>
                        <td> <?php echo $item['rol'] ?> </td>
                        <td>
                            <?php if($usuario['rol'] == 'Administrador'): ?>
                                <a href="" class="btn btn-primary"> Gestionar rol </a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($enlaces['anterior']): ?>
                    <li class="page-item"><a class="page-link" href="usuarios.php?pag=<?php echo $enlaces['anterior'] ?>"> Anterior </a></li>
                <?php endif ?>
                <li class="page-item"><a class="page-link" href="#"> Página actual: <?php echo $enlaces['actual'] ?> </a></li>
                <?php if($enlaces['siguiente']): ?>
                    <li class="page-item"><a class="page-link" href="usuarios.php?pag=<?php echo $enlaces['siguiente'] ?>"> Siguiente </a></li>
                <?php endif ?>
            </ul>
        </nav>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>