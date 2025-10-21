<?php
// --- Variables de control de validación ---
$nombreValido = null;
$ligaValida = null;
$imagenValida = null;
$mensajeGeneral = null;

// --- Listar ligas disponibles ---
$liga = new Liga();
$ligas = $liga->listarLigas();

// --- Crear equipo ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crearEquipo'])) {
    $nombre = trim($_POST['nombre'] ?? '');
    $idLiga = $_POST['liga'] ?? null;
    $img = trim($_POST['imagen'] ?? '');

    $equipo = new Equipo("", $nombre, $img, $idLiga);

    // Validaciones
    $nombreValido = $equipo->validarNombre();
    $ligaValida = $idLiga !== null && $idLiga !== "";
    $imagenValida = filter_var($img, FILTER_VALIDATE_URL) || file_exists($img);

    if ($nombreValido && $ligaValida && $imagenValida) {
        $creado = $equipo->crearEquipo();

        if ($creado) {
            $mensajeGeneral = "Equipo creado correctamente.";
        } else {
            $mensajeGeneral = "Error al crear el equipo en la base de datos.";
        }
    } else {
        $mensajeGeneral = "Por favor, corrija los errores indicados.";
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <form action="index.php?pid=CrearEquipo" method="post" class="p-4 needs-validation" novalidate>
            <div>
                <h2>Crear Equipo</h2>
                <?php if ($mensajeGeneral): ?>
                    <div class="alert <?php echo ($mensajeGeneral === 'Equipo creado correctamente.') ? 'alert-success' : 'alert-warning'; ?> mt-2" role="alert">
                        <?php echo htmlspecialchars($mensajeGeneral); ?>
                    </div>
                    <?php if ($mensajeGeneral === 'Equipo creado correctamente.'): ?>
                        <script>
                            setTimeout(function() {
                                window.location.href = 'index.php?pid=Home';
                            }, 2500);
                        </script>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- CARD: Nombre -->
            <div class="card mt-4 mb-3">
                <div class="card-header">
                    <strong>Nombre del Equipo</strong>
                    <?php if ($nombreValido === true): ?>
                        <div class="alert alert-success mb-0 mt-2">Nombre válido y disponible.</div>
                    <?php elseif ($nombreValido === false): ?>
                        <div class="alert alert-danger mb-0 mt-2">El nombre ya existe o no es válido.</div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <label for="nombre" class="form-label">Nombre del equipo</label>
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

            <!-- CARD: Liga -->
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Seleccionar Liga</strong>
                    <?php if ($ligaValida === true): ?>
                        <div class="alert alert-success mb-0 mt-2">Liga seleccionada correctamente.</div>
                    <?php elseif ($ligaValida === false): ?>
                        <div class="alert alert-danger mb-0 mt-2">Debe seleccionar una liga válida.</div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <label for="liga" class="form-label">Liga</label>
                    <select id="liga" name="liga" class="form-select" required>
                        <option value="" disabled selected>Seleccione una liga</option>
                        <?php foreach ($ligas as $l): ?>
                            <option value="<?php echo htmlspecialchars($l->getIdLiga()); ?>" <?php if (($_POST['liga'] ?? '') == $l->getIdLiga()) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($l->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- CARD: Imagen -->
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Escudo o Imagen del Equipo</strong>
                    <?php if ($imagenValida === true): ?>
                        <div class="alert alert-success mb-0 mt-2">Imagen válida.</div>
                    <?php elseif ($imagenValida === false): ?>
                        <div class="alert alert-danger mb-0 mt-2">Ingrese una URL válida o una imagen existente en el servidor.</div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <label for="imagen" class="form-label">URL de la imagen o ruta en servidor</label>
                    <input
                        type="text"
                        id="imagen"
                        name="imagen"
                        placeholder="Ejemplo: img/escudos/mi_equipo.png o https://..."
                        class="form-control <?php if ($imagenValida === true) echo 'is-valid'; elseif ($imagenValida === false) echo 'is-invalid'; ?>"
                        value="<?php echo htmlspecialchars($_POST['imagen'] ?? ''); ?>"
                        required
                    >
                    <?php if (!empty($_POST['imagen'])): ?>
                        <div class="text-center mt-3">
                            <img src="<?php echo htmlspecialchars($_POST['imagen']); ?>" alt="Escudo de equipo" width="120" height="120" onerror="this.src='img/escudos/default.png'">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Botón enviar -->
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-success" type="submit" name="crearEquipo">Crear equipo</button>
            </div>
        </form>
    </div>
</div>
