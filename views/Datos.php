<?php

include_once 'modelo/Usuario.php';
include_once 'modelo/Admin.php';
include_once 'config/conexion.php'; 

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == "U") {
        $persona = new Usuario($_SESSION["id"]);
        $persona->obtenerUsuario();
    } elseif ($_SESSION["role"] == "A") {
        $persona = new Admin($_SESSION["id"]);
        $persona->obtenerAdmin();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-dark text-light text-center rounded-top-4">
                    <h3>Datos Personales</h3>
                </div>
                <div class="card-body bg-light">
                    <div class="mb-3 text-center">
                        <i class="bi bi-person-circle text-primary" style="font-size: 4rem;"></i>
                    </div>

                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">
                            <strong>Nombre:</strong> <?= htmlspecialchars($persona->getNombre()) ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Correo:</strong> <?= htmlspecialchars($persona->getCorreo()) ?>
                        </li>
                        <?php if ($_SESSION["role"] == "U"): ?>
                          
                        <?php endif; ?>
                    </ul>

                    <div class="text-center">
                        <a href="index.php?pid=Home" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
