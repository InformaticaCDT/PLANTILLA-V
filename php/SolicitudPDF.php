<?php
session_start();
?>

<?php require_once('../conn/connect.php') ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>
<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('../fpdf/fpdf.php');
require_once('../fpdi2/src/autoload.php');

$FolioCdt = $_GET["FolioCdt"];

$user=$_SESSION["Usuario"];
$area=$_SESSION["Area"];

$destinatario = $_SESSION["dn"];
$FechaMovimiento = date('Y-m-d', time());

$query_v = "SELECT * from ots_vistas WHERE FolioCdt='$FolioCdt'";
$resultado_v=$connect->query($query_v);
$fila_v = mysqli_fetch_assoc($resultado_v);
$total_v = mysqli_num_rows($resultado_v);
if($total_v == 0){
  $query_v = "INSERT INTO ots_vistas (FolioCdt, ".$destinatario.") VALUES('$FolioCdt', 'SI')";
} else {
  $query_v = "UPDATE ots_vistas SET ".$destinatario."='SI' WHERE FolioCdt='$FolioCdt'";
}
#print($query);
try {
  $resultado_v=$connect->query($query_v);
}
catch (MySQLException $e){
  print ($e);
}



$query = "SELECT * FROM entradasua WHERE FolioCdt='$FolioCdt'";
//print($querymov);

$resultados=$connect->query($query);
$row = $resultados->fetch_assoc();

$pdf = new Fpdi();

$pageCount = $pdf->setSourceFile('../img/CaratulaOTS.pdf');
$pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);

$pdf->AddPage();
$pdf->useTemplate($pageId, ['adjustPageSize' => true]);

/* sesion */
/*$pdf->SetFont("Arial","B",9);
$pdf->SetXY(10, 30);
$pdf->Write(8, $user.", ".$area.", queryn:".$query_v.", totaln:".$total_v);*/

/* RECEPCION */
$pdf->SetFont("Arial","B",12);
$pdf->SetXY(159, 41.2);
$pdf->Write(8, date('d-m-Y',strtotime($row["FechaRecibido"])));

$pdf->SetFont("Arial","B",14);
$pdf->SetXY(159, 48.25);
$pdf->Write(8, $FolioCdt);

$pdf->SetFont("Arial","",14);

$pdf->SetXY(159, 55.5);
$pdf->Write(8, $row["OtDidt"]);

$pdf->SetXY(159, 62.1);
$pdf->Write(8, $row["FolioGinp"]);

$pdf->SetXY(159, 68.1);
$pdf->Write(8, $row["OtGinp"]);

$pdf->SetXY(159, 74.1);
$pdf->Write(8, $row["FolioDidt"]);

/* DESTINATARIO */
$icono='../img/palomita.png';
if($row["d1"]=='SI'){
  $pdf->image($icono,21.3,46,2.4); //ANALISIS 1
}
/*if($row["d2"]=='SI'){
  $pdf->image($icono,21.3,90.3,2.4); //ANALISIS 2
}
if($row["d3"]=='SI'){
  $pdf->image($icono,22.1,84.8,2.4); //COORDINACION 1
}
if($row["d4"]=='SI'){
  $pdf->image($icono,21.3,95.9,2.4); //COORDINACION 2
}*/
if($row["d5"]=='SI'){
  $pdf->image($icono,21.3,51.3,2.4); //DIFUSION
}
if($row["d6"]=='SI'){
  $pdf->image($icono,21.3,73.6,2.4); //IDP Y MANUFACTURA
}
if($row["d7"]=='SI'){
  $pdf->image($icono,21.3,56.9,2.4); //LEDA
}
if($row["d8"]=='SI'){
  $pdf->image($icono,21.3,68.1,2.4); //PROJECT MANAGER
}
if($row["d9"]=='SI'){
  $pdf->image($icono,21.3,84.8,2.4); //TELEMANDO
}
if($row["d10"]=='SI'){
  $pdf->image($icono,21.3,62.4,2.4); //TETRA
}
if($row["d11"]=='SI'){
  $pdf->image($icono,21.3,79.1,2.4); //UNIDAD ADMINISTRATIVA
}
/* REFERENCIA */
$pdf->SetFont("Arial","",11);
$pdf->SetXY(55, 105.7);
$pdf->MultiCell(138, 5, $row["Referencia"], 0, 'J',false);

$pdf->SetFont("Arial","",9);
$pdf->SetXY(55, 119.5);
$pdf->MultiCell(138, 5, $row["Descripcion"], 0, 'J',false);

/* INSTRUCCION */
$icono='../img/palomita.png';
if($row["Sol_ParaRespuesta"]=='SI'){
  #$pdf->image($icono,21.3,151.4,2.4); //Prepara respuesta 300
  $pdf->image($icono,21.3,163.5,2.4); //Prepara respuesta
}
if($row["Sol_ParaSuConocimiento"]=='SI'){
  #$pdf->image($icono,21.3,157.3,2.4); //conocimiento 300
  $pdf->image($icono,21.3,169.4,2.4); //conocimiento
}
if($row["Sol_ParaSuSeguimiento"]=='SI'){
  #$pdf->image($icono,21.3,163.3,2.4); //seguimiento 300
  $pdf->image($icono,21.3,175.4,2.4); //seguimiento
}
if($row["Sol_TramiteConducente"]=='SI'){
  #$pdf->image($icono,21.3,169.6,2.4); //tramite conducente 300
  $pdf->image($icono,21.3,181.7,2.4); //tramite conducente
}
if($row["Sol_TratarProximoAcuerdo"]=='SI'){
  #$pdf->image($icono,21.3,175.8,2.4); //Proximo acuerdo 300
  $pdf->image($icono,21.3,187.9,2.4); //Proximo acuerdo
}

/* PRIORIDAD */
$icono='../img/palomita.png';
if($row["Prioridad"]=='NORMAL'){
  #$pdf->image($icono,142.05,151.5,2.4); //Normal 300
  $pdf->image($icono,142.05,163.7,2.4); //Normal
}else{
  #$pdf->image($icono,142.05,158,2.4); //Urgente 300
  $pdf->image($icono,142.05,170.2,2.4); //Urgente
}

/* REQUERIDO */
$pdf->SetFont("Arial","B",12);
#$pdf->SetXY(159, 167.4); //300
$pdf->SetXY(159, 179.5);
$pdf->Write(8, date('d-m-Y',strtotime($row["FechaRequerido"])));

$pdf->SetFont("Arial","",9);
#$pdf->SetXY(55, 187); //300
$pdf->SetXY(55, 199.3);
$pdf->MultiCell(138, 5, $row["Observaciones"], 0, 'J',false);

$pdf->Output();
 ?>
