<?php

  $numero1= $_POST['V1'];
  $numero2= $_POST['V2'];
  $opera= $_POST['Operacion'];

  if ($opera == 'Sumar'){
    echo $numero1 + $numero2;
  }elseif ($opera == 'Restar') {
    echo $numero1 - $numero2;
  }elseif ($opera == 'Multiplicar') {
    echo $numero1 * $numero2;
  }elseif ($opera == 'Dividir') {
    echo $numero1 / $numero2;
  }else {
    echo "No hay operacion";
  }

?>
