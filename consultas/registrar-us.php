<?php require_once('../conn/connect.php') ?>

<?php

$id_expediente=$_POST["id_expediente"];
#echo "expediente: ".$id_expediente;
$periodo=$_POST["periodo"];
$anio=$_POST["anio"];
$f_init=$_POST["f_init"];
$f_reanudar=$_POST["f_reanudar"];
$d_solicitados=$_POST["d_solicitados"];
$motivo=$_POST["motivo"];
$observaciones=$_POST["observaciones"];
$f_solicitud=$_POST["f_solicitud"];
$p_resgitro= $_POST["p_registro"];

$insertar = "INSERT INTO v_solicitudes (id_expediente, periodo, anio,  f_init, f_reanudar, d_solicitados, motivo, observaciones, f_solicitud, p_registro )
VALUES ('$id_expediente', '$periodo', '$anio', '$f_init', '$f_reanudar', '$d_solicitados', '$motivo', '$observaciones', '$f_solicitud', '$p_registro')";

echo "<br>".$insertar."<br>";

$resultado = mysqli_query($connect, $insertar);
if (!$resultado) {
  echo "Error al registrar su solicitud";
} else {
  echo "Solicitud registrada exitosamente";
}
mysqli_close($connect);

header('Refresh:0; url=../vistas/NuevaSolicitud.html');
?>
