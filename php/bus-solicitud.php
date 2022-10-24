
<?php
require_once('../conn/connect.php');
$con=conectar();


$search = '';
$total = 0;


if (isset($_POST['search'])){
  $search = $_POST['search'];
  $consulta = "SELECT * FROM empleados WHERE id_expediente =". $search;
  //print($consulta);
}
  else {
  $consulta='';
  }


$resultado = $con->query($consulta);
$fila = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);

//print("total:".$total);

?>

							<?php if ($total>0) { ?>
							<h5>RESULTADOS: <?php echo $total; ?></h5>
								<table class="table table-bordered table-striped mb-0 table-wrapper-scroll-y my-custom-scrollbar">
								<thead>
									<tr>

                    <th bgcolor="#1d96b2">Nombre (s)</th>
                    <th bgcolor="#1d96b2">Apellido Paterno</th>
                    <th bgcolor="#1d96b2">Apellido Materno</th>
                    <th bgcolor="#1d96b2">Categoria</th>
                    <th bgcolor="#1d96b2">Adscripción</th>
                    <th bgcolor="#1d96b2">Fecha de Ingreso</th>
                    <th bgcolor="#1d96b2">Antigüedad</th>
                    <th bgcolor="#1d96b2">Días Habiles</th>
                    <th bgcolor="#1d96b2">Nueva SOLICITUD</th>

									</tr>
								</thead>
								<tbody>
                  <!--funcion para calcular la antiguedad-->
									<?php do { ?>
										<tr>
                      <?php
    									$fechaActual = date("Y-m-d");
  										$date1 = new DateTime($fila['ingreso']);
  										$date2 = new DateTime($fechaActual);
  										$diff = $date1->diff($date2);
                      $antiguedad = $diff->y . ' Años ';
                      $antiguedad1 = $diff->m .'Meses';
                      $antiguedad2 = $diff->d .'Días';
?>


											<td><?php echo $fila['nombre'];?></td>
											<td><?php echo $fila['paterno'];?></td>
											<td><?php echo $fila['materno'];?></td>
                      <td><?php echo $fila['categoria'];?></td>
                      <td><?php echo $fila['id_ads'];?></td>
                      <td><?php echo $fila['ingreso'];?></td>
                      <td><?php echo $antiguedad, $antiguedad1, $antiguedad2;?></td>
                      <td><?php echo calcularTiempo($fila['ingreso'],$fechaActual);?></td><!--la funcion es la formula y en el buscador se ingresan los valores.-->
                      <td><a href="do-solicitud.php?id=<?php echo $fila['id_expediente'] ?>" class="btn btn-info">Nueva Solicitud</a></td>

										</tr>

									<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
								<?php }
								elseif ($total>0 && $search=='') echo '';
								else echo '';
								?>
								</tbody>
							</table>
				</div><!--Fin form-group row entradas-->
			</div><!--Fin container-->
		</div><!--Fin entradas-->
