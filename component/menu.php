<?php
if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "U"){ 
        $cliente =new Usuario($_SESSION["id"]);
        $cliente -> obtenerUsuario();
    } elseif($_SESSION["role"] == "A"){
        $admin =new Admin($_SESSION["id"]);
        $admin -> obtenerAdmin();
    }else{
        $_SESSION["pid"]="Error";
        header('Location: index.php');
        exit();
    }
}

?>

<header class="text-center p-3 sticky-top mb-4">

    <?php 
    if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "A"){
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.png" alt="Logo" width="70" height="70" class="me-2 object-fit-contain">
            Liga Main
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gestion de Usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gestion de Equipos</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            echo $admin->getNombre();
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Datos Personales</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <form action="index.php" method="post">
                                <button type="submit" class="btn btn-danger" name="cerrarSecion">Cerrar secion</button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            </div>
        </div>
    </nav>

    <?php }elseif($_SESSION["role"] == "U"){?>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Liga Main</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Liga Main</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?pid=Home">Mis Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pid=CrearCamp"><i class="bi bi-database-add"></i>Crear Campeonato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pid=EliminarCamp"><i class="bi bi-trash3"></i>Eliminar Campeonato</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        <?php
                            echo $cliente->getNombre();
                        ?>
                        </a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="index.php?pid=PanelDatos">Datos Personales</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="index.php" method="post">
                                    <button type="submit" class="btn btn-danger" name="cerrarSecion">Cerrar secion</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </div>
        </div>
    </nav>

    <?php 
    } }else{ 
        
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.png" alt="Logo" width="40" height="40" class="me-2">
            Cocina Etilica
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                <li class="nav-item">
                    <form action="index.php" method="post">
                        <button type="submit" class="btn btn-outline-primary" name="iniciarSecion"><i class="fa-solid fa-user me-1"></i>Iniciar Sesión</button>
                    </form>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <?php } ?>

</header>

