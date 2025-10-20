<?php

$campeonatoDAO = new CampeonatoDAO();
$tablaPosiciones = $campeonatoDAO->obtenerTablaPosiciones($_GET["id_cam"]);

?>
<div>
    
</table>

    <h3 class="text-center mt-4"> Tabla de Posiciones</h3>
<table class="table table-striped text-center mt-3">
    <thead class="table-dark">
        <tr>
            <th>Equipo</th>
            <th>Puntos</th>
            <th>Goles a Favor</th>
            <th>Goles en Contra</th>
            <th>Diferencia de Gol</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tablaPosiciones as $fila): ?>
            <tr>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['puntos'] ?></td>
                <td><?= $fila['goles_favor'] ?></td>
                <td><?= $fila['goles_contra'] ?></td>
                <td><?= $fila['diferencia_gol'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>