<?php require_once('../conn/connect.php'); ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>
<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('../fpdf/fpdf.php');
require_once('../fpdi2/src/autoload.php');

$id_expediente = $_GET["id_expediente"];
$id = $_GET["id"];

$Fechasolicitud = date('Y-m-d', time());

$query = "SELECT * from v_solicitudes WHERE id_expediente='$id_expediente' AND id='$id'";
$resultados=$connect->query($query);
$row = $resultados->fetch_assoc();

$query1 ="SELECT * from empleados WHERE id_expediente='$id_expediente'";
$resultados1=$connect->query($query1);
$row1 =$resultados1->fetch_assoc();

$pdf = new Fpdi();

$pageCount = $pdf->setSourceFile('../img/FORMATOVACACIONES.pdf');
$pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);

$pdf->AddPage();
$pdf->useTemplate($pageId, ['adjustPageSize' => true]);

$pdf->SetDrawColor('97','209','14');


/*$pdf->SetFont("Arial","B",11);
$pdf->SetXY(30, 44.2);
$pdf->MultiCell(25, 5, date('d/m/Y') $row1['f_init'], 1, 'C',false);
$pdf->Cell(190, 5,'Municipio, Estado , a '. date('d') . ' de '. date('F'). ' de '. date('Y'), 0,1,'C');*/

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(130, 56);
$pdf->Write(8, date('d',strtotime($row["f_init"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(138, 56);
$pdf->Write(8, date('m',strtotime($row["f_init"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(146, 56);
$pdf->Write(8, date('Y',strtotime($row["f_init"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(159, 56);
$pdf->Write(8, date('d',strtotime($row["f_reanudar"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(168, 56);
$pdf->Write(8, date('m',strtotime($row["f_reanudar"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(177, 56);
$pdf->Write(8, date('Y',strtotime($row["f_reanudar"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(159, 23);
$pdf->Write(8, date('d',strtotime($row["f_solicitud"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(168, 23);
$pdf->Write(8, date('m',strtotime($row["f_solicitud"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(177, 23);
$pdf->Write(8, date('Y',strtotime($row["f_solicitud"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(30, 45.5);
$pdf->MultiCell(25, 5, $row1['paterno'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(75, 45.5);
$pdf->MultiCell(25, 5, $row1['materno'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(120, 45.5);
$pdf->MultiCell(25, 5, $row1['nombre'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(161, 45.5);
$pdf->MultiCell(25, 5, $id_expediente, 1, 'C',false);#1 pinta la caja verde y 0 se apaga

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(30, 58);
$pdf->MultiCell(10, 5, $row['periodo'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(50, 58);
$pdf->MultiCell(15, 5, $row['anio'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(67, 58);
$pdf->MultiCell(10, 5, $row['d_solicitados'], 1, 'C',false);



$pdf->SetFont("Arial","B",12);
$pdf->SetXY(65, 78);
/*$pdf->MultiCell(8.5, 5.5, $row['motivo'], 1, 'C',true);*/
if($row['motivo']=="Dias a cuenta"){
  $pdf->MultiCell(8.5, 5.5, 'X', 1, 'C',false);
}

$pdf->SetFont("Arial","B",12);
$pdf->SetXY(65, 83);
if($row['motivo']=="Reprogramadas"){
  $pdf->MultiCell(8.5, 5.5, 'X', 1, 'C',false);
}

$pdf->SetFont("Arial","B",12);
$pdf->SetXY(65, 89);
if($row['motivo']=="Adelantadas"){
  $pdf->MultiCell(8.5, 5.5, 'X', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="LUNES"){
$pdf->MultiCell(8.5, 5.5, 'L', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="MARTES"){
$pdf->MultiCell(8.5, 5.5, 'M', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="MIERCOLES"){
$pdf->MultiCell(8.5, 5.5, 'MI', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="JUEVES"){
$pdf->MultiCell(8.5, 5.5, 'J', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="VIERNES"){
$pdf->MultiCell(8.5, 5.5, 'V', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="SABADO"){
$pdf->MultiCell(8.5, 5.5, 'S', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(69.5, 94);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso2']=="DOMINGO"){
  $pdf->MultiCell(8.5, 5.5, 'D', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(108, 79);
$pdf->MultiCell(80, 3, $row1['categoria'], 1, 'C',false);

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(108, 95.5);
$pdf->MultiCell(80, 5, $row['observaciones'], 1, 'C',false);



/*segunda parte*/
$pdf->SetFont("Arial","B",11);
$pdf->SetXY(177, 150);
$pdf->Write(8, date('Y',strtotime($row["f_solicitud"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(168, 150);
$pdf->Write(8, date('m',strtotime($row["f_solicitud"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(160, 150);
$pdf->Write(8, date('d',strtotime($row["f_solicitud"])));


$pdf->SetFont("Arial","B",11);
$pdf->SetXY(29, 172);
$pdf->MultiCell(25, 5, $row1['paterno'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(75, 172);
$pdf->MultiCell(25, 5, $row1['materno'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(125, 172);
$pdf->MultiCell(25, 5, $row1['nombre'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(162, 172);
$pdf->MultiCell(25, 5, $id_expediente, 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(24, 185);
$pdf->MultiCell(25, 5, $row['periodo'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(50, 185);
$pdf->MultiCell(15, 5, $row['anio'], 1, 'C',false);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(69, 185);
$pdf->MultiCell(10, 5, $row['d_solicitados'], 1, 'C',false);



$pdf->SetFont("Arial","B",11);
$pdf->SetXY(130, 183);
$pdf->Write(8, date('d',strtotime($row["f_init"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(139, 183);
$pdf->Write(8, date('m',strtotime($row["f_init"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(148, 183);
$pdf->Write(8, date('Y',strtotime($row["f_init"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(160, 183);
$pdf->Write(8, date('d',strtotime($row["f_reanudar"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(169, 183);
$pdf->Write(8, date('m',strtotime($row["f_reanudar"])));

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(178, 183);
$pdf->Write(8, date('Y',strtotime($row["f_reanudar"])));


$pdf->SetFont("Arial","B",12);
$pdf->SetXY(66, 204);
/*$pdf->MultiCell(8.5, 5.5, $row['motivo'], 1, 'C',true);*/
if($row['motivo']=="Dias a cuenta"){
  $pdf->MultiCell(8.5, 5.5, 'X', 1, 'C',false);
}

$pdf->SetFont("Arial","B",12);
$pdf->SetXY(66, 210);
if($row['motivo']=="Reprogramadas"){
  $pdf->MultiCell(8.5, 5.5, 'X', 1, 'C',false);
}

$pdf->SetFont("Arial","B",12);
$pdf->SetXY(66, 215);
if($row['motivo']=="Adelantadas"){
  $pdf->MultiCell(8.5, 5.5, 'X', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.8, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="LUNES"){
$pdf->MultiCell(8.5, 5.5, 'L', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.8, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="MARTES"){
$pdf->MultiCell(8.5, 5.5, 'M', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.8, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="MIERCOLES"){
$pdf->MultiCell(8.5, 5.5, 'MI', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.8, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="JUEVES"){
$pdf->MultiCell(8.5, 5.5, 'J', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.8, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="VIERNES"){
$pdf->MultiCell(8.5, 5.5, 'V', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(61.8, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso1']=="SABADO"){
$pdf->MultiCell(8.5, 5.5, 'S', 1, 'C',false);
}

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(69.5, 220.5);
#$pdf->MultiCell(8.5, 5.5, $row1['d_descanso1'], 1, 'C',false);
if($row1['d_descanso2']=="DOMINGO"){
  $pdf->MultiCell(8.5, 5.5, 'D', 1, 'C',false);
}


$pdf->SetFont("Arial","B",9);
$pdf->SetXY(108, 207);
$pdf->MultiCell(80, 3, $row1['categoria'], 1, 'C',false);

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(108, 223);
$pdf->MultiCell(80, 5, $row['observaciones'], 1, 'C',false);





#$pdf->Write(8, $row['periodo']);














/*$pdf->SetFont("Arial","B",11);
$pdf->SetXY(170, 65);
$pdf->Write(8, $id);

$pdf->SetFont("Arial","B",11);
$pdf->SetXY(200, 53.2);
$pdf->Write(8, $row['periodo']);*/








#$pdf->Write(8, "ejemplo");
/*$pdf->SetFont("Arial", "B", 12);
$pdf->SetXY(170, 43.2);
$pdf->Write(8, $f_solicitud);*/


/*
$pdf->SetFont("Arial","",11);
$pdf->SetXY(55, 105.7);
$pdf->MultiCell(138, 5, $row["Referencia"], 0, 'J',false);
*/


$pdf->Output();
 ?>
