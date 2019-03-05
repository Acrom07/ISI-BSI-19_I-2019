<?php
  $conexion = mysqli_connect("localhost", "root", "","personas");
  $datos = mysqli_query($conexion,"Select * From persona") or die(mysqli_error($conexion));
?>

<h1>Lista de Personas</h1>
<div id="marco">
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
</div>
                                <br>
                                <input id="Boton" type="button" value="Volver a Formulario" onclick="location.href='Formulario.html'"/><br><br>
                                <p id="Deliminados" style="margin-top:5px; text-align:left; color:black;"></p>

                                <script type="text/javascript">
                                function eliminar(id) {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                document.getElementById("marco").innerHTML = xhttp.responseText;
                                }
                                };
                                xhttp.open("POST", "InsertarBD.php", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("origen=3&id="+id);
                                //location.href = "ConsultarBD.php";
                                }
                                </script>
