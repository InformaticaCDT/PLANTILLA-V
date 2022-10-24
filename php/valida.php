<?php require_once('../conn/connect.php') ?>
<?php
session_start();
  $Usuario=$_POST['Usuario'];
  $Password=$_POST['Password'];


	$query = "SELECT * FROM usuarios WHERE Usuario='$Usuario' AND Password=md5('$Password')";
	$resultado=$connect->query($query);

	$resultados=$connect->query($query);
	$rows = $resultados->fetch_assoc();
	$Usuario = $rows["Usuario"];


	if ($row = $resultado->fetch_row())
		{
      $_SESSION['Usuario']=$row['Usuario'];
      echo "success";
		}
		else{
			echo "failed";
	}


?>
