<?php require_once('../conn/connect.php') ?>
<?php
session_start();

$Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

$query = "SELECT * FROM usuarios WHERE Usuario='$Usuario' AND Password=md5('$Password')";
$resultado=$connect->query($query);

$rows = $resultado->fetch_assoc();

$queryn = "SELECT count(*) FROM usuarios WHERE Usuario='$Usuario' AND Password=md5('$Password')";
$resultadon=$connect->query($queryn);
$rown = $resultadon->fetch_row();
$entradas = $rown[0];

if ($entradas>0)
{
  $_SESSION["Usuario"]=$rows["Usuario"];
  $_SESSION["TipoDeCuenta"]=$rows["TipoDeCuenta"];
  $_SESSION["Area"]=$rows["Area"];
  $_SESSION["dn"]=$rows["dn"];
  $_SESSION["NextFolioCdt"]="0";#tmp default void
  if ($_SESSION["TipoDeCuenta"]=="administrador")
    header('Refresh:0; url=../vistas/print.html');
    else{
      header('Refresh:0; url=../vistas/print.html');
    }
}
else{
  header('Location: vistas/login.html');
}

?>
