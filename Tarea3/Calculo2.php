<?php

  $numero1= $_POST['V1'];
  $numero2= $_POST['V2'];
  $opera= $_POST['Operacion'];
  $resul= "";

  if ($opera == 'Sumar'){
   $resul = $numero1 + $numero2;
  }elseif ($opera == 'Restar') {
    $resul = $numero1 - $numero2;
  }elseif ($opera == 'Multiplicar') {
    $resul = $numero1 * $numero2;
  }elseif ($opera == 'Dividir') {
    $resul = $numero1 / $numero2;
  }else {
    $resul = "No hay operacion";
  }

?>
