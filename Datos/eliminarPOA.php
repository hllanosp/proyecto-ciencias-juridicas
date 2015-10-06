<?php
include '../Datos/conexion.php';

$id= $_POST['id'];
//echo $id;
$consulta=$conectar->prepare("CALL pa_eliminar_poa(?)");
$consulta->bind_param('i',$id);
$resultado=$consulta->execute();

if($resultado==1)
    {
    echo '<div id="resultado" class="alert alert-success">
        se ha elimanado con exito el Plan Operativo Anual
         
         </div>';
    
    }else{
         echo '<div id="resultado" class="alert alert-danger">
        No se pud ejecutar la accion de eliminar 
         
         </div>';
    }

include 'cargarPOAs.php';
?>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $("#resultado").fadeOut(1500);
    },3000);
	
});
</script>

