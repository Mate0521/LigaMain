<?php
$partido = new Partido();
$equipo = new Equipo();
$fase = new Fase();
$fecha = new Fecha("", $_GET["id_cam"]);
$campeonato = new Campeonato($_GET["id_cam"], $_SESSION["id"]);
$campeonato->obtenerCampeonatoId();

// Obtener las fechas del campeonato
$fechas = $fecha->listarFechas();
var_dump($fechas);

// Obtener los partidos asociados a esas fechas
$partidos = $partido->obtenerPartidos($fechas);
var_dump($partidos);

//caso en el que no se hayan iniciado los partidos 
if (!isset($partidos) || empty($partidos)) {
    $equipos = $campeonato->listarEquipos();
    var_dump($equipos);
    $tipo = $campeonato->getIdTipo();
    var_dump($tipo);
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

                <?php
                // Obtener datos relacionados del partido
                $fechaObj = new Fecha($partidoOb->getIdFecha());
                $fechaObj->obtenerFecha(); // suponiendo que llena el objeto

                $local = new Equipo($partidoOb->getIdEqLocal());
                $local->obtenerEquipo();

                $visitante = new Equipo($partidoOb->getIdEqVisit());
                $visitante->obtenerEquipo();

                $faseObj = new Fase($partidoOb->getIdFase());
                $faseObj->obtenerFase();
                ?>

                <tr>
                    <th scope="row"><?= htmlspecialchars($fechaObj->getFecha()) ?></th>
                    <td><?= htmlspecialchars($local->getNombre()) ?></td>
                    <td><?= htmlspecialchars($partidoOb->getGolesLocal()) ?></td>
                    <td><?= htmlspecialchars($visitante->getNombre()) ?></td>
                    <td><?= htmlspecialchars($partidoOb->getGolesVisit()) ?></td>
                    <td><?= htmlspecialchars($faseObj->getNombre()) ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
