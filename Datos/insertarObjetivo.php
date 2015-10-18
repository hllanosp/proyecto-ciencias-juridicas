<?php
    //En este archivo se realizo mantenimiento por Alex Flores (IIIP - 2015)
    $maindir = '../';
    
    //Incluimos el contenido del archivo config.inc.php
    include $maindir.'conexion/config.inc.php';
    
    //Se obtienen los datos mediante POST desde pages/POA/POAs/index.php
    $def = $_POST['def'];
    $area = $_POST['area'];
    $tipArea = $_POST['tipArea'];
    $res = $_POST['res'];
    $idPOA = $_POST['id'];
    
    //Se inserta el nuevo objetivo
    $consulta   =   $db ->  prepare("CALL pa_insertar_objetivos_institucionales(?,?,?,?,?)");
    $consulta-> execute(array($def, $area, $res, $tipArea, $idPOA));

    if ($consulta->rowCount() == 1) {
        echo '<div class="alert alert-success" id="resultado">';
        echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
        echo '<strong>Exito! </strong>';
        echo 'Se ha creado un nuevo Objetivo Institucional';
        echo '</div>';
    }else {
        echo '<div class="alert alert-danger" id="resultado">';
        echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
        echo '<strong>Error! </strong>';
        echo 'No se ha creado un nuevo Objetivo Institucional';
        echo '</div>';
    }
    include 'cargarObjetivos.php';
?>

<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $("#resultado").fadeOut(1500);
        }, 3000);

    });
</script>