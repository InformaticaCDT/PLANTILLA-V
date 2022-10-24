<?php
session_start();
?>
<?php require_once('../conn/connect.php') ?>

<?php require_once('existe_registro.php') ?>
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
	function Mxm($str) {
		$mca = array ("á","é","í","ó","ú");#minusculas con acento
		$MCA = array ("Á","É","Í","Ó","Ú");#Mayusculas con acento
		$str = str_replace($mca, $MCA ,$str);# Pone MCA donde hay mca
		return $str;
	}
	?>

<?php

	$usuario=$_SESSION["Usuario"];

	$Sol_ParaRespuesta = '';


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

	$Referencia_entradas = Mxm(strtoupper(utf8_decode(isset($_POST['Referencia_entradas']) ? $_POST['Referencia_entradas'] : '')));
	$Descripcion_entradas = Mxm(strtoupper(utf8_decode(isset($_POST['Descripcion_entradas']) ? $_POST['Descripcion_entradas'] : '')));
	#print("Descripcion:".$Descripcion_entradas);

	$Observaciones_entradas = Mxm(strtoupper(utf8_decode(isset($_POST['Observaciones_entradas']) ? $_POST['Observaciones_entradas'] : '')));
	$FechaMovimiento_HMS = date('Y-m-d H:i:s', time());
	$Prioridad = isset($_POST['Prioridad']) ? $_POST['Prioridad'] : '';

	#Solicita
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

	if (isset($_POST['d1']) ? $_POST['d1'] : ''=='on') {
		$d1 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d1 = 'NO';
	}

	$d2 = 'NO';#Analisis2
	$d3 = 'NO';#Coord1
	$d4 = 'NO';#Coord2

	if (isset($_POST['d5']) ? $_POST['d5'] : ''=='on') {
		$d5 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d5 = 'NO';
	}
	if (isset($_POST['d6']) ? $_POST['d6'] : ''=='on') {
		$d6 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d6 = 'NO';
	}
	if (isset($_POST['d7']) ? $_POST['d7'] : ''=='on') {
		$d7 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d7 = 'NO';
	}
	if (isset($_POST['d8']) ? $_POST['d8'] : ''=='on') {
		$d8 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d8 = 'NO';
	}
	if (isset($_POST['d9']) ? $_POST['d9'] : ''=='on') {
		$d9 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d9 = 'NO';
	}
	if (isset($_POST['d10']) ? $_POST['d10'] : ''=='on') {
		$d10 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d10 = 'NO';
	}
	if (isset($_POST['d11']) ? $_POST['d11'] : ''=='on') {
		$d11 = 'SI';
		if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		}
	} else {
		$d11 = 'NO';
	}



	$FechaMovimiento_HMS = date('Y-m-d H:i:s', time());
	#$AnioMovimiento = date('Y', time());



	$query = "INSERT INTO entradasua (FechaRecibido, FolioCdt, ReqCdtSalida, FolioGinp, OtGinp, FolioDidt, OtDidt, FechaRequerido,
		Referencia, Descripcion, Observaciones, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, Prioridad,
		Sol_ParaRespuesta, Sol_ParaSuConocimiento, Sol_ParaSuSeguimiento, Sol_TramiteConducente, Sol_TratarProximoAcuerdo, Movimiento, FechaMovimiento) VALUES(
		'$FechaRecibido_entradas', $FolioCdt_entradas, '$ReqCdtSalida_entradas', '$FolioGinp_entradas', '$OtGinp_entradas', '$FolioDidt_entradas', '$OtDidt_entradas',
		'$FechaRequerido_entradas', '$Referencia_entradas', '$Descripcion_entradas', '$Observaciones_entradas', '$d1', '$d2', '$d3', '$d4', '$d5', '$d6', '$d7',
		'$d8', '$d9', '$d10', '$d11', '$Prioridad',	'$Sol_ParaRespuesta', '$Sol_ParaSuConocimiento',	'$Sol_ParaSuSeguimiento', '$Sol_TramiteConducente',
		'$Sol_TratarProximoAcuerdo', 'ALTA', '$FechaMovimiento_HMS')";
	print($query);

	if(existe_registro("select count(*) from entradasua where FolioCdt=".$FolioCdt_entradas.";")==0){
		#El registro no existe, se realiza Insert.

		$resultado=$connect->query($query);






	}else{
		#Mensaje
		echo'<script type="text/javascript">
    alert("El Folio CDT de entrada Ya existe!\nrealice nuevamente el registro con otro Folio CDT.");
    </script>';
	}



	$_SESSION["NextFolioCdt"]=strval(intval($FolioCdt_entradas)+1);
	#Crea la siguiente carpeta si no existe.
	if (!file_exists("../docs/Entradas/".$_SESSION["NextFolioCdt"]."/")) {
		mkdir("../docs/Entradas/".$_SESSION["NextFolioCdt"]."/", 0777, true);
	}


	#header('Refresh:0; url=GenerarSolicitud.html');
?>

</body>
</html>
