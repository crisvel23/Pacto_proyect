<?php
session_start();

require_once 'php_action/db_connect.php';
error_reporting(0);

?>

<head>
	<link rel="icon" href="assests/recursos/pacto-logo.png" type="image/png" />
</head>

<style>
	body {
		background-image: url(/pacto/assests/recursos/fondo-pacto-2.jpg);
		background-repeat: no-repeat;
		background-size: contain;
		background-size: cover;
		margin: 0;
		width: 100%;
		height: 100%;
		font-family: 'Raleway', sans-serif;
	} 
</style>
<?php


$errors = array();

if ($_POST) {

	$aso_Id = $_POST['ASOCID'];
	$radio_Rol = $_POST['flexRadioDefault'];

	$username = $connect->real_escape_string($_POST['username']); // Escapando caracteres especiales
	$password = $_POST['password'];

	if (empty($username) || empty($password)) {
		if ($username == "") {
			$errors[] = "Se requiere nombre de usuario";
		}

		if ($password == "") {
			$errors[] = "Se requiere contraseña";
		}
	} else {
		$sql = "SELECT * FROM USUARIO WHERE NOMBREUSU = '$username'";
		$result = $connect->query($sql);

		if ($result->num_rows == 1) {
			$password = md5($password);
			// exists

			$mainSql = "SELECT * FROM USUARIO WHERE NOMBREUSU = '$username' AND CONTRAUSU = '$password'";
			$mainResult = $connect->query($mainSql);


			if ($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['USUARIOID'];
				$user_rol = $value['ROLID'];
				// set session
				$_SESSION['userId'] = $user_id;
				$_SESSION['userRol'] = $user_rol;

				if ($radio_Rol == "socio") {
					$mainSql2 = "SELECT * FROM PERTENECEN ";
					$r = mysqli_query($connect, $mainSql2) or die("Error");
					mysqli_num_rows($r);
					while ($fila = mysqli_fetch_object($r)) {

						$ASOID = $fila->ASOCIACIONID;
						$USUID = $fila->USUARIOID;

						if ($ASOID == $aso_Id && $USUID == $user_id) {

							$_SESSION['asoId'] = $ASOID;

							if ($user_rol == 2) {

								header('location: asodashboard.php');
							} else if ($user_rol == 3) {

								header('location: socdashboard.php');
							}
						} else {
							$errors[0] = "No perteneces a esta asociación";
						}
					}
				} else {

					$_SESSION['asoId'] = $ASOID;
					if ($user_rol == 1) {
						header('location: dashboard.php');
					} else if ($user_rol == 4) {
						header('location: clidashboard.php');
					}
				}
			} else {

				$errors[] = "Combinación incorrecta de nombre de usuario y/o contraseña";
			} // /else
		} else {
			$errors[] = "El nombre de usuario no existe";
		} // /else
	} // /else not empty username // password

} // /if $_POST
?>

<!DOCTYPE html>
<html>

<head>
	<title>Pacto</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assests/font-awesome/css/all.css">

	<!-- custom css -->
	<link rel="stylesheet" href="custom/css/custom.css">

	<!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
	<!-- jquery ui -->
	<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
	<script src="assests/jquery-ui/jquery-ui.min.js"></script>

	<!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Inicio de sesión</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if ($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									' . $value . '</div>';
								}
							} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
								<div class="form-group">
									<label for="username" class="col-sm-3 control-label">Usuario:</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" autocomplete="off" required />
									</div>
								</div>

								<div class="form-group">
									<label for="password" class="col-sm-3 control-label">Contraseña:</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" autocomplete="off" required />
									</div>
								</div>

								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Ingresar a:</label>
									<div class="col-sm-9">

										<div class="form-check">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="radio2" value="cliente">
											<label class="form-check-label" for="flexRadioDefault2">
												Tienda
											</label>
										</div>

										<div class="form-check">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="radio1" value="socio" checked>
											<label class="form-check-label" for="flexRadioDefault1">
												Asociación
											</label>
										</div>
									</div>
								</div>


								<div class="form-group" id="ocultar">
									<label for="" class="col-sm-3 control-label">Asociación: </label>
									<div class="col-sm-8">
										<select name="ASOCID" id="" class="form-control">
											<option value="">Selecciona una Asociación</option>
											<?php $query = mysqli_query($connect, "SELECT * FROM ASOCIACION"); ?>
											<?php
											while ($aso = mysqli_fetch_array($query)) { ?>
												<option value='<?php echo $aso['ASOCIACIONID']; ?>'> <?php echo $aso['NOMBREASO']; ?></option><br>
											<?php
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-default"> <i class="fas fa-sign-in-alt"></i> Ingresar</button>

									</div>
								</div>
								<div class="form-group ">
									<div class="col-sm-offset-3 col-sm-9">
										<a href="registro.php" class="link-primary">¿No tienes una cuenta? Regístrate</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->
</body>

</html>
<script>
	$(document).ready(function() {
		$("#cont").hide();
		$("input[id$='radio1']").click(function() {
			var test = $(this).val();
			$("div div").show();
		});
		$("input[id$='radio2']").click(function() {
			var test = $(this).val();
			$("#ocultar").hide();
		});
	});
</script>