<?php
$mkdir = "../../../";
include($mkdir."conexion/config.inc.php");
//ejecutamos la consulta con ayuda del archivo conexion.php que se encuentra arriba
            $query  = $db->prepare('CALL SP_OBTENER_SOLICITUDES(@pcMensajeError)');
            $query->execute();
            $result1 = $query->fetchAll();
              foreach($result1 as $row)
              {
               echo "<tr>
                       <td><center> $row[CODIGO] </td></center>
                       <td><center> $row[NOMBRE] </td></center>
                       <td><center> $row[FECHA_SOLICITUD]</td></center>
						<td><center> $row[OBSERVACIONES]</td></center>
						<td><center> $row[ESTADO]</td></center>
						<td><center> $row[DNI_ESTUDIANTE]</td></center>
						<td><center> $row[TIPO_SOLICITUD]</td></center>
						<td><center> $row[APLICA_PARA_HIMNO]</td></center>

                   	</tr>";
              }
?>

