<?php
$var = null;
$nombreValido = null;

$campeonato = new Campeonato("", $_SESSION["id"]);

if (isset($_POST["formCreacion"])) {
    $nombre = trim($_POST["nombre"]);
    $campeonato->setNombre($nombre);
    $nombreValido = $campeonato->validarNombre();
    if ($nombreValido) {
        $var = $campeonato->crearCampeonato();
        if ($var) {
            $equipos = new Equipo();
            $equipos = $equipos->listarEquipos();
        }
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <form action="index.php?pid=CrearCamp" method="post" name="formCreacion" class="needs-validation" novalidate>
            <div>
                <h2>Crear Campeonato</h2>
            </div>

            <?php 
            if ($var instanceof Exception) {
                echo "<div class='alert alert-danger mt-3' role='alert'>
                        Error al crear campeonato: " . $var->getMessage() . "
                      </div>";
            } elseif ($var === true || $var == 1) {
                echo "<div class='alert alert-success mt-3' role='alert'>
                        Campeonato creado correctamente. 
                      </div>";
            } elseif ($var !== null) {
                echo "<div class='alert alert-warning mt-3' role='alert'>
                        Ocurrió un problema: $var
                      </div>";
            }
            ?>
            
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <label for="nombre" class="form-label">Nombre del Campeonato</label>
                    <input 
                        type="text" 
                        class="form-control 
                            <?php 
                                if ($nombreValido === true) echo 'is-valid'; 
                                elseif ($nombreValido === false) echo 'is-invalid'; 
                            ?>" 
                        id="nombre" 
                        name="nombre" 
                        value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>" 
                        required
                    >

                    <?php if ($nombreValido === true): ?>
                        <div class="valid-feedback">Looks good!</div>
                    <?php elseif ($nombreValido === false): ?>
                        <div class="invalid-feedback">El nombre ya existe, cambie el nombre.</div>
                    <?php else: ?>
                        <div class="invalid-feedback">Ingrese un nombre válido.</div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($nombreValido): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <label for="equipos" class="form-label">
                            Ahora por favor seleccione los equipos que jugarán en el campeonato
                        </label>
                        <select class="form-select" id="equipos" name="equipos[]" multiple required>
                            <option disabled value="">Equipos</option>
                            <?php if (isset($equipos) && is_array($equipos) && count($equipos) > 0): ?>
                                <?php foreach ($equipos as $equipo): ?>
                                    <option value="<?php echo htmlspecialchars($equipo->getIdEquipo()); ?>">
                                        <?php echo htmlspecialchars($equipo->getNombre() . " - " . $equipo->getIdLiga()); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option disabled>No hay equipos disponibles</option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">Seleccione un equipo válido.</div>
                    </div>
                </div>
            <?php endif; ?> 

            <div>
                <button class="btn btn-primary" type="submit" name="formCreacion">Agregar</button>
            </div>
        </form>
    </div>
</div>
