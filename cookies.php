<?php

$nombre = $_COOKIE['nombre'] ?? null;

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    //Llegan los datos del formulario.
    $nombre = $_POST['nombre'] ?? null;

    //Tiempo de duración de la cookie.
    $duracion = time() + 3600;

    //Seteamos la cookie.
    setcookie('nombre', $nombre, $duracion, '/');

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cookies </title>
</head>
<body>
    <form action="cookies.php" method="post">
        <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombre ?>" />
        <button type="submit"> Enviar </button>
        <?php echo $nombre ?>
    </form>
</body>
</html>