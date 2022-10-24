<?php require_once('../conn/connect.php') ?>

<?php



$id_expediente=strtoupper($_POST["id_expediente"]);
$nombre=strtoupper($_POST["nombre"]);
$paterno=strtoupper($_POST["paterno"]);
$materno=strtoupper($_POST["materno"]);
$ingreso=strtoupper($_POST["ingreso"]);
$categoria=strtoupper($_POST["categoria"]);
$calidad_laboral=strtoupper($_POST["calidad_laboral"]);
$d_descanso1=strtoupper($_POST["d_descanso1"]);
$d_descanso2=strtoupper($_POST["d_descanso2"]);
$id_ads=strtoupper($_POST["id_ads"]);



#echo $id_expediente."<br>";
#echo $nombre."<br>";
#echo $paterno."<br>";
#echo $materno."<br>";
#echo $ingreso."<br>";
#echo $categoria."<br>";
#echo $calidad_laboral."<br>";
#echo $d_descanso1."<br>";
#echo $d_descanso2."<br>";
#echo $id_ads."<br>";
#echo $id_usu."<br>";

$insertar = "INSERT INTO empleados (id_expediente, nombre, paterno, materno, ingreso, categoria, calidad_laboral, d_descanso1, d_descanso2, id_ads)
VALUES ('$id_expediente', '$nombre', '$paterno', '$materno', '$ingreso', '$categoria', '$calidad_laboral', '$d_descanso1', '$d_descanso2', '$id_ads')";

echo "<br>".$insertar."<br>";

$resultado = mysqli_query($connect, $insertar);
if (!$resultado) {
  echo "Error al registrar su solicitud";
} else {
  echo "Solicitud registrada exitosamente";
}
mysqli_close($connect);


header('Refresh:0; url=../vistas/RegistroTrabajadores.html');


/*echo "<br>".$insertar."<br>";


      $insertar = "INSERT INTO empleados (id_expediente, nombre, paterno, materno, ingreso, categoria, calidad_laboral, d_descanso1, d_descanso2, id_ads, id_usu)
      VALUES ('$id_expediente', '$nombre', '$paterno', '$materno', '$ingreso', '$categoria', '$calidad_laboral', '$d_descanso1', '$d_descanso2', '$id_ads', '$id_usu')";
      $resultado = mysqli_query($connect, $insertar);


if (!$resultado) {
  echo "Error al Realizar su Registro";
} else {
  echo "Registro Guardado Exitosamente";
}
mysqli_close($connect);*/
?>
