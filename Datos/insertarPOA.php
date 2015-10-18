<?php
    //En este archivo se realizo mantenimiento por Alex Flores (IIIP - 2015)
    $maindir = "../";
    
    //Incluimos el contenido del archivo config.inc.php
    include $maindir.'conexion/config.inc.php';
    
    //Se obtienen los datos mediante POST desde pages/POA/POAs/index.php
    $titulo= $_POST['titulo'];
    $del= $_POST['inicio'];
    $al= $_POST['fin'];
    $observacion= $_POST['observacion'];
    
    //Se realiza la consulta a la base de datos
    $consulta   =   $db->prepare("CALL pa_insertar_poa(?,?,?,?)");
    $consulta   ->  execute(array($titulo,$del,$al,$observacion));

    if($consulta->rowCount() == 1){
        echo '<div class="alert alert-success" id="resultado">';
        echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
        echo '<strong>Exito! </strong>';
        echo 'Se ha creado un nuevo Plan Operativo Anual';
        echo '</div>';
    }else{
        echo '<div class="alert alert-danger" id="resultado">';
        echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
        echo '<strong>Error! </strong>';
        echo 'No se ha creado un nuevo Plan Operativo Anual';
        echo '</div>';
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