<?php require_once('../conn/connect.php') ?>

<?php



$id_expediente=$_POST["id_expediente"];
$nombre=$_POST["nombre"];
$paterno=$_POST["paterno"];
$materno=$_POST["materno"];
$ingreso=$_POST["ingreso"];
$categoria=$_POST["categoria"];
$calidad_laboral=$_POST["calidad_laboral"];
$d_descanso1=$_POST["d_descanso1"];
$d_descanso2=$_POST["d_descanso2"];
$id_ads=$_POST["id_ads"];
$id_usu=$_POST["id_usu"];




$sql="UPDATE empleados SET id_expediente=$id_expediente,nombre=$nombre,paterno=$paterno,materno=$materno,ingreso=$ingreso,categoria=$categoria,calidad_laboral=$calidad_labora,d_descanso1=$d_descanso1,d_descanso2=$d_descanso2,id_ads=$id_ads WHERE id_expediente=$search";



echo "<br>".$sql."<br>";

$resultado = mysqli_query($connect, $sql);
if (!$resultado) {
  echo "Error al actualizar sus datos";
} else {
  echo "Se actualizaron sus datos correctamente";
}
mysqli_close($connect);

#header href="RegistroTrabajadores.html"
