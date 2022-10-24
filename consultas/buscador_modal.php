<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title></title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body id="page-top">

  <?php require_once('../conn/connect.php')?>
  <?php
  $query="SELECT * FROM empleados WHERE id_expediente='".$_POST['search']."'";
  #echo "<br>query:".$query."<br><br>";


  $resultado = $connect->query($query);
  $fila = mysqli_fetch_assoc($resultado);//Se conserva
  $total = mysqli_num_rows($resultado);


  ?>
  <form  name="actualizarT" id="../consultas/actualizarT" method="POST" action="../consultas/actualizar-T.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="recipient-name" class="control-label"><strongs>Expediente</strong></label>
        <input type="text" class="form-control" id="recipient-name" name="recipient-name" value="<?php echo $fila['id_expediente']; ?>">
      </div>

      <div class="form-group">
        <label for="ingreso" class="control-label"><strong>Ingreso</strong></label>
        <input type="date" class="form-control"  id="ingreso" name="ingreso" value="<?php echo $fila['ingreso']; ?>" style="text-transform: uppercase">
      </div>

      <div class="row">
        <label for="datospersonales" class="control-label"><strong>Datos Personales</strong></label>


      <!--<div class="row">-->
        <div class="form-group col-md-4" >
          <label for="nombre" class="control-label"><strong>Nombre (S)</strong></label>
          <input type="text" class="form-control"   id="nombre" name="nombre" value="<?php echo utf8_encode($fila['nombre']); ?>" style="text-transform: uppercase">
        </div>

        <div class="form-group col-md-4">
          <label for="paterno" class="control-label"><strong>Apellido Paterno</strong></label>
          <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo utf8_encode($fila['paterno']); ?>" style="text-transform: uppercase">
        </div>

        <div class="form-group col-md-4">
          <label for="materno" class="control-label"><strong>Apellido Materno</strong></label>
          <input type="text" class="form-control" id="materno" name="materno" value="<?php echo utf8_encode($fila['materno']); ?>" style="text-transform: uppercase">
        </div>
      </div>
<div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="categoria" class="control-label"><strong>Categoria</strong></label>
          <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo utf8_encode($fila['categoria']); ?>" style="text-transform: uppercase">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label for="calidad_laboral" class="control-label"><strong>Calidad Laboral</strong></label>
          <input type="text" class="form-control" id="calidad_laboral"  name="calidad_laboral" value="<?php echo utf8_encode($fila['calidad_laboral']); ?>" style="text-transform: uppercase">
        </div>
        <div class="form-group col-md-6">
          <label for="id_ads" class="control-label"><strong>Adscripción</strong></label>
          <input type="text" class="form-control" id="id_ads" name="id_ads" value="<?php echo $fila['id_ads']; ?>" style="text-transform: uppercase">
        </div>
      </div>

      <div class="row">
        <label for="d_descanso" class="control-label"><strong>Días de Descanso</strong></label>

        <div class="form-group col-md-6">
          <label for="d_descanso1" class="control-label">Primer Día</label>
          <input type="text" class="form-control" id="d_descanso1" name="d_descanso1"  value="<?php echo $fila['d_descanso1']; ?>" style="text-transform: uppercase">

        </div>
        <div class="form-group col-md-6">
          <label for="d_descanso2" class="control-label">Segundo Día</label>
          <input type="text" class="form-control" id="d_descanso2"  name="d_descanso2" value="<?php echo $fila['d_descanso2']; ?>" style="text-transform: uppercase">
        </div>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Actualizar</button>
      </div>

    </div><!--Termino del contenido modal-->
  </div>

</form>



</body>
</html>
