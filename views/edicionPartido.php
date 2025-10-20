<?php
include_once 'config/Conexion.php';
include_once 'modelo/Equipo.php';
include_once 'modelo/Fase.php';
include_once 'modelo/Fecha.php';
include_once 'modelo/Partido.php';
include_once 'dao/PartidoDAO.php';

$partido = new Partido($_GET["idPartido"]);
$partido->consultar(); // obtiene toda la info del partido

if (isset($_POST["actualizar"])) {
    $golesLocal = $_POST["golesLocal"];
    $golesVisit = $_POST["golesVisitante"];

    $partido->setGolesLocal($golesLocal);
    $partido->setGolesVisit($golesVisit);
    $partido->actualizarResultado();

  echo "<script>
    alert('Resultado guardado correctamente');
window.location='index.php?pid=PanelPartdos&id_cam=" . $partido->getIdFecha()->getIdCampeonato()->getIdCampeonato() . "';
</script>";

    exit();
}
?>

<div class="container text-center mt-4">
    <h3>Jugar Partido</h3>
    <form method="POST" class="d-inline-block bg-light text-dark p-4 rounded shadow">
        <input type="hidden" name="id_cam" value="<?php echo $_GET['id_cam']; ?>">

        <div class="mb-3">
            <label class="form-label fw-bold"><?= $partido->getIdEqLocal()->getNombre() ?> (Local)</label>
            <input type="number" class="form-control text-center" name="golesLocal" required min="0" value="<?= $partido->getGolesLocal() ?>">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold"><?= $partido->getIdEqVisit()->getNombre() ?> (Visitante)</label>
            <input type="number" class="form-control text-center" name="golesVisitante" required min="0" value="<?= $partido->getGolesVisit() ?>">
        </div>

        <button type="submit" name="actualizar" class="btn btn-primary mt-2">Guardar Resultado</button>
    </form>
</div>
