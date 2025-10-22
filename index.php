<?php
session_name("LIGAMAIN_SESSION");
session_start();


include_once 'modelo/Usuario.php';
include_once 'modelo/admin.php';
include_once 'config/conexion.php';
include_once 'dao/UsuarioDAO.php';
include_once 'dao/adminDAO.php';
include_once 'modelo/Campeonato.php';
include_once 'dao/CampeonatoDAO.php';
include_once 'modelo/Equipo.php';
include_once 'dao/EquipoDAO.php';
include_once 'modelo/Fecha.php';
include_once 'dao/FechaDAO.php';
include_once 'modelo/Tipo.php';
include_once 'dao/TipoDAO.php';
include_once 'modelo/Fase.php';
include_once 'dao/FaseDAO.php';
include_once 'modelo/Partido.php';
include_once 'dao/PartidoDAO.php';
include_once 'modelo/Liga.php';
include_once 'dao/LigaDAO.php';

$pages = [
    "Home" => "views/home.php",
    "Login" => "views/Login.php",
    "Registrarse" => "views/RegistrarU.php",
    "Admin" => "views/PanelAdmin.php",
    "Error" => "views/Error.php",
    "CrearCamp" => "views/CrearCamp.php",
    "EliminarCamp" => "views/EliminarCamp.php",
    "PanelDatos" => "views/Datos.php",
    "PanelCam" => "views/PanelPartdos.php", 
    "TablaPos"=>"views/TablaPos.php",
    "EdicionPartido" => "views/edicionPartido.php",
    "CrearEquipo" => "views/CrearEquipo.php",
    "EliminarUser" => "views/EliminarUsuario.php"
];

// Página por defecto
$page = isset($_GET['pid']) ? base64_decode($_GET['pid']) : 'Login';


// Cerrar sesión
if (isset($_POST["cerrarSecion"])) {
    session_destroy();
    header("Location: index.php?pid=Login");
    exit();
}

// Nuevo cliente
if (isset($_POST["newCliente"])) {
    header("Location: index.php?pid=Registrarse");
    exit();
}

if (isset($_SESSION["id"])  && !empty($_SESSION["id"])) {
    session_destroy();
    $pidCod = base64_encode("Login");
    header("Location:?pid=$pidCod");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LigaMain</title>
     <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-light">


    <div>
        <?php
        if ($page != "Login" && $page != "Registrarse") {
            include('component/menu.php');
        }
        ?>
    </div>


    <div class="container mt-4 text-center">

        <?php

            if (array_key_exists($page, $pages)) {
                include($pages[$page]);
            } else {
                include($pages["Error"]);
            }
        ?>
    </div>

    <div>
        <?php
        if ($page != "Login" && $page != "Registrarse") {
            include('component/footer.php');
        }
        ?>
    </div>

</body>
</html>
