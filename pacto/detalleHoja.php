<?php
session_start();
$aux = $_SESSION['userRol'];

if ($aux != 3) {

	header('location: index.php');
}

?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerSocio.php'; ?>




<?php

$IDHOJA = $_POST['idHoja'];

$USUARIO = $_SESSION['userId'];

$ASOCIAIONID = $_SESSION['asoId'];

$sql = "SELECT 
USUARIO.NOMBREAPEUSU,
ASOCIACION.NOMBREASO,
ASOCIACION.BARRIOASO,
ASOCIACION.SECTORASO,
ASOCIACION.PARROQUIAASO,
SUBTOTALHOJADECAMPO.NUMSEMANA FROM ASOCIACION ,PERTENECEN,USUARIO,SUBTOTALHOJADECAMPO
WHERE  PERTENECEN.PERTENECENID=SUBTOTALHOJADECAMPO.PERTENECENID 
AND SUBTOTALHOJADECAMPO.SUBHOJADECAMPOID = $IDHOJA
AND ASOCIACION.ASOCIACIONID=$ASOCIAIONID	
AND USUARIO.USUARIOID = $USUARIO";

$EJECUTADO = mysqli_query($connect, $sql) or die("Problemas al seleccionar " . mysqli_error($connect));

while ($row = $EJECUTADO->fetch_array()) {
	$NOMBREPRO = $row[0];
	$NOMBREASO = $row[1];
	$BARRIOASO = $row[2];
	$SECTORASO = $row[3];
	$PARROQUIASO = $row[4];
	$NUMSEMANA = $row[5];
}


?>

<style>
	.header {
		display: flex;
		max-width: 100%;
		width: 1200px;

	}

	.checks {
		display: flex;
		max-width: 100%;
		width: 1200px;

	}


	.col1 {
		width: 60%;
		padding-right: 20px;
	}

	.col2 {
		width: 60%;
		padding-right: 20px;
	}

	.col3 {
		width: 30%;
	}

	.labores-culturales {
		width: 40%;
		padding-right: 20px;
	}

	.labores-trans {
		width: 40%;
		padding-right: 20px;
	}

	.labores-gestion {
		width: 30%;
	}

	.mostrar {
		max-width: 1200px;
	}

	.sub {
		display: block;
		padding-top: 30px;
	}

	.x .fas {
		color: green;
		padding-top: 20px;
	}

	.x i {
		font-size: 30px;
	}

	.x {
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>

<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
			<li><a href="socdashboard.php">Inicio</a></li>
			<li class="active">Hojas de Campo</li>
		</ol>

		<div class="panel panel-default">

			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Semana de Trabajo</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				<div class="header">
					<div class="col1">
						<p>Nombre: <?php echo $NOMBREPRO ?> </p>
						<p>#Semana: <?php echo $NUMSEMANA ?></p>
					</div>
					<div class="col2">
						<p>Asociación: <?php echo $NOMBREASO ?></p>
						<p>Sector:<?php echo $SECTORASO ?></p>
					</div>

					<div class="col3">
						<p>Barrio: <?php echo $BARRIOASO ?></p>
						<p>Parroquia: <?php echo $PARROQUIASO ?></p>
					</div>

				</div>

				<pre></pre>

				<form action="php_action/createChecks.php" method="POST">

					<input type="number" style="display:none" value="<?php echo $IDHOJA ?>" name="idhoja">

					<div>
						<label for="">Número de trabajadores: </label><input class="form-control" style="max-width:fit-content" type="number" name="NUMTRADG" required>
						<label for="">Fecha: </label><input class="form-control" style="max-width:fit-content" type="date" name="FECHADG" required>
					</div>

					<div class="checks">

						<div class="labores-culturales">
							<h3>Labores Culturales Agrícolas</h3>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="PREPASUELO">
								<label class="form-check-label" for="flexCheckDefault">
									Preparación del Suelo
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="PREPASEMILLA">
								<label class="form-check-label" for="flexCheckChecked">
									Preparación de la Semilla
								</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="SIEMBRA">
								<label class="form-check-label" for="flexCheckDefault">
									Siembra
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="RESIEMBRA">
								<label class="form-check-label" for="flexCheckChecked">
									Resiembra
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="DESHIERBE">
								<label class="form-check-label" for="flexCheckDefault">
									Deshierbe
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="APOQUE">
								<label class="form-check-label" for="flexCheckChecked">
									Aporque
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="LIMPIDESOJE">
								<label class="form-check-label" for="flexCheckDefault">
									Limpieza y deshoje
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="ELAABONOSO">
								<label class="form-check-label" for="flexCheckChecked">
									Elaboración de abonos sólidos
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="ELAABONOLI">
								<label class="form-check-label" for="flexCheckDefault">
									Elaboración de abonos líquidos
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="APLIABONO">
								<label class="form-check-label" for="flexCheckChecked">
									Aplicación de abonos
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="CONTROLPLAGA">
								<label class="form-check-label" for="flexCheckDefault">
									Control de plagas
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="CONTROLENFER">
								<label class="form-check-label" for="flexCheckChecked">
									Control de enfermedades
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="MANTEFINCA">
								<label class="form-check-label" for="flexCheckDefault">
									Mantenimiento de la finca
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="COSECHA">
								<label class="form-check-label" for="flexCheckChecked">
									Cosecha
								</label>
							</div>

						</div>

						<div class="labores-trans">
							<h3>Labores de Transformación</h3>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="ACARREOTRANS">
								<label class="form-check-label" for="flexCheckDefault">
									Acarreo o Transporte
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="DESCARGA">
								<label class="form-check-label" for="flexCheckChecked">
									Descarga
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="CALIMANTEEQUIPO">
								<label class="form-check-label" for="flexCheckDefault">
									Calibración y Mant. equipos
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="MOLIENDA">
								<label class="form-check-label" for="flexCheckChecked">
									Molienda
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="FILTRADO">
								<label class="form-check-label" for="flexCheckDefault">
									Filtrado
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="MELADA">
								<label class="form-check-label" for="flexCheckChecked">
									Mezcla
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="CLARIFICADO">
								<label class="form-check-label" for="flexCheckDefault">
									Clarificado
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="PUNTERO">
								<label class="form-check-label" for="flexCheckChecked">
									Punteo
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="BATIDO">
								<label class="form-check-label" for="flexCheckDefault">
									Batido
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="TAMIZADO">
								<label class="form-check-label" for="flexCheckChecked">
									Tamizado
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="EMPACADO">
								<label class="form-check-label" for="flexCheckDefault">
									Empacado
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="CODIFICADO">
								<label class="form-check-label" for="flexCheckChecked">
									Codificación
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="LIMPIEZAMOD">
								<label class="form-check-label" for="flexCheckDefault">
									Limpieza del Módulo
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="DESINFECCIONMOD">
								<label class="form-check-label" for="flexCheckChecked">
									Desinfección del Módulo
								</label>
							</div>
						</div>

						<div class="labores-gestion">
							<h3>Labores de Gestión de Finca</h3>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="REGISTROVEN">
								<label class="form-check-label" for="flexCheckDefault">
									Registros de Venta
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="LLENADOCONTA">
								<label class="form-check-label" for="flexCheckChecked">
									Llenado de Contabilidad
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="CAPACITACION">
								<label class="form-check-label" for="flexCheckDefault">
									Captación
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="COMERCIALIZACION">
								<label class="form-check-label" for="flexCheckChecked">
									Comercialización
								</label>
							</div>

						</div>

					</div>

					<div style="padding-bottom:30px; padding-top:30px" id="btn1">

						<button type="submit" class="btn btn-secondary" onclick="deshabilitar()">Enviar Datos</button>

					</div>

					<pre></pre>

				</form>


				<div class="mostrar">

					<table class="table table-responsive  table-striped" id="tablahoja" cellspacing="0" cellpadding="3" width="100%" style="width: 0px">

						<thead>
							<tr>
								<th>FECHA</th>
								<th>PREPARACIÓN SUELO</th>
								<th>PREPARACIÓN SEMILLA</th>
								<th>RESIEMBRA</th>
								<th>DESHIERBE</th>
								<th>APOQUE</th>
								<th>DESHOJE</th>
								<th>ELABORACIÓN ABONO</th>
								<th>ELABORACIÓN ABONO LIQ</th>
								<th>APLICACIÓN ABONO</th>
								<th>CONTROL PLAGA</th>
								<th>CONTROL ENDERMEDADES</th>
								<th>MANTENIMIENTO FINCA</th>
								<th>COSECHA</th>
								<th>CARREO TRASNPORTE</th>
								<th>DESCARGA</th>
								<th>CALIBRACIÓN MANTENIMIENTO EQUIPO</th>
								<th>MOLIENDA</th>
								<th>FILTRADO</th>
								<th>MEZCLA</th>
								<th>CLARIFICACIÓN</th>
								<th>PUNTEO</th>
								<th>BATIDO</th>
								<th>TAMIZADO</th>
								<th>EMPACADO</th>
								<th>CODIFICADO</th>
								<th>LIMPIEZA MÓDULOS</th>
								<th>DESINFECCIÓN MÓDULOS</th>
								<th>REGISTRO</th>
								<th>LLENADO </th>
								<th>CAPTACIÓN</th>
								<th>COMERCIALIZACIÓN</th>
								<th>NÚMERO TRABAJADORES</th>

							</tr>
						</thead>

						<tbody>
							<?php

							$sql2 = "SELECT 
									SUBTOTALHOJADECAMPO.SUBHOJADECAMPOID, 
									PREPASUELO,
									PREPASEMILLA,
									SIEMBRA,
									RESIEMBRA,
									DESHIERBE,
									APOQUE,
									LIMPIDESOJE,
									ELAABONOSO,
									ELAABONOLI,
									APLIABONO,
									CONTROLPLAGA,
									CONTROLENFER,
									MANTEFINCA,
									COSECHA,
									ACARREOTRANS,
									DESCARGA,
									CALIMANTEEQUIPO,
									MOLIENDA,
									FILTRADO,
									MELADA,
									CLARIFICADO,
									PUNTERO,
									BATIDO,
									TAMIZADO,
									EMPACADO,
									CODIFICADO,
									LIMPIEZAMOD,
									DESINFECCIONMOD,
									REGISTROVEN,
									LLENADOCONTA,
									CAPACITACION,
									COMERCIALIZACION,
									FECHADG,
									NUMTRADG FROM HOJADECAMPO,SUBTOTALHOJADECAMPO
								WHERE  HOJADECAMPO.SUBHOJADECAMPOID = SUBTOTALHOJADECAMPO.SUBHOJADECAMPOID
								AND SUBTOTALHOJADECAMPO.SUBHOJADECAMPOID = $IDHOJA";
							$r = mysqli_query($connect, $sql2) or die("Problemas al seleccionar " . mysqli_error($connect));
							while ($fila = $r->fetch_assoc()) {
							?>
								<tr>
									<td>
										<p style="font-weight:bold">
											<?php
											$date = date_create($fila['FECHADG']);
											$nombresDias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
											$nombreDia = $nombresDias[$date->format("w")];
											echo $nombreDia;
											?>
										</p>
										<?php echo $fila['FECHADG']; ?>
									</td>
									<td><?php
										if ($fila['PREPASUELO'] == 1) {
											$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										}
										?></td>
									<td><?php
										if ($fila['PREPASEMILLA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['RESIEMBRA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['DESHIERBE'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										}  ?></td>
									<td><?php
										if ($fila['APOQUE'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['LIMPIDESOJE'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['ELAABONOSO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['ELAABONOLI'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['APLIABONO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['CONTROLPLAGA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['CONTROLENFER'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['MANTEFINCA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['COSECHA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['ACARREOTRANS'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['DESCARGA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['CALIMANTEEQUIPO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['MOLIENDA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['FILTRADO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['MELADA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['CLARIFICADO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['PUNTERO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['BATIDO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['TAMIZADO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['EMPACADO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['CODIFICADO'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['LIMPIEZAMOD'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['DESINFECCIONMOD'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['REGISTROVEN'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['LLENADOCONTA'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['CAPACITACION'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php
										if ($fila['COMERCIALIZACION'] == 1) {
												$X = '<div class="x"><i class="fas fa-check"></i></div>';
											echo $X;
										} else {
											echo "";
										} ?></td>
									<td><?php echo $fila['NUMTRADG']; ?></td>


								</tr>
							<?php
							}
							?>
						</tbody>
					</table>

					<?php
					$sql3 = "SELECT 
									SUBJORNAL,
									COSJORNAL,
									COSMANO,
									COSFAMI,
									COSLENA,
									COSTRANS,
									COSMANT,
									COSCANA,
									COSTRAPICHE,
									COSTINA,
									COSINFRA,
									OBSERVACIONES,
									HOJASTATUS
									FROM SUBTOTALHOJADECAMPO
								WHERE SUBHOJADECAMPOID = $IDHOJA";

					$r = mysqli_query($connect, $sql3) or die("Problemas al seleccionar " . mysqli_error($connect));
					while ($fila = $r->fetch_assoc()) {
						$SUBJORNAL = $fila['SUBJORNAL'];
						$COSJORNAL = $fila['COSJORNAL'];
						$COSMANO = $fila['COSMANO'];
						$COSFAMI = $fila['COSFAMI'];
						$COSLENA = $fila['COSLENA'];
						$COSTRANS = $fila['COSTRANS'];
						$COSMANT = $fila['COSMANT'];
						$COSTRAPICHE = $fila['COSTRAPICHE'];
						$COSCANA = $fila['COSCANA'];
						$COSTINA = $fila['COSTINA'];
						$COSINFRA = $fila['COSINFRA'];
						$OBSERVACIONES = $fila['OBSERVACIONES'];
						$HOJASTATUS = $fila['HOJASTATUS'];

						$TOT = $SUBJORNAL + $COSJORNAL + $COSMANO + $COSMANO;
						$TOT2 = $COSLENA + $COSTRANS + $COSMANT + $COSCANA;
						$TOT3 = $COSTRAPICHE + $COSTINA + $COSTINA;
					}


					?>


					<div class="header">
						<div class="col1">
							<label for="">Subtotal Jornal:</label>
							<p><?php echo $SUBJORNAL ?></p>
							<label for="">Costo del Jornal:</label>
							<p><?php echo $COSJORNAL ?></p>
							<label for="">Costo de mano de obra:</label>
							<p><?php echo $COSMANO ?></p>
							<label for="">Costo de mano de obra familiar:</label>
							<p><?php echo $COSMANO ?></p>
							<label for="">TOTAL:</label>
							<p><?php echo $TOT ?></p>

						</div>
						<div class="col2">
							<label for="">Costo de combustible/leña: </label>
							<p><?php echo $COSLENA ?></p>
							<label for="">Costo de Transporte: </label>
							<p><?php echo $COSTRANS ?></p>
							<label for="">Costo de mantenimiento: </label>
							<p><?php echo $COSMANT ?></p>
							<label for="">Costo caña: </label>
							<p><?php echo $COSCANA ?></p>
							<label for="">TOTAL:</label>
							<p><?php echo $TOT2 ?></p>
						</div>
						<div class="col3">
							<label for="">Trapiche y Homo:</label>
							<p><?php echo $COSTRAPICHE ?></p>
							<label for="">Tinas y Utensillos:</label>
							<p><?php echo $COSTINA ?></p>
							<label for="">Infraestructura: </label>
							<p><?php echo  $COSTINA ?></p>
							<label for="">TOTAL:</label>
							<p><?php echo $TOT3 ?></p>
						</div>

					</div>
					<div class="col4">
						<label for="">Descripción: </label>
						<p><?php echo $OBSERVACIONES ?></p>

					</div>

					<pre></pre>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Finalizar hoja de campo semanal:</label>
						<div class="col-sm-9">



							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="radio1" onchange="javascript:showContent()">
								<label class="form-check-label" for="flexCheckDefault">
									Finalizar
								</label>
							</div>

						</div>
					</div>

					<form method="post" action="php_action/createSub.php">
						<input type="number" style="display:none" value="<?php echo $IDHOJA ?>" name="idhoja">
						<div class="header" id="subtotal" style="display:none">

							<div class="col1">
								<h5> </h5>
								<label for="">Subtotal Jornal: </label><input class="form-control" style="max-width:fit-content" type="number" name="SUBJORNAL" step="0.01" required>
								<label for="">Costo del Jornal: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSJORNAL" step="0.01" required>
								<label for="">Costo de mano de obra: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSMANO" step="0.01" required>
								<label for="">Costo de mano de obra familiar: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSFAMI" step="0.01" required>


							</div>

							<div class="col2">
								<h5> </h5>
								<label for="">Costo de combustible/leña: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSLENA" step="0.01" required>
								<label for="">Costo de Transporte: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSTRANS" step="0.01" required>
								<label for="">Costo de mantenimiento: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSMANT" step="0.01" required>
								<label for="">Costo caña: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSCANA" required>

							</div>
							<div class="col3">
								<label for="">Trapiche y Homo: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSTRAPICHE" step="0.01" required>
								<label for="">Tinas y Utensillos: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSTINA" step="0.01" required>
								<label for="">Infraestructura: </label><input class="form-control" style="max-width:fit-content" type="number" name="COSINFRA" step="0.01" required>


							</div>



						</div>

						<div class="sub" id="subtotal2" style="display:none">

							<p style="font-weight: bold;">Observaciones:</p>

							<textarea name="DESC" id="" cols="165" rows="10" class="form-control" ></textarea>

							<div class="alert alert-warning" role="alert">
								Una vez finalizada la hoja de campo no se podra seguir editando.
							</div>

							<div>
								<button type="submit" id="btn2" class="btn btn-secondary">Finalizar Hoja de Campo</button>
							</div>
						</div>



					</form>



					<script>
						function deshabilitar() {
							btn = document.getElementById("btn1");

							var status = <?php echo $HOJASTATUS ?>;


							if (status == 1) {
								btn1.style.display = 'none'
								alert("La hoja de campo ya fue finalizada.");
							}

						}

						function showContent() {

							element = document.getElementById("subtotal");

							element2 = document.getElementById("subtotal2");

							check = document.getElementById("radio1");

							//status = document.getElementById("status");
							var status = <?php echo $HOJASTATUS ?>;

							if (status == 0) {
								if (check.checked) {
									element.style.display = 'flex';
									element2.style.display = 'block';

								} else {
									element.style.display = 'none';
									element2.style.display = 'none';
								}
							} else {

								alert("La hoja de campo ya fue finalizada.");
							}


						}
					</script>

				</div>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->





<?php require_once 'includes/footer.php'; ?>

<script>
	$(document).ready(function() {

		$('#tablahoja').dataTable({
			"scrollX": true,
			"bPaginate": false,
			"bInfo": false,
			"bFilter": false,
			"autoWidth": true,

		});


	});
</script>