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
                        <a class="nav-link" aria-current="page" href="index.php?pid=CrearEquipo">Crear Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pid=EliminarUser"><i class="bi bi-trash3"></i>Eliminar Usuario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        <?php
                            echo $admin->getNombre();
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

            </div>
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
            </div>
            </div>
        </div>
    </nav>

    <?php 
    } }
    ?>
</header>
