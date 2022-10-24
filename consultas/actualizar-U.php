<?php require_once('../conn/connect.php')?>
<?php
$Id=$_POST['recipient-name'];
echo "Id ".$Id."<br>";
$Nombre=strtoupper($_POST['Nombre']);
echo "Nombre ".$Nombre."<br>";
$Usuario=strtoupper($_POST['usuario']);
echo "Usuario ".$Usuario."<br>";
$Password=strtoupper($_POST['Password']);
echo "Contraseña ".$Password."<br>";
$Area=strtoupper($_POST['Area']);
echo "Area ".$Area."<br>";
$dn=strtoupper($_POST['dn']);
echo "Dn ".$dn."<br>";
$TipoDeCuenta=strtoupper($_POST['TipoDeCuenta']);
echo "Tipo de Cuenta ".$TipoDeCuenta."<br>";
$Registro=strtoupper($_POST['Registro']);
echo "Registro ".$Registro."<br>";


$sql="UPDATE usuarios SET Id='$Id', Nombre='$Nombre', Usuario='$Usuario', Password=md5('$Password'), Area='$Area', dn='$dn', TipoDeCuenta='$TipoDeCuenta' WHERE Id='".$Id."'";



  echo "<br>".$sql."<br>";

  $resultado = mysqli_query($connect, $sql);
  if (!$resultado) {
    echo "Error al actualizar sus datos";
  } else {
    echo "Se actualizaron sus datos correctamente";
  }
  mysqli_close($connect);
header('Refresh:0; url=RegistroUsuarios.html.');

?>
