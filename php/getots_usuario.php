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
#$q = intval($_GET['q']);
$q="34";
echo "q: ".$q;


$query = "SELECT * FROM 'usuarios' WHERE Id='$q';";
$resultados=$connect->query($query);
$fila = $resultados->fetch_assoc();
 $total = mysqli_num_rows($resultados);


 if ($total >0) {




   echo "<table id='mytable_salida'>
<thead>
<tr>
<th>Nombre</th>
<th>Usuario</th>
<th>Contraseña</th>
<th>Area</th>
<th>Tipo de Cuenta</th>
<th>Registro</th>
<th>Fecha</th>
</tr>
</thead>
<tbody class='tableFixHead text-uppercase'>";

 do {
    echo "<tr>";
    echo "<td>".$fila["Nombre"]."</td>";
    echo "<td>".$fila["Usuario"]."</td>";
    echo "<td>".$fila["Password"]."</td>";
    echo "<td>".$fila["Area"]."</td>";
    echo "<td>".$fila["TipoDeCuenta"]."</td>";
    echo "<td>".$fila["Registro"]."</td>";
    echo "<td>".$fila["Fecha"]."</td>";
    #echo "<td>"."<a href='formatovacaciones.php?id_expediente=".$fila['id_expediente']."&id=".$fila['id']."#toolbar=1' target='_blank'><img src=../img/caratula.png>"."</td>";
    echo "</tr>";
  } while ($fila=mysqli_fetch_assoc($resultados));



echo "  </tbody>
</table>";
mysqli_close($connect);




 }


?>
