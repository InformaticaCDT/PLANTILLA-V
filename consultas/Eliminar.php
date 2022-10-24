<?php require_once('../conn/connect.php') ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>
<?php
session_start();
?>
<?php
$ndn=$_SESSION['dn'];
$FolioCdt=$_SESSION["FolioCdt"];
$FechaMovimiento_HMS = date('Y-m-d H:i:s', time());

$queryn = "SELECT * from respuestas WHERE FolioCdt='$FolioCdt' AND Destinatario='$ndn';";
#echo "query:".$queryn;
$resultadon=$connect->query($queryn);
$fila = mysqli_fetch_assoc($resultadon);
$total = mysqli_num_rows($resultadon);

if($total > 0){
  $query = "UPDATE respuestas SET FechaRespuesta='$FechaMovimiento_HMS' WHERE FolioCdt='$FolioCdt' AND destinatario='$ndn'";
  #print($query);
  try {
    $resultado=$connect->query($query);
  }
  catch (MySQLException $e){
    print ($e);
  }
}


// Usamos el comando "unlink" para borrar el fichero
unlink($_GET["name"]);

// Redirigiendo hacia atrás
header("Location: " . $_SERVER["HTTP_REFERER"])
?>
