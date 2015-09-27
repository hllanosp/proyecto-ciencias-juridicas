<?php

$maindir = "../../../";
include($maindir."conexion/config.inc.php");  

require_once($maindir."funciones/check_session.php");

require_once($maindir."funciones/timeout.php");
  
if(!isset( $_SESSION['user_id'] ))
{
  header('Location: '.$maindir.'login/logout.php?code=100');
  exit();
}

  try
  {
    $codigo = $_POST['codInstanciaA'];
    $stmt = $db->prepare("CALL SP_ELIMINAR_INSTANCIA_ACONDICIONAMIENTO(?,@mensajeError)");
	     //Introduccion de parametros
    $stmt->bindParam(1, $codigo, PDO::PARAM_STR);

    //echo $codigo . $nombre;
       
     $stmt->execute();
     $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
     //var_dump($output);
     $mensaje = $output['@mensajeError'];
     $codMensaje = 1;
      
    }catch(PDOExecption $e){
      $mensaje = 'Error al ingresar el registro o registro actualmente existente';
      $codMensaje = 0;
    }
    
    if($codMensaje == 1){
      echo '<div class="alert alert-danger alert-error">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong> El registro ha sido eliminado ..! </strong>'.$mensaje.'</div>';
    }else{
      echo '<div class="alert alert-danger alert-error">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong> Error! </strong>'.$mensaje.'</div>';
  }
?>