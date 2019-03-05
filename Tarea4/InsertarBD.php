<?php

if (isset($_POST))
{
  $conexion = mysqli_connect("localhost", "root", "","personas");
  $origen = $_POST["origen"];

if($origen==1){
  $nombre = $_POST["nombre"];
  $apellido1 = $_POST["Apellido_Primero"];
  $apellido2 = $_POST["Apellido_Segundo"];
  $cedula = $_POST["Cedula"];
  mysqli_query($conexion,"INSERT INTO persona(Nombre, Apellido1, Apellido2,Cedula)
  values('$nombre','$apellido1','$apellido2','$cedula')");
  echo "El Registro Fue Realizado";
}
if($origen==2){
  $nombre = $_POST["nombre"];
  $apellido1 = $_POST["Apellido_Primero"];
  $apellido2 = $_POST["Apellido_Segundo"];
  $cedula = $_POST["Cedula"];
  $id = $_POST["id"];
  mysqli_query($conexion,"UPDATE  persona set Nombre='$nombre', Apellido1='$apellido1', Apellido2='$apellido2',Cedula='$cedula' where id='$id'");
  echo "El Registro Fue Modificado";
}
if($origen==3){
  $id = $_POST["id"];
  mysqli_query($conexion,"DELETE from  persona where id='$id'");
  $datos = mysqli_query($conexion,"Select * From persona") or die(mysqli_error($conexion));
  ?>
  <table  id="Tabla-General" border="1">
                                     <tr>
                                         <th class="text-center">Nombre</th>
                                         <th class="text-center">Primer Apellido</th>
                                         <th class="text-center">Segundo apellido</th>
                                         <th class="text-center">Cedula</th>
                                         <th class="text-center">Editar</th>
                                         <th class="text-center">Eliminar</th>
                                     </tr>
                                     <?php
                                     while ($variable=mysqli_fetch_array($datos))
                                     {
                                         $nombre=$variable['Nombre'];
                                         $apellido1=$variable['Apellido1'];
                                         $apellido2=$variable['Apellido2'];
                                         $cedula=$variable['Cedula'];
                                         $id=$variable['id'];
                                         ?>
                                         <tr>
                                           <td><?php echo $nombre?></td>
                                           <td><?php echo $apellido1?></td>
                                           <td><?php echo $apellido2?></td>
                                           <td><?php echo $cedula?></td>
                                             <td class="text-center">
                                              <span title="Option" class="btn btn-xs btn-info" onclick=" location.href='EditarBD.php?ID=<?php echo $id?>'">Editar</span>
                                             </td>
                                             <td class="text-center">
                                              <span title="Option" class="btn btn-xs btn-info" onclick="eliminar('<?php echo $id?>')">Eliminar</span>
                                             </td>
                                             </tr>
                                             <?php
                                     }mysqli_free_result($datos); ?>
                                 </table>
<?php }
} ?>
