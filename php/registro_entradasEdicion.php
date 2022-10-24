<?php
session_start();
?>
<?php require_once('../conn/connect.php') ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<title>Registro entradas</title>
</head>
<body>
<?php

	$usuario=$_SESSION["Usuario"];

	$FechaRecibido_entradas = isset($_POST['FechaRecibido_entradas']) ? $_POST['FechaRecibido_entradas'] : '';
	$FolioCdt_entradas = isset($_POST['FolioCdt_entradas']) ? $_POST['FolioCdt_entradas'] : '';
	$FolioGinp_entradas = isset($_POST['FolioGinp_entradas']) ? $_POST['FolioGinp_entradas'] : '';
	$OtGinp_entradas = isset($_POST['OtGinp_entradas']) ? $_POST['OtGinp_entradas'] : '';
	$FolioDidt_entradas = isset($_POST['FolioDidt_entradas']) ? $_POST['FolioDidt_entradas'] : '';
	$OtDidt_entradas = isset($_POST['OtDidt_entradas']) ? $_POST['OtDidt_entradas'] : '';

	$FechaRequerido_entradas = isset($_POST['FechaRequerido_entradas']) ? $_POST['FechaRequerido_entradas'] : '';

	#Esto permite no registrar fechas inferiores a la fecha de recepcion
	$Fecha_Hoy = date('Y-m-d', time());
	if($FechaRequerido_entradas<$FechaRecibido_entradas){
		$FechaRequerido_entradas=$Fecha_Hoy;
		echo'<script type="text/javascript">
		alert("Fecha de Requerido es menor que la Fecha de recibido: Se cambia Fecha Requerido a la Fecha de hoy!");
		</script>';
	}


	$ReqCdtSalida_entradas = isset($_POST['ReqCdtSalida_entradas']) ? $_POST['ReqCdtSalida_entradas'] : '';
	$Referencia_entradas = strtoupper(utf8_decode(isset($_POST['Referencia_entradas']) ? $_POST['Referencia_entradas'] : ''));
	$Descripcion_entradas = strtoupper(utf8_decode(isset($_POST['Descripcion_entradas']) ? $_POST['Descripcion_entradas'] : ''));
	$Observaciones_entradas = strtoupper(utf8_decode(isset($_POST['Observaciones_entradas']) ? $_POST['Observaciones_entradas'] : ''));

	if (isset($_POST['d1']) ? $_POST['d1'] : ''=='on') {
		$d1 = 'SI';
	} else {
		$d1 = 'NO';
	}

	$d2 = 'NO';#Analisis2
	$d3 = 'NO';#Coord1
	$d4 = 'NO';#Coord2
	/*if (isset($_POST['d3']) ? $_POST['d3'] : ''=='on') {
		$d3 = 'SI';
	} else {
		$d3 = 'NO';
	}
	if (isset($_POST['d4']) ? $_POST['d4'] : ''=='on') {
		$d4 = 'SI';
	} else {
		$d4 = 'NO';
	}*/
	if (isset($_POST['d5']) ? $_POST['d5'] : ''=='on') {
		$d5 = 'SI';
	} else {
		$d5 = 'NO';
	}
	if (isset($_POST['d6']) ? $_POST['d6'] : ''=='on') {
		$d6 = 'SI';
	} else {
		$d6 = 'NO';
	}
	if (isset($_POST['d7']) ? $_POST['d7'] : ''=='on') {
		$d7 = 'SI';
	} else {
		$d7 = 'NO';
	}
	if (isset($_POST['d8']) ? $_POST['d8'] : ''=='on') {
		$d8 = 'SI';
	} else {
		$d8 = 'NO';
	}
	if (isset($_POST['d9']) ? $_POST['d9'] : ''=='on') {
		$d9 = 'SI';
	} else {
		$d9 = 'NO';
	}
	if (isset($_POST['d10']) ? $_POST['d10'] : ''=='on') {
		$d10 = 'SI';
	} else {
		$d10 = 'NO';
	}
	if (isset($_POST['d11']) ? $_POST['d11'] : ''=='on') {
		$d11 = 'SI';
	} else {
		$d11 = 'NO';
	}


	if (isset($_POST['Sol_ParaRespuesta']) ? $_POST['Sol_ParaRespuesta'] : ''=='on') {
		$Sol_ParaRespuesta = 'SI';
	} else {
	  $Sol_ParaRespuesta = 'NO';
	}

	if (isset($_POST['Sol_ParaSuConocimiento']) ? $_POST['Sol_ParaSuConocimiento'] : ''=='on') {
		$Sol_ParaSuConocimiento = 'SI';
	} else {
		$Sol_ParaSuConocimiento = 'NO';
	}

	if (isset($_POST['Sol_ParaSuSeguimiento']) ? $_POST['Sol_ParaSuSeguimiento'] : ''=='on') {
		$Sol_ParaSuSeguimiento = 'SI';
	} else {
	  $Sol_ParaSuSeguimiento = 'NO';
	}

	if (isset($_POST['Sol_TramiteConducente']) ? $_POST['Sol_TramiteConducente'] : ''=='on') {
		$Sol_TramiteConducente = 'SI';
	} else {
	  $Sol_TramiteConducente = 'NO';
	}

	if (isset($_POST['Sol_TratarProximoAcuerdo']) ? $_POST['Sol_TratarProximoAcuerdo'] : ''=='on') {
		$Sol_TratarProximoAcuerdo = 'SI';
	} else {
	  $Sol_TratarProximoAcuerdo = 'NO';
	}




	$FechaMovimiento_HMS = date('Y-m-d H:i:s', time());
	#$AnioMovimiento = date('Y', time());

	$Prioridad = isset($_POST['Prioridad']) ? $_POST['Prioridad'] : '';



	$query = "UPDATE entradasua SET FolioGinp='$FolioGinp_entradas', OtGinp='$OtGinp_entradas', FolioDidt='$FolioDidt_entradas',
	OtDidt='$OtDidt_entradas', FechaRequerido='$FechaRequerido_entradas', ReqCdtSalida='$ReqCdtSalida_entradas', Referencia='$Referencia_entradas', Descripcion='$Descripcion_entradas', Observaciones='$Observaciones_entradas',
	d1='$d1', d2='$d2', d3='$d3', d4='$d4', d5='$d5', d6='$d6', d7='$d7', d8='$d8', d9='$d9', d10='$d10', d11='$d11', Prioridad='$Prioridad',	Sol_ParaRespuesta='$Sol_ParaRespuesta',
	Sol_ParaSuConocimiento='$Sol_ParaSuConocimiento', Sol_ParaSuSeguimiento='$Sol_ParaSuSeguimiento', Sol_TramiteConducente='$Sol_TramiteConducente', Sol_TratarProximoAcuerdo='$Sol_TratarProximoAcuerdo',
	Movimiento='CAMBIO' WHERE FolioCdt='$FolioCdt_entradas'";
	print($query);

	$resultado=$connect->query($query);

	$_SESSION["NextFolioCdt"]=strval(intval($FolioCdt_entradas)+1);
	#Crea la siguiente carpeta si no existe.
	if (!file_exists("../docs/Entradas/".$_SESSION["NextFolioCdt"]."/")) {
		mkdir("../docs/Entradas/".$_SESSION["NextFolioCdt"]."/", 0777, true);
	}




	#header('Refresh:0; url=GenerarSolicitud.html');
?>

</body>
</html>
