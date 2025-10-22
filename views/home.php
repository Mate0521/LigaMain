<?php
if($_SESSION["role"]!="U"){
    header(base64_encode('Location: index.php?pid=Error'));
}
$campeonato = new Campeonato("",$_SESSION["id"]);
$campeonatos = $campeonato->listarCampeonatos();


?>

<div class="container-fluid py-5" style="background: linear-gradient(135deg, #0d6efd 0%, #0b132b 100%); min-height: 100vh;">
    
    <div class="row align-items-center justify-content-center text-light text-center">
        <div class="col-md-12 col-xl-5 mb-5 mb-xl-0">
            <h1 class="fw-bold display-5"> Bienvenido a <span class="text-warning">Liga Main</span></h1>
            <p class="lead mt-3 mb-4">
                Administra tus <strong>ligas, campeonatos y partidos</strong> con facilidad.  
                Organiza, visualiza y compite desde un solo lugar.
            </p>
            <hr class="border-light w-50 mx-auto">
        </div>

        <div class="col-md-12 col-xl-6">
            <div class="overflow-auto px-2" style="max-height: 75vh;">
                <?php foreach ($campeonatos as $campeonato): ?>
                    <div class="card mb-4 border-0 shadow-lg rounded-4 animate__animated animate__fadeInUp">
                        <div class="card-header bg-dark text-white fw-bold">
                            <?php echo htmlspecialchars($campeonato->getNombre()); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-semibold mb-3">
                                <?php echo htmlspecialchars($campeonato->getIdTipo()->getNombre()); ?>
                            </h5>
                            <div class="text-center mt-3">
                                <a href="?pid=<?php echo base64_encode("PanelCam")?>&id_cam=<?php echo base64_encode($campeonato->getIdCampeonato())?>" class="btn btn-success me-2">
                                    <i class="bi bi-pencil-square"></i> Jugar Partidos
                                </a>
                                <a href="?pid=<?php echo base64_encode("TablaPos")?>&id_cam=<?php echo base64_encode($campeonato->getIdCampeonato())?>" class="btn btn-primary">
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
