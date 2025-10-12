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
		$_SESSION["pid"]="admin";
        header('Location: index.php');
    }elseif($cliente -> autenticarUsuario())
	{
		$_SESSION["id"] = $cliente -> getIdUsuario();
		$_SESSION["role"] = "U";
		$_SESSION["pid"]="home";
		header('Location: index.php');
	}else
	{
		$_SESSION["id"] = null;
		$_SESSION["role"] = null;
		$_SESSION["pid"]=null;
		$error = true;
	}
	
    
}

?>
<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<?php if (isset($error) && $error): ?>
						<div class="alert alert-danger mt-3" role="alert" id="alertContainer">
							<p id="alert">Error en el inicio de sesión. Verifique credenciales correo o clave incorrectas</p>
						</div>
					<?php endif; ?>
					<div class="card-header">
						<h3>Autenticar</h3>
					</div>
					<div class="card-body">
						<form method="post" action="index.php" name="autenticar">
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
								<form action="index.php" method="post" name="registrar">

									<button type="submit" class="btn" name="newCliente"><a class="btn btn-link">¿No tienes cuenta? Regístrate</a></button>
								</form>
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</div>