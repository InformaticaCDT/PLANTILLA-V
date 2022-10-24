<?php require_once('../conn/connect.php') ?>

<?php


$Nombre=$_POST["Nombre"];
$Usuario=$_POST["Usuario"];
$Password=$_POST["Password"];
$Area=$_POST["Area"];
$TipoDeCuenta=$_POST["TipoDeCuenta"];
#$Registro=$_POST["Registro"]; version pasada
$Registro= $_SESSION["Registro"];
$Fecha=date("Y-m-d");


$resultado=$connect->query("SELECT EXISTS (SELECT * FROM usuarios WHERE Usuario='$Usuario');");
$row=mysqli_fetch_row($resultado);

    if ($row[0]=="1") {

            echo "El usuario que intenta regisrtrar ya existe";
    }else{
      $insertar = "INSERT INTO usuarios (Nombre, Usuario, Password, Area, TipoDeCuenta, Registro, Fecha)
      VALUES ('$Nombre', '$Usuario', md5('$Password'), '$Area', '$TipoDeCuenta', '$Registro', '$Fecha')";
      $resultado = mysqli_query($connect, $insertar);
    }

header('Refresh:0; url=../vistas/RegistroUsuarios.html');
/*if (!$resultado) {
  echo "Error al Realizar su Registro";
} else {
  echo "Registro Guardado Exitosamente";
}*/
mysqli_close($connect);


?>
