<?php

$usuario = new Usuario();

// Si se presiona el botón de eliminar
if (isset($_GET['eliminar'])) {
    $id_usuario = base64_decode($_GET['eliminar']);
    $usuarioEliminar = new Usuario($id_usuario);
    $usuarioEliminar->eliminarUsuario();

    $pidCod = base64_encode("EliminarUsuario");

    echo "<script>alert('Usuario eliminado correctamente');</script>";
    echo "<script>window.location.href='index.php?pid={$pidCod}';</script>";
    exit;
}

// Listar todos los usuarios
$usuarios = $usuario->listarUsuarios();
?>

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Eliminar Usuario</h2>
            <h4>Antes de continuar tenga en cuanta que se eliminaran los torneos y toda la informacin subsecuente con estos </h4>
        </div>
        <div class="card-body">
            <?php if (!empty($usuarios)) { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $us) { ?>
                                <tr>
                                    <td><?php echo $us->getIdUsuario(); ?></td>
                                    <td><?php echo htmlspecialchars($us->getNombre()); ?></td>
                                    <td><?php echo htmlspecialchars($us->getCorreo()); ?></td>
                                    <td>
                                        <a href=<?php echo base64_encode("index.php?pid=EliminarUser&eliminar=". $us->getIdUsuario()) ?>
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
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
                    No hay usuarios registrados.
                </div>
            <?php } ?>
        </div>
    </div>
</div>
