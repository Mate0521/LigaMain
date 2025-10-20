<?php
if($_SESSION["role"]!="U"){
    header('Location: index.php?pid=Error');
}
$campeonato = new Campeonato("",$_SESSION["id"]);
$campeonatos = $campeonato->listarCampeonatos();



?>
<div>
    <div class="container">
        <div class="row mt-5 vh-100 ">
            <div class="col-md-12 col-xl-6 text-light position-relative">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <h1>Bienvenido a Liga Main</h1> 
                    <p>Tu plataforma para gestionar ligas deportivas de manera eficiente y sencilla.</p>
                </div> 
            </div>
            <div class="col ">
                <div class="overflow-auto">
                    <?php foreach ($campeonatos as $campeonato): ?>
                        <a href="index.php?pid=PanelCam&id_cam=<?php echo $campeonato->getIdCampeonato()?>">
                            <div class="card">
                                <div class="card-header">
                                        <?php echo htmlspecialchars($campeonato->getNombre())?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($campeonato->getIdTipo()) //se supone que es nombre del juego ?></h5>

                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>