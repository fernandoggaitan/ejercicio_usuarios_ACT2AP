<?php

session_start();

require_once('./consultas/conexion.php');
require_once('./consultas/consultas_usuarios.php');
$error = null;

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    
    $email = $_POST['email'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;

    $usuario = login($conexion, $email, $contrasena);

    if( $usuario ){
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    }else{
        $error = 'Los datos son incorrectos';
    }

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

    <div class="container">

        <h1> Iniciar sesión </h1>

        <?php if($error): ?>
            <div class="alert alert-danger"> <?php echo $error ?> </div>
        <?php endif ?>

        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="contrasena" class="col-sm-2 col-form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena">
            </div>
            <button type="submit" class="btn btn-primary"> Enviar </button>
            <a href="registro.php" class="text text-primary"> Quiero postularme </a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>