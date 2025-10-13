<?php
if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $usuario = new Usuario("", $nombre, $correo, $clave);
	$var=$usuario -> crearUsuario();
}
?>
<div>
	<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">
						<h3>Registrar Cliente</h3>
					</div>
					<div class="card-body">
						<?php 	
						if (isset($_POST["registrar"])) {
							if ($var instanceof Exception) {
								echo "<div class='alert alert-danger' role='alert'>
									Error al registrar: " . $var->getMessage() . "
								</div>";
							} elseif ($var === true || $var == 1) {

								echo "<div class='alert alert-success' role='alert'>
									Cliente almacenado correctamente. 
								</div>
								<script>
									setTimeout(function() {
										window.location.href = 'index.php?pid=Login';
									}, 3000);
								</script>";
							} else {
								echo "<div class='alert alert-warning' role='alert'>
									Ocurrió un problema: $var
								</div>";
							}
						}
						?>
	
						<form method="post" action="index.php?pid=Registrarse" name="registrar">
							<div class="mb-3">
								<input type="text" class="form-control" name="nombre"
									placeholder="Nombre" required>
							</div>
							<div class="mb-3">
								<input type="email" class="form-control" name="correo"
									placeholder="Correo" required>
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave"
									placeholder="Clave" required>
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
