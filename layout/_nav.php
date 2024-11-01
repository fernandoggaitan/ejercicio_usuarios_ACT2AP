<?php

$usuario = $_SESSION['usuario'] ?? null;

?>

<!-- Nav -->
<nav class="navbar navbar-dark bg-dark fixed-top mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
            <img class="logo" src="img/logo-davinci-blanco.png" alt="" style="width: 150px;" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-dark text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    Dark offcanvas
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <?php if($usuario && $usuario['rol'] != 'Postulante'): ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="usuarios.php">Usuarios</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div style="margin-bottom: 80px;"></div>