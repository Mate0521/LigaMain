<?php

if (isset($_POST["autenticar"])) {
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "Formato de correo inválido";
    } else {
        $admin = new Admin("", "", $correo, $clave);
        $cliente = new Usuario("", "", $correo, $clave);

        if ($admin->autenticarAdmin()) {
            $_SESSION["id"] = $admin->getIdAdmin();
            $_SESSION["role"] = "A";
            header('Location: ?pid='.base64_encode("Admin"));
            exit();
        } elseif ($cliente->autenticarUsuario()) {
            $_SESSION["id"] = $cliente->getIdUsuario();
            $_SESSION["role"] = "U";
            header("Location: ?pid=" . base64_encode("Home"));
            exit();
        } else {
            $error = "Credenciales incorrectas";
        }
    }
}
$camp=new Campeonato();
$campeonatos = $camp->listarCampeonatosAll();

?>
<div class="container d-flex align-items-center justify-content-center">
  	<div class="row mt-4">
		<!-- Sección izquierda -->
		<div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center bg-dark text-light rounded-start-4 shadow-lg">
			<h1 class="fw-bold mb-3">Bienvenido a <span class="text-warning">LigaMain</span></h1>
			<p class="text-center w-75">Administra tus partidos, equipos y campeonatos de forma fácil y rápida.</p>
		</div>

		<!-- Sección derecha (login) -->
		<div class="col-md-6 bg-light rounded-end-4 shadow-lg">
			<div class="card border-0 bg-transparent">
				<?php if (isset($error) && $error): ?>
				<div class="alert alert-danger mt-3 text-center" role="alert" id="alertContainer">
					Error en el inicio de sesión. Verifique correo o clave.
				</div>
				<?php endif; ?>

				<div class="card-body p-5">
					<div class="text-center mb-4">
						<img src="img/logo.png" alt="logo" class="img-fluid" style="max-width: 120px;">
						<h3 class="mt-3 text-primary fw-bold">Iniciar Sesión</h3>
					</div>

					<div class="card-body text-center">
						<form method="post" action="?pid=<?php echo base64_encode("Login")?>" name="autenticar">
							<div class="mb-3">
								<input type="email" class="form-control" name="correo"
									placeholder="Correo" required>
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave"
									placeholder="Clave" required>
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-primary" name="autenticar">Autenticar</button>
							</div>
							<div class="mb-3">
								<form action="<?php echo base64_encode("index.php")?>" method="post" name="registrar">
									<button type="submit" class="btn" name="newCliente"><a class="btn btn-link">¿No tienes cuenta? Regístrate</a></button>
								</form>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  	</div>
</div>
<div class="container d-flex align-items-center justify-content-center">
	<!-- card de tabla de pos -->
	<div class="row mt-4 ">
		<div class="overflow-auto px-2">
			<?php foreach ($campeonatos as $campeonato): ?>
				<div class="card mb-4 border-0 shadow-lg rounded-4 animate__animated animate__fadeInUp">
					<div class="card-header bg-dark text-white fw-bold">
						<?php echo htmlspecialchars($campeonato->getNombre()); ?>
					</div>
					<div class="card-body">
						<h5 class="card-title text-primary fw-semibold mb-3">
							<?php echo htmlspecialchars($campeonato->getIdTipo()->getNombre()); ?>
						</h5>
						<h5 class="card-title text-primary fw-semibold mb-3">
							<?php echo htmlspecialchars($campeonato->getIdUsuario()->getNombre()); ?>
						</h5>
						<div class="text-center mt-3">
							<a href="?pid=<?php echo base64_encode("TablaPos")?>&id_cam=<?php echo base64_encode($campeonato->getIdCampeonato())?>" class="btn btn-primary">
								<i class="bi bi-table"></i> Ver Tabla de Posiciones
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

