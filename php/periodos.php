<?php

$fechaActual = date("Y-m-d");
$fechaingreso = "02-06-2020";

$date1 = new DateTime($fechaingreso);
$date2 = new DateTime($fechaActual);
$diff = $date1->diff($date2);
$antiguedad = $diff->y . ' Años ';
$antiguedad1 = $diff->m .' Meses';
$antiguedad2 = $diff->d .' Días';
 echo $antiguedad." ".$antiguedad1." ".$antiguedad2."<br>";
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


 ?>
