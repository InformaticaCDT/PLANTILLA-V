<?php
date_default_timezone_set('America/Mexico_City');
?>

<?php
function GenNLaborables($folio)
{
  #dia-mes no laborables: 01-enero, 03-febrero, 16-marzo, 01-mayo, 16-sept, 16-nov y 25-dic
  $dmNoLab=array('1-1', '7-2', '21-3', '1-5', '16-9', '21-11', '25-12', '14-4', '15-4', '5-5', '4-9', '2-11');
  $nDlab='0';

  $host="localhost";
  $user="root";
  $pass="";
  $db="folios_cdt";

  $connect=new mysqli($host, $user, $pass, $db) or die("error" . msqli_errno($connect));
  if($connect->connect_error){
    die("Conexión fallida: ".$connect->connect_error);
  }

  $consulta = "SELECT * FROM entradasua WHERE FolioCdt='$folio'";
  $resultado = $connect->query($consulta);
  $fila = mysqli_fetch_assoc($resultado);
  $total = mysqli_num_rows($resultado);
  if($total==0){
    #Sin resultados.
  }else {
    #Existe registro.
    $date1 = new DateTime($fila['FechaRecibido']);
    $date2 = new DateTime($fila['FechaRequerido']);
    $diff = $date1->diff($date2);
    $TiempoRestante = $diff->days . ' días ';#Intervalo

    #Inicializa arreglos.
    $arrDsem=[];#sin sabados y domingos
    $arrDsemLab=[];#sin sabados, domingos ni feriados
    for ($i=0; $i<=$TiempoRestante; $i++){
      $nds=date("N", strtotime($fila['FechaRecibido'] . ' +'.$i.' day'));//N:dia de la semana 1 es lunes, 7 es domingo.
      if($nds<=5){
        #Omite nds=6:sabado, y nds=7:domingo.
        $arrDsem[count($arrDsem)]=date("j-n", strtotime($fila['FechaRecibido'] . ' +'.$i.' day'));

        #Quita feriados
        if (!in_array(date("j-n", strtotime($fila['FechaRecibido'] . ' +'.$i.' day')), $dmNoLab)) {
          $arrDsemLab[count($arrDsemLab)]=date("j-n", strtotime($fila['FechaRecibido'] . ' +'.$i.' day'));
        } else {
          #echo "Es dia Feriado: ".date("j-n", strtotime($fila['FechaRecibido'] . ' +'.$i.' day'))."<br>";
        }
      }
    }
    $nDlab=strval(count($arrDsemLab))." días hábiles.";#Dias laborables
  }
  return $nDlab;
}
?>
