<?php require_once('../conn/connect.php'); ?>
  <?php
  if (isset($_POST['search'])) {

      //echo json_encode(array('resp' => 0));
      //echo "search:".$_POST['search'];
      $queryd1 = "SELECT * FROM empleados WHERE id_expediente =". $search;
      $resultadon=$connect->query($queryd1);
      $rown = $resultadon->fetch_row();
      $nOTsd1 = $rown[0];
      if($nOTsd1==0){
        echo "Folio CDT de SALIDA:".$_POST['search'];
        echo "\n";
        echo "es un NUEVO registro!";
      }else {
        echo "Folio CDT de SALIDA:".$_POST['search'];
        echo "\n";
        echo "Ya existe el registro!";
      }
    }
    ?>
