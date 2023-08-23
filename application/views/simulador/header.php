
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIDE Simulador de Declaraciones UTeM</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!--Material Icons-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--W3.CSS-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style type="text/css">
		.bg-lightgray{
			background-color: lightgray;
		}
		.bg-red{
			background-color: #951752;
		}
		a{
			color: white !important;
			text-decoration: none !important;
		}
		#inicio{
			width: 30vw;
			height: 30vh;
		}
		
		
		footer{
			bottom: 0;
		}
		.enable{
			color:#951752;
		}
		.disable{
			color:lightgray;
		}

		#Sig:active{
			color: white !important;
			background-color: #951752;
		}
		#Sig:hover{
			color: #951752 !important;
			background-color: white;
			border:	2px solid #951752;
		}

		.border-red{
			border: 4px solid #951752;
		}
		.bg-blood{
			background-color: #951752 !important;
		}
		.msg-muted{
			color: gray !important;
			font-size: 12px;
		}
		.questions{
			color: black;
			font-size: 14px;
		}
		input:required:invalid,select:required:invalid {
			border-bottom:2px solid red;
	  	}
	</style>
</head>
<body>
	<?php 
		// Establecer la zona horaria
		date_default_timezone_set('America/Mexico_City');

		// Obtener la fecha y hora actual
		$fechaActual = date('Y-m-d');

	 ?>
	<div id="cabecera" class="row container-fluid bg-light">
			<div class="col-lg-1"></div>
			<div class="col-lg-2">
				<img src="<?php echo base_url()."/assets/images/hacienda.png"; ?>" alt="Logo" style="width:100%;">
			</div>
			<div class="col-lg-2">
				<img src="<?php echo base_url()."/assets/images/sat.png"; ?>" alt="Logo" style="width:50%;">
			</div>
		</div>
		<div class="row bg-lightgray">
			<div class="col-lg-1"></div>
			<div class="col-lg-3">
				<div class="row">
					<label><strong>RFC: </strong><?php 
					if(isset($_POST['txtRfc'])){
						echo $_POST['txtRfc'] ;
					}elseif(isset($_GET['txtRfc'])){
						echo $_GET['txtRfc'] ;
					}
					
				?></label>
				</div>
				<div class="row">
					<label><strong>Usuario: </strong><?php echo $_SESSION['name'] . " " . $_SESSION['lastName'] ;?></label>
				</div>
				
				<div class="row">
					<label><strong>Version 1.0 - </strong><?php echo $fechaActual ?></label>
				</div>
			</div>
			<div class="col-lg-4">
				<h3 class="text-center">Declaración Provisional o Definitiva de Impuestos Federales</h3>
			</div>
		</div>
		<div class="row bg-red align-items-around p-3">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<a href="#">Presentar Declaración</a> |
				<a href="#">Consultas</a> |
				<a href="#">Presentar declaración otras obligaciones</a>


			</div>
			<div class="col-lg-1">
				<a href="<?php echo site_url('dashboardAlumno'); ?>">Cerrar</a>
			</div>
		</div>