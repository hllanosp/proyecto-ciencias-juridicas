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
    $noCuenta = $_POST["noCuenta"];
    $dni = $_POST["dni"];
    $aniosEstudio = $_POST["aniosEstudio"];
    $indiceAcademico = $_POST["indiceAcademico"];
    $uvAcumulados = $_POST["uvAcumulados"];
    $planEstudio = $_POST["planEstudio"];
    $ciudadOrigen = $_POST["ciudadOrigen"];  
    $orientacion = $_POST["orientacion"];
    $residenciaActual = $_POST["residenciaActual"];  
    $tipoEstudiante = $_POST["tipoEstudiante"];
    $correo = $_POST["correo"]; 
    $mencion = $_POST["mencion"];
    $telefono = $_POST["telefono"];
    $primerNombre =  $_POST["primerNombre"];
    $segundoNombre = $_POST["segundoNombre"];
    $primerApellido = $_POST["primerApellido"];
    $segundoApellido = $_POST["segundoApellido"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $estadoCivil = $_POST["estadoCivil"];
    $nacionalidad = $_POST["nacionalidad"];
    $direccion = $_POST["direccion"];
    $sexo = $_POST["sexo"];

    // $queryString1 = "update sa_estudiantes set no_cuenta='".$noCuenta."',anios_estudio='".$aniosEstudio."',indice_academico='".$indiceAcademico."',uv_acumulados='".$uvAcumulados.",cod_plan_estudio='".$planEstudio."',cod_ciudad_origen='".$ciudadOrigen."',cod_orientacion='".$orientacion."',cod_residencia_actual='".$residenciaActual."' where dni='".$dni."' ";

    // $query1 = mysql_query($queryString1);


    $query1 = $db -> prepare('UPDATE `sa_estudiantes` SET `no_cuenta`=?,`anios_inicio_estudio`=?,`indice_academico`=?,`uv_acumulados`=?,`cod_plan_estudio`=?,`cod_ciudad_origen`=?,`cod_orientacion`=?,`cod_residencia_actual`=? WHERE `dni`=?');
    $query1 -> execute(array($noCuenta, $aniosEstudio, $indiceAcademico, $uvAcumulados, $planEstudio, $ciudadOrigen, $orientacion, $residenciaActual, $dni));

    $query2 = $db ->prepare('UPDATE sa_estudiantes_tipos_estudiantes  SET codigo_tipo_estudiante  = ? where dni_estudiante = ?');
    $query2 -> execute(array($tipoEstudiante, $dni));


    $query3 = $db ->prepare('UPDATE sa_estudiantes_menciones_honorificas  SET cod_mencion  = ? where dni_estudiante = ?');
    $query3 -> execute(array($mencion, $dni));

   
    if($query1 && $query2 && $query3){
      if(actualizarPersona($primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$fechaNacimiento,$estadoCivil,$nacionalidad,$direccion,$sexo,$correo,$dni,$telefono)){
        $mensaje = "<strong>¡Éxito! </strong> Se ha actualizado el estudiante.";
        http_response_code(200);  
      } else{
        $mensaje = "<strong>¡Error! </strong> Error al actualizar el estudiante1.";
        http_response_code(400);
      }
    }else{
      $mensaje = "<strong>¡Error! </strong> Error al actualizar el estudiante2.";
      http_response_code(400);
    }
    
    echo $mensaje;
  }catch(PDOExecption $e){
    $mensaje = "<strong>¡Error! </strong> Error al actualizar3.";
    $codMensaje = 0;
    echo $mensaje;
    http_response_code(500);
  }

  function actualizarPersona($primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$fechaNacimiento,$estadoCivil,$nacionalidad,$direccion,$sexo,$correo,$dni,$telefono){
    $queryString = "UPDATE persona SET primer_nombre='".$primerNombre."',segundo_nombre='".$segundoNombre."',primer_apellido='".$primerApellido.
                    "',segundo_apellido='".$segundoApellido."',fecha_nacimiento='".$fechaNacimiento."',estado_civil='".$estadoCivil."',nacionalidad='".$nacionalidad.
                    "',direccion='".$direccion."',sexo='".$sexo."',correo_electronico='".$correo."' WHERE N_Identidad='".$dni."'";
    $query = mysql_query($queryString);
    return $query && actualizarTelefono($telefono,$dni);
  }

  function actualizarTelefono($telefono, $dni){
    $queryString = "UPDATE telefono SET Numero='".$telefono."' WHERE N_Identidad='".$dni."'";
    $query = mysql_query($queryString);
    return $query;
  }


?>