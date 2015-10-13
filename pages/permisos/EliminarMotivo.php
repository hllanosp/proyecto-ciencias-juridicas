<?php
	
	$errores=array();
	$datos=array();
	$id;
    require_once("../../conexion/conn.php");
	
   //validar  parametro
	if(empty($_POST['Motivo_ID']))
		{ $errores['Motivo_ID']="se requiere especificar el id motivo";}
    else
		{$id=$_POST['Motivo_ID'];	}
	// generando respuesta
     if (empty($errores)) 
     {
     	$conexion = mysqli_connect($host, $username, $password, $dbname);
     	if ($conexion) {
     		$rec = mysqli_query($conexion, "SELECT * FROM `permisos` WHERE id_motivo='$id'");
     		if ($rec) 
     		{
                if (!$row = mysqli_fetch_array($rec))  
                  {
                  	$consultar= mysqli_query($conexion, "DELETE FROM `motivos` WHERE Motivo_ID='$id'")or die("Error " . mysqli_error($link));
                   if ($consultar) 
                        {
                     	mysqli_close($conexion);
                        $datos['exito']=true;
	                   $datos['mensaje']="transaccion exitosamente .....";
                        } 
                   else 
                       {
                     	 $datos['exito']=false;
     	                 $errores['ErrorEliminar']=mysql_error();
     	                 $datos['errores']=$errores;
                   	
                        }
 
 	              }
                   else
                       {
                         $datos['exito']=false;
     	                  $errores['motivorelacionado']="Motivo  no  se puede Eliminar";
     	                  $datos['errores']=$errores;

                        }

     			
     		}
     		 else 
     		 {
     		$datos['exito']=false;
     	    $errores['consultaservidor']=mysql_error();
     	    $datos['errores']=$errores;
     		}
     		
     		


     	} else {
     		$datos['exito']=false;

     	    $errores['Servido_Base']=mysql_error();
     	    $datos['errores']=$errores;
     	}
     	

	    
     }
     else
     {
         $datos['exito']=false;
         $datos['errores']=$errores;

     }

     // dark respuesta
       echo json_encode($datos);

	  

    


	
	



	
	

?>