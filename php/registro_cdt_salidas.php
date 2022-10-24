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
	$usuario=$_SESSION["Usuario"];

	$cdt_salidas = isset($_POST['cdt_salidas']) ? $_POST['cdt_salidas'] : '';
	$solicita_salidas = utf8_decode(isset($_POST['solicita_salidas']) ? $_POST['solicita_salidas'] : '');
	$dirigido_a_salidas = utf8_decode(isset($_POST['dirigido_a_salidas']) ? $_POST['dirigido_a_salidas'] : '');
	$otorga_salidas = isset($_POST['otorga_salidas']) ? $_POST['otorga_salidas'] : '';
	$responde_a_cdt_salidas = isset($_POST['responde_a_cdt_salidas']) ? $_POST['responde_a_cdt_salidas'] : '';
	$firma_salidas = utf8_decode(isset($_POST['firma_salidas']) ? $_POST['firma_salidas'] : '');
	$asunto_salidas = utf8_decode(isset($_POST['asunto_salidas']) ? $_POST['asunto_salidas'] : '');

	$FechaMovimiento_HMS = date('Y-m-d H:i:s', time());



	$query = "INSERT INTO cdts_salidas (Fecha, FolioCdtSalida, Solicita, Dirigido_a, Otorga, FolioCdt, Firma, Asunto, Usuario) VALUES('$FechaMovimiento_HMS', '$cdt_salidas', '$solicita_salidas', '$dirigido_a_salidas',
		'$otorga_salidas', '$responde_a_cdt_salidas', '$firma_salidas', '$asunto_salidas', '$usuario')";
		#print($query);

		if(existe_registro("select count(*) from cdts_salidas where FolioCdtSalida=".$cdt_salidas.";")==0){
			#El registro no existe, se realiza Insert.
			$resultado=$connect->query($query);

			
		}else{
						#Mensaje
			echo'<script type="text/javascript">
			alert("El Folio CDT de SALIDA Ya existe!\nrealice nuevamente el registro con otro Folio CDT.");
			</script>';
		}
		header('Refresh:0; url=GenerarSolicitud.html');
		?>
	</body>
	</html>
