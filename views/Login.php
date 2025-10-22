<?php

if(isset($_POST["autenticar"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $admin = new Admin("", "", $correo, $clave);
	$cliente= new Usuario("", "", $correo, $clave);
    if($admin -> autenticarAdmin())
	{
        $_SESSION["id"] = $admin -> getIdAdmin();
		$_SESSION["role"] = "A";
        header('Location: index.php?pid='.base64_encode("Admin"));
		exit();
    }elseif($cliente -> autenticarUsuario())
	{
		$_SESSION["id"] = $cliente -> getIdUsuario();
		$_SESSION["role"] = "U";
		header("Location: ?pid=" . base64_encode("Home"));
		exit();
	}else
	{
		$_SESSION["id"] = null;
		$_SESSION["role"] = null;
		$error = true;
	}
	
    
}

?>
<div>
	<div class="row mt-5">
		<div class="col-md-12 col-xl-6 text-light position-relative">
			<h2 class="position-absolute top-50 start-50 translate-middle">Bienvenido a LigaMain</h2>
			
		</div>
		<div class="col">
			<div class="card ">
				<?php if (isset($error) && $error): ?>
					<div class="alert alert-danger mt-3" role="alert" id="alertContainer">
						<p id="alert">Error en el inicio de sesión. Verifique credenciales correo o clave incorrectas</p>
					</div>
				<?php endif; ?>
				<div class="card-header">
					<h3>Login</h3>
				</div>
				<div >
					<img src="img/logo.png" alt="logo" class="img-fluid img-top">
				</div>
				<div class="card-body text-center">
					<form method="post" action="<?php echo base64_encode("index.php")?>" name="autenticar">
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