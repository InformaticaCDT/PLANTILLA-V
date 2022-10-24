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
  $query="SELECT * FROM usuarios WHERE Id='".$_POST['search']."'";
  #echo "<br>query:".$query."<br><br>";


  $resultado = $connect->query($query);
  $fila = mysqli_fetch_assoc($resultado);//Se conserva
  $total = mysqli_num_rows($resultado);


  ?>

  <form role="form" name="actualizar-U" id="actualizar-U" method="POST" action="actualizar-U.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="recipient-name" class="control-label"><strongs>Id</strong></label>
        <input type="text" class="form-control" id="recipient-name" name="recipient-name" value="<?php echo $fila['Id']; ?>">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="recipient-name" class="control-label"><strongs>Usuario</strong></label>
      <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $fila['Usuario']; ?>">
    </div>
  </div>
</div>

  <div class="form-group">
    <label for="ingreso" class="control-label"><strong>Nombre:</strong></label>
    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $fila['Nombre']; ?>" style="text-transform: uppercase">
  </div>

  <div class="row">
    <div class="form-group col-md-4" >
      <label for="nombre" class="control-label"><strong>Contraseña:</strong></label>
      <input type="text" class="form-control" id=Password name="Password" value="<?php echo utf8_encode($fila['Password']); ?>">
    </div>

    <div class="form-group col-md-4">
      <label for="paterno" class="control-label"><strong>Area</strong></label>
      <input type="text" class="form-control" id="Area" name="Area" value="<?php echo utf8_encode($fila['Area']); ?>" style="text-transform: uppercase">
    </div>

    <div class="form-group col-md-4">
      <label for="materno" class="control-label"><strong>Dependencia</strong></label>
      <input type="text" class="form-control" id="dn" name="dn" value="<?php echo utf8_encode($fila['dn']); ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-12">
      <label for="categoria" class="control-label"><strong>Tipo de Cuenta</strong></label>
      <input type="text" class="form-control" id="TipoDeCuenta" name="TipoDeCuenta" value="<?php echo utf8_encode($fila['TipoDeCuenta']); ?>" style="text-transform: uppercase">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="calidad_laboral" class="control-label"><strong>Registro</strong></label>
      <input type="text" class="form-control" id="Registro" name="Registro" value="<?php echo utf8_encode($fila['Registro']); ?>" style="text-transform: uppercase">
    </div>
    <div class="form-group col-md-6">
      <label for="id_ads" class="control-label"><strong>Fecha</strong></label>
      <input type="datetime-local" class="form-control" id="Fecha" name="Fecha" value="<?php echo $fila['Fecha']; ?>">
    </div>


    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
  </div>

</body>

</html>
