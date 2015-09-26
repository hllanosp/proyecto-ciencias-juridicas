
<?php

$maindir = "../../../";
include($maindir."conexion/config.inc.php");  
  

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  
  if(!isset( $_SESSION['user_id'] ))  {
    header('Location: '.$maindir.'login/logout.php?code=100');
    exit();
  }


  try{
    $no_cuenta = $_POST['no_cuenta'];

    $queryString = "DELETE FROM sa_estudiantes WHERE no_cuenta='".$no_cuenta."'";
    $query = mysql_query($queryString);

    if($query){
      $mensaje = "<strong>¡Éxito! </strong> Se ha eliminado al estudiante: ".$no_cuenta;
    }else{
      $mensaje = "<strong>¡Error! </strong> Error al eliminar al estudiante.";
      http_response_code(400);
    }
    
    echo $mensaje;
  }catch(PDOExecption $e){
    echo "<strong>¡Error! </strong> Error al eliminar.";
    http_response_code(500);
  }
?>