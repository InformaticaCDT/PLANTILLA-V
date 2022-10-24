<?php require_once('../conn/connect.php')?>

<?php


     $id_expediente=$_POST['recipient-name'];
     #echo "expediente ".$id_expediente."<br>";
     $nombre=strtoupper($_POST['nombre']);
     #echo "<br>NOMBRE ".$nombre."<br>";
     $paterno=strtoupper($_POST['paterno']);
     #echo "<br>Paterno ".$paterno."<br>";
     $materno=strtoupper($_POST['materno']);
     #echo "<br>Materno ".$materno."<br>";
     $ingreso=strtoupper($_POST['ingreso']);
    #echo "<br>ingreso ".$ingreso."<br>";
     $categoria=strtoupper($_POST['categoria']);
    #echo "<br>caqtegoria ".$categoria."<br>";
     $calidad_laboral=strtoupper($_POST['calidad_laboral']);
     #echo "<br>calidad_laboral ".$calidad_laboral."<br>";
     $d_descanso1=strtoupper($_POST['d_descanso1']);
     #echo "<br>d_descanso1 ".$d_descanso1."<br>";
     $d_descanso2=strtoupper($_POST['d_descanso2']);
     #echo "<br>descanso2 ".$d_descanso2."<br>";
     $id_ads=strtoupper($_POST['id_ads']);
     #echo "<br>adscripcion ".$id_ads."<br>";



#echo "<br>".$nombre."<br>";



  $sql="UPDATE empleados SET
                        id_expediente='$id_expediente',
                        nombre='$nombre',
                        paterno='$paterno',
                        materno='$materno',
                        ingreso='$ingreso',
                        categoria='$categoria',
                        calidad_laboral='$calidad_laboral',
                        d_descanso1='$d_descanso1',
                        d_descanso2='$d_descanso2',
                        id_ads='$id_ads'
  WHERE id_expediente='".$id_expediente."'";

  echo "<br>".$sql."<br>";

  $resultado = mysqli_query($connect, $sql);
  if (!$resultado) {
    echo "Error al actualizar sus datos";
  } else {
    echo "Se actualizaron sus datos correctamente";
  }
  mysqli_close($connect);
header('Refresh:0; url=../vistas/RegistroTrabajadores.html');

?>
