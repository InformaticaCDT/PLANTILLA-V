<?php require_once('../conn/connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    /*display: none;*/
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
$q = intval($_POST['q']);
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

$query3="SELECT sum(d_solicitados) from v_solicitudes where anio=(select max(anio) from v_solicitudes) and periodo=(select max(periodo) from v_solicitudes);";
$resultados3=$connect->query($query3);
$fila3 = $resultados3->fetch_assoc();
 $total3 = mysqli_num_rows($resultados3);

 #echo $total."<br>";
 #echo $total2."<br>";
 if ($total >0) {


   echo "<table id='mytable_salida'>
<tr>
<th>ColH</th>
</tr>";
    echo "<tr>";
    echo "<td>".$fila["id_expediente"]."</td>";
    echo "<td>".$fila["nombre"]."</td>";
    echo "<td>".$fila["paterno"]."</td>";
    echo "<td>".$fila["materno"]."</td>";
    echo "<td>".$fila["ingreso"]."</td>";
    echo "<td>".$fila["categoria"]."</td>";
    echo "<td>".$fila["calidad_laboral"]."</td>";
    echo "<td>".$fila["d_descanso1"]."</td>";
    echo "<td>".$fila["d_descanso2"]."</td>";
    echo "<td>".$fila["id_ads"]."</td>";




    echo "</tr>";
echo "</table>";
mysqli_close($connect);




 }


?>
