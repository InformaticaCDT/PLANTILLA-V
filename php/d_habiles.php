<?php
function d_habiles($f1,$f2){
#$f1 = "2022-04-12";
#$f2 = "2022-04-18";

$date1 = new DateTime($f1);
$date2 = new DateTime($f2);
#Calcula la diferencia de dias entre date1 y date2
#*************************************************
$diff = $date1->diff($date2);
$diferencia =$diff->days;#La diferencia entre fechas indica las repeticiones del for

#Array de dias feriados dd-mm
 $feriados = array('01-01','07-02','21-03', '14-04', '15-04', '01-05', '04-09', '16-09', '21-11', '21-12');

$habil=0;
#echo "Periodo: ".$diferencia."<br>";
for ($x = 0; $x <= $diferencia; $x++) {
  #A partir de la fecha de inicio se incrementara de 1 en 1 dia hasta llegar a date2
  $dia_x=date('Y-m-d', strtotime($f1.' + '.$x.' days'));
  $nameOfDay_x = date('D', strtotime($dia_x));
  #echo "Dia de la semana: ". $nameOfDay_x;

  $dateint = strtotime($dia_x);
  $mes = date("m", $dateint);
  $dia = date("d", $dateint);
  #echo 'Dia:'.$dia.'Mes:'.$mes"<br>";
  $dd_mm=$dia.'-'.$mes;
  #echo ", ".$dd_mm.", ";
  if($nameOfDay_x=='Sat' | $nameOfDay_x=='Sun' | in_array($dd_mm, $feriados) ){
    #echo "Es Sabado o Domingo o feriado, no se suma.";
  }else{
    $habil=$habil+1;
  }
}
return $habil;
}

 ?>
 <?php
 #Resultado de antiguedad
 $fechaActual = date("Y-m-d");
 $date1 = new DateTime($fila['ingreso']);
 $date2 = new DateTime($fechaActual);
 $diff = $date1->diff($date2);
 $antiguedad = $diff->y." ".'años';
 $antiguedad1 = $diff->m." ".'meses';
 $antiguedad2 = $diff->d." ".'dias';



 echo 'Su Antiguedad es:'.$antiguedad." ".$antiguedad1." ".$antiguedad2."<br><br>";
 $dias = "";
 #Dependiendo de la antiguedad se le asignan los dias que le corresponden
   if($antiguedad<=10){
   $dias = '10';
 }
   if(($antiguedad >=10) && ($antiguedad <=15)){
   $dias = '11';
 }
   if(($antiguedad >=15) && ($antiguedad <=20)){
   $dias = '12';
 }
   if(($antiguedad >=20) && ($antiguedad <=25)){
   $dias = '13';
 }
   if($antiguedad >= 25){
   $dias = '17';
 }
   echo 'De acuerdo con su Antiguedad le corresponden'." ".$dias." ".'Días'.'<br><br>';



 //echo 'De acuerdo con su Antiguedad le corresponden'." ".$dias." ".'Días'.'<br><br>';



 $result = $dias-$habil;
 //echo "Restan Días Habiles".$result."<br>";
 if($result !=''){}
 echo "<script> alert('Dias Habiles Correspondientes :"." ".$result."Días');</script>;";

 echo "Dias Habiles=".$habil;
 return $habil;
 //}

  ?>
