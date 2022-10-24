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
$q = intval($_GET['q']);
#$q="34334";
#echo "q: ".$q;


$query = "SELECT *  FROM empleados WHERE id_expediente ='$q';";
$resultados=$connect->query($query);
$fila = $resultados->fetch_assoc();
 $total = mysqli_num_rows($resultados);


 if ($total >0) {




   echo "<table id='mytable_salida'>
<thead>
<tr>
<th>Num. Expediente</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Fecha de Ingreso</th>
<th>Categoria</th>
<th>Calidad Laboral</th>
<th>Día de Descanso 1</th>
<th>Día de Descanso 2</th>
<th>Adscripción</th>
<th>Usuario</th>
<th>Actualizar</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody class='tableFixHead text-uppercase'>";

 do {
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
  } while ($fila=mysqli_fetch_assoc($resultados));



echo "  </tbody>
</table>";
mysqli_close($connect);




 }


?>
