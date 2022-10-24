<?php require_once('../conn/connect.php') ?>

<?php

$id_expediente=$_POST["id_expediente"];
#echo "expediente: ".$id_expediente;

$f_init=date("d-m-y");
$f_reanudar=date("d-m-y");
$d_solicitados=$_POST["d_solicitados"];
$motivo=$_POST["motivo"];
$observaciones=$_POST["observaciones"];

$insertar = "INSERT INTO n_solicitud (id_expediente, f_init, f_reanudar, d_solicitados, motivo, observaciones)
VALUES ('$id_expediente', '$f_init', '$f_reanudar', '$d_solicitados', '$motivo', '$observaciones')";

echo "<br>".$insertar."<br>";

$resultado = mysqli_query($connect, $insertar);
if (!$resultado) {
  echo "Error al registrar su solicitud";
} else {
  echo "Solicitud registrada exitosamente";
}
mysqli_close($connect);

header('Refresh:0; url=NuevaSolicitud.html');
?>
