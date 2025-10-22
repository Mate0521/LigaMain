<?php

$partido = new Partido(base64_decode($_GET["idPartido"]));
$partido->consultar(); // obtiene toda la info del partido

if (isset($_POST["actualizar"])) {
    $golesLocal = limpiarEntrada($_POST["golesLocal"] ?? 0);
    $golesVisit = limpiarEntrada($_POST["golesVisitante"] ?? 0);

     //primer condicional que valida que sean numeros enteros y no negativos ni decimales, es cmo un stp--streamcompareiton
    if (!is_numeric($golesLocal) || !is_numeric($golesVisit) || $golesLocal < 0 || $golesVisit < 0) {
        echo "<script>
                alert('Los goles deben ser números positivos.');
                window.history.back();
              </script>";
        exit();
    }

    $golesLocalActual = $partido->getGolesLocal();
    $golesVisitActual = $partido->getGolesVisit();

    // segunda condicional que validar que no disminuya mas de 2 goles, por si se llegase a aunlar solo un gol
    if (($golesLocalActual - $golesLocal) > 2 || ($golesVisitActual - $golesVisit) > 2) {
        echo "<script>
                alert('No puedes reducir los goles en más de 2 respecto al valor actual.');
                window.history.back();
              </script>";
        exit();
    }
//ya aqui hace el seteo y actualiza
    $partido->setGolesLocal((int)$golesLocal);
    $partido->setGolesVisit((int)$golesVisit);
     //primer condicional que valida que sean numeros enteros y no negativos ni decimales, es cmo un stp--streamcompareiton
    if (!is_numeric($golesLocal) || !is_numeric($golesVisit) || $golesLocal < 0 || $golesVisit < 0) {
        echo "<script>
                alert('Los goles deben ser números positivos.');
                window.history.back();
              </script>";
        exit();
    }

    $golesLocalActual = $partido->getGolesLocal();
    $golesVisitActual = $partido->getGolesVisit();

    // segunda condicional que validar que no disminuya mas de 2 goles, por si se llegase a aunlar solo un gol
    if (($golesLocalActual - $golesLocal) > 2 || ($golesVisitActual - $golesVisit) > 2) {
        echo "<script>
                alert('No puedes reducir los goles en más de 2 respecto al valor actual.');
                window.history.back();
              </script>";
        exit();
    }
//ya aqui hace el seteo y actualiza
    $partido->setGolesLocal((int)$golesLocal);
    $partido->setGolesVisit((int)$golesVisit);
    $partido->actualizarResultado();

    $pidCod = base64_encode("PanelCam");
    $idCamCod = base64_encode($partido->getIdFecha()->getIdCampeonato()->getIdCampeonato());

    echo "<script>
            alert('Resultado guardado correctamente');
            window.location.href = '?pid={$pidCod}&id_cam={$idCamCod}';
        </script>";
    exit();
}
?>


<div class="container text-center mt-4">
    <h3>Jugar Partido</h3>
    <form method="POST" class="d-inline-block bg-light text-dark p-4 rounded shadow" action="?pid=<?php echo base64_encode("EdicionPartido")?>&idPartido=<?php echo base64_encode($partido->getIdPartido())?>" name="actualizar">
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
