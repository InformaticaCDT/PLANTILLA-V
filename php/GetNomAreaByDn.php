<?php
function GetNomAreaByDn($Dna) {
  switch ($Dna) {
    case "d1":
    $areaCdtDn="ANALISIS OPERATIVO";
    break;
    case "d5":
    $areaCdtDn="DIFUSION";
    break;
    case "d6":
    $areaCdtDn="IDP Y MANUFACTURA";
    break;
    case "d7":
    $areaCdtDn="LEDA";
    break;
    case "d8":
    $areaCdtDn="PROJECT MANAGER";
    break;
    case "d9":
    $areaCdtDn="TELEMANDO";
    break;
    case "d10":
    $areaCdtDn="TETRA";
    break;
    case "d11":
    $areaCdtDn="UNIDAD ADMINISTRATIVA";
    break;
  }
  return $areaCdtDn;
}
?>
