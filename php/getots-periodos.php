<?php require_once('../conn/connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    display: none;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
#$q="34334";
#echo "q: ".$q;


$query = "SELECT *  FROM empleados WHERE id_expediente ='$q';";
$resultados=$connect->query($query);
$fila = $resultados->fetch_assoc();
 $total = mysqli_num_rows($resultados);

 /*$query2 = "SELECT *  FROM V_solicitudes WHERE id_expediente ='$q';";
 $resultados2=$connect->query($query2);
 $fila2 = $resultados2->fetch_assoc();
  $total2 = mysqli_num_rows($resultados2);*/

$query2="SELECT * from v_solicitudes where anio=(select max(anio) from v_solicitudes) and periodo=(select max(periodo) from v_solicitudes) limit 1;";
$resultados2=$connect->query($query2);
$fila2 = $resultados2->fetch_assoc();
 $total2 = mysqli_num_rows($resultados2);


 echo $total."<br>";
 echo $total2."<br>";
 if ($total >0) {

   $fechaActual = date("Y-m-d");
   $date1 = new DateTime($fila['ingreso']);
   $date2 = new DateTime($fechaActual);
   $diff = $date1->diff($date2);
   $antiguedad = $diff->y . ' Años ';
   $antiguedad1 = $diff->m .' Meses';
   $antiguedad2 = $diff->d .' Días';

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

//Aqui solo se pide que se muestre el resultado mas recuiente a diferencia de getots_hpersonal donde le dice que muestre todos los resultados

   echo "<table id='mytable_salida'>
<tr>
<th>ColH</th>
</tr>";
    echo "<tr>";
    echo "<td>".$fila["ingreso"]."</td>";
    echo "<td>".$antiguedad." ".$antiguedad1." ".$antiguedad2."</td>";
    echo "<td>".$dias." ".'Días'."</td>";
    echo "<td>".$fila["d_descanso1"]." Y ".$fila["d_descanso2"]."</td>";
    echo "<td>".$fila["nombre"]. " ".$fila["paterno"]." ".$fila["materno"]."</td>";
    echo "<td>".$fila["categoria"]."</td>";
    echo "<td>".$fila2["anio"]."</td>";
    echo "<td>".$fila2["periodo"]."</td>";
    echo "<td>".$fila3["$total3"]."</td>";
      #echo "<td>".$fila3["$total3"]."</td>";
    echo "</tr>";
echo "</table>";
mysqli_close($connect);


 }
 $date1=new DateTime($fila['ingreso']);
 $date2=new DateTime($fechaActual);

 while ($date1 <= $date2) {
 	$result= date_add($date1,date_interval_create_from_date_string("6 month"));
 	#echo date_format($date1,"Y-m-d")."<br>";

 }


 echo "<table id='tabla_periodos'>
<tr>
<th>ColH</th>
</tr>";
echo "<tr>";
echo "<td>".$fila4["$result"]."</td>";



?>
