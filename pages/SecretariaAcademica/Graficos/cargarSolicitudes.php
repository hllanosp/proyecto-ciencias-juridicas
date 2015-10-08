


<?php
$mkdir = "../../../";
include($mkdir."Datos/conexion.php");

    /* Hacemos una consulta a la base de datos para obtener los datos de la tabla Ciudades. */
        $result = mysql_query('CALL SP_OBTENER_SOLICITUDES(@pcMensajeError)',$enlace);
        $json = array();
        $contadorIteracion = 0;


        while ($fila = mysql_fetch_array($result)) { 
            $json[$contadorIteracion] = array
                (
                "Codigo" => $fila["CODIGO"],
                "Estudiantes" => $fila["NOMBRE"],
                "Fecha" => $fila["FECHA_SOLICITUD"],
                "Observaciones" => $fila["OBSERVACIONES"],
                "Estado" => $fila["ESTADO"],
                "Dni_estudiante" => $fila["DNI_ESTUDIANTE"],
                "Tipo_solicitud" => $fila["TIPO_SOLICITUD"],
                "Himno" => $fila["APLICA_PARA_HIMNO"]
                );

            $contadorIteracion++;
        }

        //Retornamos el jason con todos los elmentos tomados de la base de datos.
        echo json_encode($json);
?>

