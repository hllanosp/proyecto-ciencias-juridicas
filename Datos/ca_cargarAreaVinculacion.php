<?php
include 'conexion.php';
$query = mysql_query("CALL SP_OBTENER_AREAS_VINCULACION(@pcMensajeError)", $enlace);
?>
  <!DOCTYPE html>
  <html lang="en">

  <body>
    <div class="box-body table-responsive">
      <table id="tabla_prioridad" class='table table-bordered table-striped'>
        <thead>
          <tr>
            <th>Código de Área</th>
            <th>Nombre Área</th>
            <th>Facultad</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysql_fetch_array($query))
          {
            $id = $row['codigo'];
        ?>
            <tr>
              <td>
                <?php echo $row['codigo'] ?>
              </td>
              <td>
                <?php echo $row['nombre'] ?>
              </td>
              <td>
                <?php echo $row['facultad'] ?>
              </td>
              <td>
                <a class="editaAreaVinculacion btn btn-info fa fa-pencil "></a>
                <a class="eliminaAreaVinculacion btn btn-danger fa fa-trash-o"></a>
              </td>

            </tr>
            <?php
                    }
                    ?>

        </tbody>
      </table>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#tabla_prioridad').dataTable({

          "order": [
            [0, "asc"]
          ],
          "destroy": true,
          "fnDrawCallback": function(oSettings) {

          }
        }); // example es el id de la tabla
      });
    </script>

    <!-- Script necesario para que la tabla se ajuste a el tamanio de la pag-->
    <script type="text/javascript">
      // For demo to fit into DataTables site builder...
      $('#tabla_prioridad')
        .removeClass('display')
        .addClass('table table-striped table-bordered');
    </script>
  </body>

  </html>
