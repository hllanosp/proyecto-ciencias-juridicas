<?php

require_once("../conexion/config.inc.php");

$pcIdentidadEstudiante=$_POST['id'];
/*
$consulta=$db->prepare("CALL SP_OBTENER_INFORMACION_ESTUDIANTE(?,@pcMensajeError)");
$consulta->bindParam(1, $pcIdentidadEstudiante, PDO::PARAM_STR);
$resultado=$consulta->execute();
*/
$consulta=$db->prepare("CALL SP_OBTENER_INFORMACION_ESTUDIANTE(?,@pcMensajeError)");
$consulta -> execute(array($pcIdentidadEstudiante));
$resultado = $consulta;
$error=null;



if($error==null){
    $linea=$resultado->fetch(PDO::FETCH_ASSOC);
$outp = "[";

    
    $outp .= '{"nombre":"'  . $linea['nombre'] . '",';
    $outp .= '"descripcion":"'   . $linea['tipo']        . '",';
    $outp .= '"existe":"1"';

$outp .="}]";
}
else
{    
  $outp = "[";
   
    $outp .= '{"nombre":"",';
    $outp .= '"descripcion":"",';
$outp .= '"existe":"0"';
$outp .="}]";  
  
}


echo($outp);




    

//echo($resultado)
?>
