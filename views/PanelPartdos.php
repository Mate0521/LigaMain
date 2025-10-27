<?php

$id_campeonato = base64_decode($_GET["id_cam"]);    
$partido = new Partido();
$equipo = new Equipo();
$fase = new Fase();
$fecha = new Fecha("", $id_campeonato);
$campeonato = new Campeonato($id_campeonato, $_SESSION["id"]);
$campeonato->obtenerCampeonatoId();


// Obtener las fechas del campeonato
$fechas = $fecha->listarFechas();

// Obtener los partidos asociados a esas fechas
$partidos = $partido->obtenerPartidos($fechas);

//caso en el que no se hayan iniciado los partidos 
if (!isset($partidos) || empty($partidos)) {
    $equipos = $campeonato->listarEquipos();
    $tipo = $campeonato->getIdTipo();
    $partido->crearDistribucion($equipos, $tipo, $fechas);
    $partidos = $partido->obtenerPartidos($fechas);
}
?>

<div>
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Equipo Local</th>
                <th scope="col">Goles Local</th>
                <th scope="col">Equipo Visitante</th>
                <th scope="col">Goles Visitante</th>
                <th scope="col">Fase</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $partidoOb): ?>

                <tr>
                    <th scope="row"><?= $partidoOb->getIdFecha()->getFecha() ?></th>
                    <td><?= $partidoOb->getIdEqLocal()->getNombre() ?></td>
                    <td><?= $partidoOb->getGolesLocal() ?></td>
                    <td><?= $partidoOb->getIdEqVisit()->getNombre() ?></td>
                    <td><?= $partidoOb->getGolesVisit() ?></td>
                    <td><?= $partidoOb->getIdFase()->getNombre() ?></td>
                    <td>
                        <a href="?pid=<?php echo base64_encode("EdicionPartido")?>&idPartido=<?php echo base64_encode($partidoOb->getIdPartido())?>" class="btn btn-success">Jugar Partido</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    
</div>
