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


$query = "SELECT *  FROM v_solicitudes WHERE id_expediente ='$q';";
$resultados=$connect->query($query);
$fila = $resultados->fetch_assoc();
 $total = mysqli_num_rows($resultados);


 if ($total >0) {




   echo "<table id='mytable_salida'>
<thead>
<tr>
<th>Número de Solicitud</th>
<th>Fecha de Solicitud</th>
<th>Año</th>
<th>Periodo</th>
<th>Fecha de Inicio</th>
<th>Fecha de Termino</th>
<th>Días Solicitados</th>
<th>Realizo Solicitud</th>
<th>Observaciones</th>
<th>Caratula</th>
<th>Acuse</th>
<th>Firma CDT</th>
<th>Firma GINP</th>
</tr>
</thead>
<tbody class='tableFixHead text-uppercase'>";

 do {
    echo "<tr>";
    echo "<td>".$fila["id"]."</td>";
    echo "<td>".$fila["f_solicitud"]."</td>";
    echo "<td>".$fila["periodo"]."</td>";
    echo "<td>".$fila["anio"]."</td>";
    echo "<td>".$fila["f_init"]."</td>";
    echo "<td>".$fila["f_reanudar"]."</td>";
    echo "<td>".$fila["d_solicitados"]."</td>";
    echo "<td>".$fila["p_registro"]."</td>";
    echo "<td>".$fila["observaciones"]."</td>";
    echo "<td>"."<a href='../php/formatovacaciones.php?id_expediente=".$fila['id_expediente']."&id=".$fila['id']."#toolbar=1' target='_blank'><img src=../img/caratula.png>"."</td>";
    echo "<td>"."<input type='checkbox' id='acuse' name='acuse[]'>"."</td>";
    echo "<td>"."<input type='checkbox' id='firmaCDT' name='firmaCDT[]'>"."</td>";
    echo "<td>"."<input type='checkbox' id='firmaGINP' name='firmaGINP[]'>"."</td>";
    echo "</tr>";
  } while ($fila=mysqli_fetch_assoc($resultados));



echo "  </tbody>
</table>";
mysqli_close($connect);




 }


?>
