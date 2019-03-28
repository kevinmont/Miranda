<?php
session_start();
?>

<!DOCTYPE <!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <title> Miranda | Elegancia Para Tu Hogar. </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/all.css">
</head>

<body>

    <!-- Proyecto Basado en el Framework Boostrap - Miranda 2019-->
    <nav class="navbar navbar-expand-xl navbar-light fixed-top bg-light p-1">
        <a class="navbar-brand" href="index.php">
            <img src="resources/img/Logo.png" width="auto" height="6%" alt="">
        </a>

        <!--Menú de Hamburguesa-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Inicio de barra de navegación -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tiendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Carrito</i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catálagos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            if(isset($_SESSION['user'])) echo "Usuario"; else echo "Acceder";
                        ?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="<?php    
                            if(isset($_SESSION['user'])) echo 'controllers/logout.php'; else echo 'sign-in.php'; ?>">
                            <?php 
                                if(isset($_SESSION['user'])) echo 'Cerrar sesión'; else echo 'Ingresar';
                            ?>
                        </a>
                        <a class="dropdown-item" href="<?php 
                            if(isset($_SESSION['user'])) echo "panel.php"; else "sign-up.php";
                        ?>
                        ">
                            <?php 
                            if(isset($_SESSION['user'])) echo "Configuración"; else echo "Registrarse";
                        ?>
                        </a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar en Miranda" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
    <!-- Fin de Barra de Navegación-->