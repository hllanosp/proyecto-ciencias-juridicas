<?php
	//Se recibe el nuevo valor que se asignara al campo Nombre del registro seleccionado y se guarda en la base de datos
	$errores=array();
	$datos=array();
	$id;
	require_once("../../conexion/conn.php");
	if(empty($_POST['Edificio_ID']))
		{ $errores['Edificio_ID']="se requiere especificar el id Edificio_ID";}
    else
		{$id=$_POST['Edificio_ID'];	}
	 if (empty($errores)) 
     {
     	$conexion = mysqli_connect($host, $username, $password, $dbname);
     	if ($conexion) {
     		$rec = mysqli_query($conexion, "SELECT * FROM `permisos` WHERE id_Edificio_Registro='$id'");
     		if ($rec) 
     		{
                if (!$row = mysqli_fetch_array($rec))  
                  {
                  	$consultar= mysqli_query($conexion, "DELETE FROM `edificios` WHERE Edificio_ID='$id'")or die("Error " . mysqli_error($link));
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
     	                  $errores['motivorelacionado']="Edificio  no  se puede Eliminar";
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