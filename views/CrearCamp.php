<?php
// ...existing code...
$var = null;
$valTipo=null;
$nombreValido = null;
$equiposValidos = null;
$fechaVal = null;
$mensajeGeneral = null;

$equipos = [];
$equiposSeleccionados = [];
$fechas = [];
$tipoSeleccionado = null;


$campeonato = new Campeonato("", $_SESSION["id"]);

$equiposOb = new Equipo();
$equipos = $equiposOb->listarEquipos();
$idsDisponibles = array_map(fn($e) => (int)$e->getIdEquipo(), $equipos);

$tipo =new Tipo();
$tipos=$tipo->obtenerTipos();


// Procesar envío único
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crearCampeonato'])) {

    // 1) Nombre
    $nombre = trim($_POST['nombre'] ?? '');
    $campeonato->setNombre($nombre);
    $nombreValido = $campeonato->validarNombre();
    
    // 2) tipo
    $tipoSeleccionado = $_POST['tipo_campeonato'] ?? '';
    $campeonato->setIdTipo($tipoSeleccionado);
    $valTipo = $campeonato->getIdTipo()!= null? true : false;

    // 3) Equipos seleccionados
     $equiposSeleccionados = (array)($_POST['equipos'] ?? []);

    // regla dependiendo del campeonato
    //contando de que son partidos con juornada de ida y vuelta
    if(((count($equiposSeleccionados)==16 || count($equiposSeleccionados)==8 || count($equiposSeleccionados)==4) && $tipoSeleccionado==2) //caso de eliminatoria
        || (count($equiposSeleccionados) == 32 && $tipoSeleccionado==3) //caso de mixto
        || (count($equiposSeleccionados)>= 3 && $tipoSeleccionado==1))//caso de liga 
    {
        $equiposValidos=true;
        
    }else{
        $equiposValidos=false;
    }
    $jornadas = count($equiposSeleccionados)%2==0?count($equiposSeleccionados)-1:count($equiposSeleccionados);
    

    // 4) Fechas
    $fechas = (array)($_POST['fechas'] ?? []);
    $fechaVal=count($fechas)==$jornadas?true:false;

    // Si todo válido -> crear campeonato y relaciones
    if ($nombreValido && $equiposValidos && $fechaVal) {
        $var = $campeonato->crearCampeonato();
        if ($var) {
            // asociar equipos (ajusta al método real de tu modelo)
            foreach ($equiposSeleccionados as $idEquipo) {
                $campeonato->relaionarEquipos($idEquipo);
            }

            // guardar fechas si del campeonato
            foreach ($fechas as $f) {
                $fecha = new Fecha("",$campeonato->getIdCampeonato(), $f);
                $fecha->crearFecha();
            }

            $mensajeGeneral = "Campeonato creado correctamente.";

        } else {
            $mensajeGeneral = "Error al crear el campeonato en la base de datos.";
        }
    } else {
        $mensajeGeneral = "Corrija los errores en las secciones indicadas.";
    }
}
 
?>


<div class="container mt-4">
    <div class="row justify-content-center">
        <form action="index.php?pid=CrearCamp" method="post" name="formCreacion" class="needs-validation p-4" novalidate>
            <div>
                <h2>Crear Campeonato</h2>
                <?php if ($mensajeGeneral): ?>
                    <div class="alert <?php echo ($mensajeGeneral === 'Campeonato creado correctamente.') ? 'alert-success' : 'alert-warning'; ?> mt-2" role="alert">
                        <?php echo htmlspecialchars($mensajeGeneral); ?>
                    </div>
                    <?php if ($mensajeGeneral === 'Campeonato creado correctamente.'): ?>
                        <script>
                            setTimeout(function() {
                                window.location.href = 'index.php?pid=Home';
                            }, 3000);
                        </script>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- CARD: Nombre -->
            <div class="card mt-4 mb-3">
                <div class="card-header">
                    <strong>Nombre del Campeonato</strong>
                    <?php if ($nombreValido === true): ?>
                        <div class="alert alert-success mb-0 mt-2">Nombre disponible.</div>
                    <?php elseif ($nombreValido === false): ?>
                        <div class="alert alert-danger mb-0 mt-2">El nombre ya existe o es inválido.</div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control <?php if ($nombreValido === true) echo 'is-valid'; elseif ($nombreValido === false) echo 'is-invalid'; ?>"
                        value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>"
                        required
                    >
                </div>
            </div>
            <!-- CARD: Tipo de juego -->
             <div class="card mb-3">
                <div class="card-header">
                    <strong><label for="disabledSelect" class="form-label">Tipo de Torneo</label></strong>
                    <?php if ($valTipo === true): ?>
                        <div class="alert alert-success mb-0 mt-2">Tipo de torneo añadido.</div>
                    <?php elseif ($valTipo === false): ?>
                        <div class="alert alert-danger mb-0 mt-2">Tipo de torneo inválido.</div>
                    <?php endif; ?>
                    
                    <select name="tipo_campeonato" class="form-select mt-2" required>
                        <option value="" disabled selected>Seleccione el tipo de campeonato</option>
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?php echo htmlspecialchars($tipo->getIdTipo()); ?>" <?php if (($_POST['tipo_campeonato'] ?? '') == $tipo->getIdTipo()) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($tipo->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
             </div>

            <!-- CARD: Equipos -->
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Equipos</strong>
                    <?php if ($equiposValidos == true): ?>
                        <div class="alert alert-success mb-0 mt-2">Equipos seleccionados correctos (<?php echo count($equiposSeleccionados); ?>)</div>
                    <?php elseif ($equiposValidos == false && $tipoSeleccionado == 1): //liga ?>
                        <div class="alert alert-danger mb-0 mt-2">Seleccione por lo menos 3 equipos </div>
                    <?php elseif ($equiposValidos == false && $tipoSeleccionado == 2): //eliminatoria?>
                        <div class="alert alert-danger mb-0 mt-2">Seleccione por lo menos 4 equipos o una canctidad que sea potencia de 2 (4, 8, 16) </div>
                    <?php elseif ($equiposValidos == false && $tipoSeleccionado == 3): //mixto?>
                        <div class="alert alert-danger mb-0 mt-2">Seleccione por 32 equipos</div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h5 class="mb-3">Seleccione los equipos</h5>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        <?php foreach ($equipos as $equipo): ?>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-auto p-2 text-center" style="width:96px;">
                                            <img src="<?php echo htmlspecialchars($equipo->getImg()); ?>" alt="" class="img-fluid" onerror="this.src='img/escudos/default.png'">
                                        </div>
                                        <div class="col">
                                            <div class="card-body py-2">
                                                <h6 class="card-title mb-1"><?php echo htmlspecialchars($equipo->getNombre()); ?></h6>
                                                <p class="card-text small text-muted mb-2">Liga: <?php echo htmlspecialchars($equipo->getIdLiga()); ?></p>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="equipos[]" id="equipo_<?php echo $equipo->getIdEquipo(); ?>" value="<?php echo $equipo->getIdEquipo(); ?>"
                                                        <?php if (in_array((int)$equipo->getIdEquipo(), array_map('intval', $equiposSeleccionados ?? []))) echo 'checked'; ?>>
                                                    <label class="form-check-label" for="equipo_<?php echo $equipo->getIdEquipo(); ?>">Seleccionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- CARD: Fechas -->
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Fechas</strong>
                    <?php if ($fechaVal === true): ?>
                        <div class="alert alert-success mb-0 mt-2">Fechas válidas.</div>
                    <?php elseif ($fechaVal === false): ?>
                        <div class="alert alert-danger mb-0 mt-2">Ingrese las fechas en las que se jugara deben de ser <?php echo $jornadas ?></div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div id="fechas-container">
                        <?php
                        $valoresFechas = $_POST['fechas'] ?? [];
                        if (empty($valoresFechas)) {
                            $valoresFechas = [''];
                        }
                        foreach ($valoresFechas as $i => $valorFecha): ?>
                            <div class="mb-3 fecha-item">
                                <label class="form-label">Fecha <?php echo $i + 1; ?></label>
                                <input type="date" name="fechas[]" class="form-control fecha-input" min="<?php echo date('Y-m-d'); ?>" value="<?php echo htmlspecialchars($valorFecha); ?>" required>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-outline-primary" id="agregar-fecha">Agregar otra fecha</button>
                </div>
            </div>

            <!-- Botón único -->
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-success" type="submit" name="crearCampeonato">Crear campeonato</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const agregarBtn = document.getElementById('agregar-fecha');
    const fechasContainer = document.getElementById('fechas-container');

    if (!agregarBtn || !fechasContainer) return;

    agregarBtn.addEventListener('click', function() {
        const inputs = fechasContainer.querySelectorAll('.fecha-input');
        const lastInput = inputs[inputs.length - 1];
        const lastDate = lastInput.value || lastInput.min || new Date().toISOString().slice(0,10);
        const fechaCount = inputs.length + 1;

        const div = document.createElement('div');
        div.className = 'mb-3 fecha-item';
        div.innerHTML = `
            <label class="form-label">Fecha ${fechaCount}</label>
            <input type="date" name="fechas[]" class="form-control fecha-input" min="${lastDate}" required>
        `;
        fechasContainer.appendChild(div);
    });

    // Mantener orden mínimo entre fechas
    fechasContainer.addEventListener('change', function(e) {
        if (e.target.classList.contains('fecha-input')) {
            const inputs = fechasContainer.querySelectorAll('.fecha-input');
            for (let i = 1; i < inputs.length; i++) {
                inputs[i].min = inputs[i-1].value || inputs[i-1].min;
            }
        }
    });
});
</script>
