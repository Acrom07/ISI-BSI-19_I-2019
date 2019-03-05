<?php
 $id = $_REQUEST['ID'];
$conexion = mysqli_connect("localhost", "root", "","personas");
$datos = mysqli_query($conexion,"Select * From persona where id='$id'") or die(mysqli_error($conexion));
$aux = $datos->fetch_assoc();
$nombre = $aux['Nombre'];
$apellido1 = $aux['Apellido1'];
$apellido2 = $aux['Apellido2'];
$cedula = $aux['Cedula'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario Personas</title>
  </head>
  <body>
    <form class="Caja" action="ConsultarBD.php" method="post">
      <h1>Formulario Personas</h1>
      <input id="Val1" type="text" name="Enom"  placeholder="Nombre" value="<?php echo $nombre;?>"><br><br>
      <input id="Val2" type="text" name="Eape1"  placeholder="Primer Apellido" value="<?php echo $apellido1;?>"><br><br>
      <input id="Val3" type="text" name="Eape2"  placeholder="Segundo Apellido" value="<?php echo $apellido2;?>"><br><br>
      <input id="Val4" type="number" name="Eced"  placeholder="Cedula" value="<?php echo $cedula;?>"><br><br>
      <input id="Boton" type="button" value="Editar" onclick="ValidaEnviar();"/> <input id="" type="button" value="Volver a Consulta" onclick="location.href='ConsultarBD.php'"/><br><br>
      <p id="Validar" style="margin-top:5px; text-align:left; color:black;">Resultado</p>
      <p id="Denviados" style="margin-top:5px; text-align:left; color:black;"></p>
    </form>

    <script type="text/javascript">
    function ValidaEnviar(){
      var Nom = document.getElementById("Val1").value;
      var Ape1 = document.getElementById("Val2").value;
      var Ape2 = document.getElementById("Val3").value;
      var Ced = document.getElementById("Val4").value;
      const ValidaTex = {
        "Vnom": /^[a-zA-Z]{4,15}$/,
        "Vape1": /^[a-zA-Z]{4,20}$/,
        "Vape2": /^[a-zA-Z]{4,20}$/,
        "Vced": /^\d{9,12}$/
        }
        if (ValidaTex.Vnom.test(Nom)==false) {
        document.getElementById('Validar').innerHTML = "El Formato de Nombre es incorrecto";
        }else if (ValidaTex.Vape1.test(Ape1)==false) {
        document.getElementById('Validar').innerHTML = "El Formato de Primer Apellido es incorrecto";
        }else if (ValidaTex.Vape2.test(Ape2)==false) {
        document.getElementById('Validar').innerHTML = "El Formato de Segundo Apellido es incorrecto";
        }else if (ValidaTex.Vced.test(Ced)==false) {
        document.getElementById('Validar').innerHTML = "El Formato de Cedula es incorrecto";
        }
        else {
          document.getElementById('Validar').innerHTML = "El registro se edito con exito";
          envios(Nom, Ape1,Ape2, Ced);
        }
      }

      function envios(Nom, Ape1,Ape2, Ced) {
      var xhttp = new XMLHttpRequest();
      var id = '<?php echo $id ?>';
      xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("Denviados").innerHTML = xhttp.responseText;
      }
      };
      xhttp.open("POST", "InsertarBD.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("nombre="+Nom+"&Apellido_Primero="+Ape1+"&Apellido_Segundo="+Ape2+"&Cedula="+Ced+"&origen=2&id="+id);
      }

    </script>


  </body>
</html>
