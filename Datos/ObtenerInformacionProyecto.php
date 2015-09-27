<?php
require_once("conexion.php");
$opcion=$_POST['opcion'];

switch ($opcion)
{
    case 1:
    {
                $consulta="CALL SP_OBTENER_AREAS_POYECTO(@pcMensajeError)";
        $resultado=  mysqli_query($conectar, $consulta);
        
        $result=mysqli_query($conectar,'select @pcMensajeError');
        $error=null;
        if($result){        
            $pcMensajeError=mysqli_fetch_array($result);
            $error=$pcMensajeError[0];    
        }

        if($error==null){
            
            $json = array();
            $interacion = 0;

	WHILE($linea=mysqli_fetch_array($resultado))
	{
	    $json[$interacion] = array
        	(                
	            "codigo" => $linea["codigo"],
        	    "nombre" => $linea["nombre"]
	        );
    
    	    $interacion++;
	}
	 echo json_encode($json);
//        echo '[{"codigo":"1","nombre":"AREA1"},{"codigo":"2","nombre":"AREA2"}]';
        }
        else
        {
          echo '<div id="resultado" class="alert alert-danger">
            ' . $error . '</div>';

        }  
        break;
    }
    case 2:
    {
        $consulta="CALL SP_OBTENER_AREAS_VINCULACIONES(@pcMensajeError)";
        $resultado=  mysqli_query($conectar, $consulta);
        
        $result=mysqli_query($conectar,'select @pcMensajeError');
        $error=null;
        if($result){        
            $pcMensajeError=mysqli_fetch_array($result);
            $error=$pcMensajeError[0]; 
        }

        if($error==null){   
            $json = array();
            $interacion = 0;

            WHILE($linea=mysqli_fetch_array($resultado))
            {
                $json[$interacion] = array
                    (                
                        "codigo" => $linea["codigo"],
                        "nombre" => $linea["nombre"]
                    );

                $interacion++;
            }
             echo json_encode($json);
        }
        else
        {
          echo '<div id="resultado" class="alert alert-danger">
            ' . $error . '</div>';

        }  
        break;        
    }   
    
    }
?>

