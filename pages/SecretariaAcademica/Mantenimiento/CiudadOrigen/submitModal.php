<?php  
$mkdir = "../../../../";
include($mkdir."conexion/config.inc.php");
    $id = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    try{
        $sql = "CALL SP_ACTUALIZAR_CIUDAD(?,?,@mensajeError)";
        $query1 = $db->prepare($sql);
        $query1->bindParam(1,$nombre,PDO::PARAM_STR);
        $query1->bindParam(2,$id,PDO::PARAM_STR);

        $query1->execute();

        $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
        $mensaje = $output['@mensajeError'];
        if(is_null($mensaje)){
        echo '<div class="alert alert-success alert-succes">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> Exito! </strong>'.$mensaje.'</div>';
        }else{
            echo '<div class="alert alert-danger alert-error">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> Error! </strong>'.$mensaje.'</div>';
        }


    }catch(PDOExecption $e){
        echo '<div class="alert alert-danger alert-error">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> Error! </strong>'.$mensaje.'</div>';
    }
    

?>