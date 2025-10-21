<?php
if($_SESSION["role"]!="U"){
    header('Location: index.php?pid=Error');
}
$campeonato = new Campeonato("",$_SESSION["id"]);
$campeonatos = $campeonato->listarCampeonatos();



?>
<div>
<div class="container py-5">
    <div class="row align-items-center min-vh-100">

        <div class="col-md-12 col-xl-6 text-light d-flex flex-column justify-content-center align-items-center text-center">
            <h1 class="fw-bold mb-3">Bienvenido a Liga Main</h1>
            <p class="lead">Tu plataforma para gestionar ligas deportivas de manera eficiente y sencilla.</p>
        </div>

        <div class="col-md-12 col-xl-6 mt-4 mt-xl-0">
            <div class="overflow-auto">
                <?php foreach ($campeonatos as $campeonato): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <?php echo htmlspecialchars($campeonato->getNombre()); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo htmlspecialchars($campeonato->getIdTipo()->getNombre()); ?>
                            </h5>
                            <div class="text-center mt-3">
                                <a href="index.php?pid=PanelCam&id_cam=<?php echo $campeonato->getIdCampeonato(); ?>" class="btn btn-success me-2">
                                    <i class="bi bi-pencil-square"></i> Jugar Partidos
                                </a>
                                <a href="index.php?pid=TablaPos&id_cam=<?php echo $campeonato->getIdCampeonato(); ?>" class="btn btn-primary">
                                    <i class="bi bi-table"></i> Ver Tabla de Posiciones
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
