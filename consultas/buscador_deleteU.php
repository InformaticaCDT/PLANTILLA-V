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
  $query="SELECT * FROM empleados WHERE Id='".$_POST['search']."'";
  #echo "<br>query:".$query."<br><br>";


  $resultado = $connect->query($query);
  $fila = mysqli_fetch_assoc($resultado);//Se conserva
  $total = mysqli_num_rows($resultado);


  ?>
  <form  name="borrar-U" id="borrar-U" method="POST" action="deleteT.php" enctype="multipart/form-data">

    <div class="form-group col-md-12">
      <center><label for="materno" class="control-label"><strong>¿Esta seguro de que desea eliminar permanentemente el Usuario Seleccionado? </strong></label></center>
    </div>
      <div class="row">
        <div class="form-group col-md-4" >
      <input type="text"  style="border: 2px solid white;" class="form-control" id="recipient-name" name="recipient-name" value="<?php echo $fila['Id']; ?>">
    </div>
    <div class="form-group col-md-8" >
      <input type="text"  style=" border: 2px solid white;" class="form-control" id="datos" name="datos" value="<?php echo utf8_encode($fila['Nombre']); ?>">
    </div>
      </div>
    </div>

    <!--<div class="form-group col-md-12">
      <center><label for="materno" class="control-label"><strong>¿Esta seguro de que desea eliminar permanentemente el Personal Seleccionado? </strong></label></center>
      <input type="text" class="form-control" id="materno" name="materno" value="<php echo utf8_encode($fila['materno']); ?>" style="text-transform: uppercase">-->


  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </div>

</div><!--Termino del contenido modal-->
</div>

</form>



</body>
</html>
