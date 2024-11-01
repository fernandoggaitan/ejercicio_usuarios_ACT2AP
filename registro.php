<?php

require_once('funciones/funciones_input.php');
require_once('consultas/conexion.php');
require_once('consultas/consultas_usuarios.php');

$nombre = test_input($_POST['nombre'] ?? null);
$email = filter_var($_POST['email'] ?? null, FILTER_VALIDATE_EMAIL);
$contrasena = test_input($_POST['contrasena'] ?? null);
$archivo = $_FILES['archivo'] ?? null;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    //Valida el nombre del postulante.
    if( empty($nombre) )
    {
        $errores[] = 'Usted debe ingresar un nombre';
    }

    //Valida el email del postulante.
    if( empty($email) )
    {
        $errores[] = 'Usted debe ingresar un correo electrónico con un formato correcto';
    }

    //Valida que haya ingresado una contraseña.
    if( empty($contrasena) )
    {
        $errores[] = 'Usted debe ingresar una contraseña';
    }

    //Verifica si el usuario ya se registró con ese correo.
    if( getUsuarioByEmail($conexion, $email) )
    {
        $errores[] = 'Usted ya se ha registrado';
    }

    //Verifica si el archivo tiene algún error.
    if( $archivo['error'] > 0 )
    {
        $errores[] = 'Usted debe ingresar su CV';
    }

    //Verifica si el archivo tiene una extensión correcta.
    if( $archivo['error'] == 0 )
    {
        $pathinfo = pathinfo($archivo['name']);
        $extension = $pathinfo['extension'];
        $extensiones_validas = ['pdf', 'docx'];

        if( !in_array( $extension, $extensiones_validas ) )
        {
            $errores[] = 'Usted debe cargar un  CV con formato pdf o docx';
        }

    }

    //Verifica que el formulario esté validado
    if( empty($errores) )
    {

        $time = time();
        $cv = "cvs/{$time}{$archivo['name']}";

        move_uploaded_file( $archivo['tmp_name'], $cv );

        addUsuario($conexion, [
            'nombre' => $nombre,
            'email' => $email,
            'contrasena' => $contrasena,
            'cv' => $cv
        ]);

        header('Location: login.php');

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

    <title>Registro</title>
</head>

<body>

    <div class="container">
        <h1> Registro </h1>

        <ul>
            <?php foreach($errores as $error): ?>
                <li class="text text-danger"> <?php echo $error ?> </li>
            <?php endforeach ?>
        </ul>

        <form action="registro.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label"> Nombre </label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="<?php echo $nombre ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> Email </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo electrónico" value="<?php echo $email ?>">
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label"> Contraseña </label>
                <input type="password" name="contrasena" id="contrasena" class="form-control">
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label"> CV </label>
                <input type="file" name="archivo" id="archivo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Postularse </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>