<?php
session_start();

//incluimos las clases
include_once 'modelo/*.php';
include_once 'dao/*.php';

$page = [

    "Home" => "views/home.php",
    "Login" => "views/login.php",
    "Registrarse" => "views/resgistrarse.php",
    "admin" => "views/admin.php",
];

if (!isset($_SESSION["pid"])) {
    $_SESSION["pid"] = "Login";
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LigaMain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <?php
            include('component/menu.php');//menu
        ?>
    </div>
    <div>
        <?php
            include($pages[$_SESSION["pid"]]);//cuerpo de la pagina 
        ?>
    </div>
    <div>
        <?php
            include('component/footer.php');//footer
        ?>
    </div>


</body>
</html>