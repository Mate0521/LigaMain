<?php
$campeonato = new Campeonato("", $_SESSION["id"]);

// Si se presiona el botón de eliminar
if (isset($_GET['eliminar'])) {
    $id_campeonato = base64_decode($_GET['eliminar']);
    $id_campeonato = limpiarEntrada($id_campeonato ?? 0);
    $campeonatoEliminar = new Campeonato($id_campeonato, $_SESSION["id"]);
    $campeonatoEliminar->eliminarCampeonato();

    $pidCod = base64_encode("EliminarCamp");

    echo "<script>alert('Campeonato eliminado correctamente');</script>";
    echo "<script>window.location.href='index.php?pid={$pidCod}';</script>";
    exit;
}

// Listar todos los campeonatos
$campeonatos = $campeonato->listarCampeonatos();
?>

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Eliminar Campeonato</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($campeonatos)) { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo de Torneo</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($campeonatos as $cam) { ?>
                                <tr>
                                    <td><?php echo $cam->getIdCampeonato(); ?></td>
                                    <td><?php echo htmlspecialchars($cam->getNombre()); ?></td>
                                    <td><?php echo htmlspecialchars($cam->getIdTipo()->getNombre()); ?></td>
                                    <td>
                                        <a href="?pid=<?php echo base64_encode("EliminarCamp")?>&eliminar=<?php echo base64_encode($cam->getIdCampeonato())?>"
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('¿Estás seguro de eliminar este campeonato? Esta acción no se puede deshacer.');">
                                           <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning text-center mb-0" role="alert">
                    No hay campeonatos registrados.
                </div>
            <?php } ?>
        </div>
    </div>
</div>
