<?php require_once('../conn/connect.php')?>
<?php

$id_expediente=$_POST['recipient-name'];
echo "expediente ".$id_expediente."<br>";

$sql ="DELETE FROM empleados WHERE  id_expediente='".$id_expediente."'";



$resultado = mysqli_query($connect, $sql);
if (!$resultado) {
  echo "Error al borrar el registro";
} else {
  echo "Se borro el registro correctamente";
}
mysqli_close($connect);
header('Refresh:0; url=../vistas/RegistroTrabajadores.html');

?>
