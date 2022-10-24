<?php include ('d_habiles.php');?>
<?php
include("conn/connect.php");
$con=conectar();
?>
<?php
if (isset($_POST['seleccion1']) && isset($_POST['seleccion2'])) {
  $FechaSalida = $_POST['seleccion1'];
  $FechaReanuda = $_POST['seleccion2'];
  #echo "<script type='text/javascript'>alert('$FechaSalida'+', '+'$FechaReanuda');</script>";


  if($FechaReanuda>$FechaSalida){
    echo d_habiles($FechaSalida, $FechaReanuda).", ";
    $numero = d_habiles($FechaSalida, $FechaReanuda);
    switch ($numero) {
      case '0':
        $numero = "Cero";
        break;
        case '1':
        $numero = 'Uno';
          break;
        case '2':
         $numero = 'Dos';
          break;
        case '3':
          $numero = 'Tres';
          break;
        case '4':
          $numero = 'Cuatro';
          break;
        case '5':
          $numero = 'Cinco';
          break;
        case '6':
          $numero = 'Seis';
          break;
        case '7':
          $numero = 'Siete';
          break;
        case '8':
          $numero =  'Ocho';
          break;
        case '9':
          $numero = 'Nueve';
          break;
        case '10':
          $numero = 'Diez';
          break;
        case '11':
          $numero = 'Once';
          break;
        case '12':
          $numero = 'Doce';
          break;
        case '13':
          $numero =  'Trece';
          break;
        case '14':
          $numero = 'Catorce';
          break;
        case '15':
          $numero =  'Quince';
          break;
        case '16':
          $numero = 'Dieciseis';
          break;
        case '17':
          $numero = 'Diecisiete';
          break;
      default:
        // code...
        break;
    }
echo $numero;

  }
}



?>
