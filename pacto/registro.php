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
require_once 'php_action/db_connect.php';


$errors = array();

$usuario="";
$nombre="";
$cedula="";
$celular="";
$telefono="";
$email="";
$direccion="";
$contrasenia="";
$repita="";
if($_POST) {
    
    $usuario=$_POST['usuregistro'];
    $nombre=$_POST['nomregistro'];
    $cedula=$_POST['cedregistro'];
    $celular=$_POST['celregistro'];
    $telefono=$_POST['telregistro'];
    $email=$_POST['mailregistro'];
    $direccion=$_POST['dirregistro'];
    $contrasenia=$_POST['passregistro'];
    $repita=$_POST['reregistro'];

	if(empty($usuario) || empty($nombre) || empty($cedula)||empty($telefono)|| empty($email) || empty($direccion) || empty($contrasenia) || empty($repita)) {
        if($usuario=="" || $nombre=="" || $cedula=="" || $celular=="" || $telefono=="" || $email=="" ||  $direccion=="" || $contrasenia=="" || $repita=="" ){
             $errors[] = "Por favor llena todos los campos obligatorios";
        }
	} else {

        if($contrasenia!=$repita){
            $errors[] = "Las contraseñas no coinciden";
        }else{

		$sql = "SELECT * FROM USUARIO ";
        $r=mysqli_query($connect,$sql) or die ("Error");
        mysqli_num_rows($r);

        
        $contador=0;

		while ($fila=mysqli_fetch_object($r)){
            $NOMUSU=$fila -> NOMBREUSU;
            $MAIL=$fila -> EMAILUSU;
            $CELULAR=$fila -> TELCELUSU;
            $TELEFONO=$fila -> TELCUSU;
            $CEDULA=$fila -> CEDULAUSU;

            if($NOMUSU==$usuario){
                $contador ++;
                $errors[0] = "El usuario ya está registrado";
            }

            if($MAIL==$email){
                $contador ++;
                $errors[0] = "El email ya está registrado";
            }

            if($TELEFONO==$telefono){
                $contador ++;
                $errors[0] = "El teléfono convencional ya está registrado";
            }

            if($CELULAR==$celular){
                $contador ++;
                $errors[0] = "El teléfono celular ya está registrado";
            }

            if($CEDULA==$cedula){
                $contador ++;
                $errors[0] = "La cédula ya está registrada";
            }


        }

        if ($contador<=0){

            $contrasenia=md5($contrasenia);
            $sql2="INSERT INTO USUARIO (ROLID, NOMBREUSU, EMAILUSU, TELCUSU, TELCELUSU, CONTRAUSU, DIRUSU, NOMBREAPEUSU, HECTAREASUSU, CEDULAUSU, STATUSUSU) 
            VALUES (4,'$usuario','$email','$telefono','$celular','$contrasenia','$direccion','$nombre','','$cedula',1)";
            mysqli_query($connect,$sql2) or die ("Error");

            $usuario="";
            $nombre="";
            $cedula="";
            $celular="";
            $telefono="";
            $email="";
            $direccion="";
            $contrasenia="";
            $repita="";
            
            $connect->close();
            $errors[0] = "Usuario añadido con exito.  \nRedirigiendo a la página de inicio...";
            header( "refresh:2;url=index.php" ); 

           
        }

        
    }


		
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

   <style>
       .fa-asterisk{
           color: red;
           font-size: 7px;
       }

       .panel{
           width:110% ;
       }
   </style>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5  col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Regístrate </h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Nombre de Usuario:</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="usuregistro" name="usuregistro" placeholder="Introduce un Nombre de Usuario" autocomplete="off" required value="<?php echo $usuario ?>" />
									</div>
								</div>

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Nombre Completo:</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="nomregistro" name="nomregistro" placeholder="Introduce tu Nombre y Apellido" autocomplete="off" required  value="<?php echo $nombre ?>"/>
									</div>
								</div>

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Cédula:</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="cedregistro" name="cedregistro" placeholder="Ingresa tu cédula" autocomplete="off" required value="<?php echo $cedula ?>" />
									</div>
								</div>

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Teléfono celular:</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="celregistro" name="celregistro" placeholder="Ingresa tu teléfono celular" autocomplete="off" required value="<?php echo $celular ?>" />
									</div>
								</div>

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Teléfono convencional:</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="telregistro" name="telregistro" placeholder="Ingresa tu teléfono convencional" autocomplete="off" required value="<?php echo $telefono ?>"/>
									</div>
								</div>

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Email:</label>
									<div class="col-sm-9">
									  <input type="email" class="form-control" id="mailregistro" name="mailregistro" placeholder="Introduce tu correo electrónico" autocomplete="off" required value="<?php echo $email ?>"/>
									</div>
								</div>

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Dirección:</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="dirregistro" name="dirregistro" placeholder="Introduce dirección" autocomplete="off" required value="<?php echo $direccion ?>"/>
									</div>
								</div>

    
								<div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Contraseña:</label>
									<div class="col-sm-9">
									  <input type="password" class="form-control" id="passregistro" name="passregistro" placeholder="Introduce tu contraseña" autocomplete="off" required value="<?php echo $contrasenia ?>" />
									</div>
								</div>	

                                <div class="form-group">
									<label for="" class="col-sm-3 control-label"><i class="fas fa-asterisk"></i>Repita la Contraseña:</label>
									<div class="col-sm-9">
									  <input type="password" class="form-control" id="reregistro" name="reregistro" placeholder="Repite tu contraseña" autocomplete="off" required value="<?php echo $repita ?>" />
									</div>
								</div>	

								

							
					

								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
									  <button type="submit" class="btn btn-default"> <i class="fas fa-sign-in-alt"></i> Registrarse </button>
									  
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
<script >
$(document).ready(function(){ 
	$("#cont").hide();
	$("input[id$='radio1']").click(function() {
		var test = $(this).val();
		$("div div").show();
	}); $("input[id$='radio2']").click(function() {
		var test = $(this).val();
		$("#ocultar").hide();
	}); 
});
</script>