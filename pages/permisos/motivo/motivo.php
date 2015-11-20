<?php

$maindir = "../../../";
 
if(isset($_GET['contenido']))
    {
      $contenido = $_GET['contenido'];
    }
  else
    {
      $contenido = 'permisos';
    }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  
   if(!isset( $_SESSION['user_id'] ))
  {
    header('Location: '.$maindir.'login/logout.php?code=100');
    exit();
  }
  
?>

<?php
require($maindir."conexion/config.inc.php");
$sql="SELECT * from motivos";
$rec =$db->prepare($sql);
$rec->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	
</head>

<body>
 

   <?php

   if(isset($_GET['errores']))
   {
       $accion = $_GET['errores'];
        switch ($accion) 
        {
            case 0:
                error_print(0);
                break;
            case 1:
                error_print(1);
                break;
            case 2:
                error_print(2);
                break;
            case 3:
                error_print(3);
                break;
            case 4:
                error_print(4);
                break;
            case 5:
                error_print(5);
                break;
            default:
                break;
        }
   }
   
   function error_print($error_code)
   {
       $mensaje = "";
       switch ($error_code) {
             
            case 1:
                $mensaje = "Exitosamente transaccion...........";
                echo '<div class="alert alert-success alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong> Success! </strong>'.$mensaje.'</div>';


                break;
            case 2:
                $mensaje = "No se puede Eliminar estad relacionado con un permiso ..................... ";
                echo '<div class="alert alert-danger alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong> Error! </strong>'.$mensaje.'</div>';
                break;
            case 3:
                $mensaje = "Error al Eliminar........................";
                echo '<div class="alert alert-danger alert-error">
               <a href="#" class="close" data-dismiss="alert">&times;</a>
               <strong> Error! </strong>'.$mensaje.'</div>';
                break;
            case 4:
                $mensaje = " Se  necesita el id Motivo vacio";
                echo '<div class="alert alert-danger alert-error">
               <a href="#" class="close" data-dismiss="alert">&times;</a>
               <strong> Error! </strong>'.$mensaje.'</div>';


                break;
                case 5:
                $mensaje = " No se puede Editar error servidor";
                echo '<div class="alert alert-danger alert-error">
               <a href="#" class="close" data-dismiss="alert">&times;</a>
               <strong> Error! </strong>'.$mensaje.'</div>';


                break;
            
                
            default:
                break;
        }
        
   }

?>
<div id="proceso">
</div>

   

	<div id="wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Motivos</h1>
                </div>
                <!-- /.col-lg-12 -->
			</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Llene los campos con la información solicitada
                        </div>
						<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#", method="GET">
									
                                        <div class="form-group">
                                            <label>Motivo</label>
                                            <input type="text" class="form-control"  onkeypress="return soloLetras(event)"  id ="motivo" name="motivo" onpaste="return false">
                                        </div>
										
                                        <button id = "guardar" class="guardarMotivo btn btn-default">Agregar</button>
										
                                        <button type="reset" class="btn btn-default">Cancelar</button><br><br>
										
									<?php
              
                   echo <<<HTML
                                    <table id="tabla_Motivos" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th style='display:none'><strong>ID Motivo</strong></th>
                                             <th><strong>Descripci&#243;n Motivo</strong></th>
                                             <th><strong>Editar</strong></th>
                                             <th><strong>Eliminar</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
HTML;

               while ($row = $rec->fetch() ) {

				$idM = $row['Motivo_ID'];
				$dmotivo = $row['descripcion'];
            
            
                echo "<tr   data-id='".$idM."'>";
                echo <<<HTML
                <td style='display:none' >$idM</td>

HTML;
                
                echo <<<HTML
				
                <td>   $dmotivo </td>
				
				<td><center>
                    <a class="open-Modal btn btn-primary" data-toggle="modal" data-id=$idM data-target="#compose-modal"><i class="fa fa-edit"></i></a>
                    
                </center></td>
                <td><center>
                    
                    <a class="open-Modal-Eliminar btn btn-danger"  data-toggle="modal" data-idEliminar=$idM data-target="#Eliminar-modal" ><i class="fa fa-trash-o"></i></a>
                </center></td>
 

HTML;
                echo "</tr>";

            }

                   echo <<<HTML
                                       
									</table>
HTML;
             
               ?>
									
									
									</form>
								</div>
							</div>
						</div>
					</div>					
				</div>						
			</div>							
	</div>
 
 
	
 <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	  <form role="form" id="form" name="form" action="#">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i>Editando Motivo</h4>
      </div>
              <div class="modal-body">
                  <div class="form-group">
                      <div class="input-group">
                              <div class="input-group">
								  <input id="codmotivo" type="hidden" class="form-control" value = ""  required>
                                  <input id="descripcionm" type="text" onpaste="return false" onkeypress="return soloLetras(event)" class="form-control" placeholder="Descripci&#243;n de motivo"    required>
                                  <span class="input-group-btn">
									<button id="editaM" data-dismiss="modal" class="edita btn btn-danger glyphicon glyphicon-edit"> </button>                                      
                                  </span>
                              </div>
                           
                        
                      </div>   
                       
                  </div>
                  
              </div>
        
                    
          </form>
    
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> 


<div class="modal fade" id="Eliminar-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 style="font-size:large;" class="modal-title">Confirmacion</h4>
      </div>
      <div  class="modal-body">

        <p style='display:none' id="codigo"></p>
        <center><p style="font-size:large;"  id="informacion"></p></center>
        
       
        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="button-Eliminar"type="button" data-dismiss="modal" class="btn btn-danger ">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).on("click",".open-Modal", function () {
	id = $(this).parents("tr").find("td").eq(0).html();
	var myDNI = $(this).data('id');
	$(".modal-body #codmotivo").val(myDNI);


});
$(document).on("click",".open-Modal-Eliminar",function(){
  var id=$(this).parents("tr").find("td").eq(0).html();
$('#Eliminar-modal #codigo').text(id);
 var descripcion= $(this).parents("tr").find("td").eq(1).html();
  var d = " Desea Eliminar "+descripcion;
$('#Eliminar-modal #informacion').text(d);




});
			
 var id;
 var data;
 var x;
 x=$(document);
 x.ready(inicio);
 
    function inicio(){
        var x;
        x=$("#guardar");
        x.click(consulta);
        
       var x;
        x=$("#editaM");
        x.click(editarMotivo);
        var x;
      
        x=$("#button-Eliminar");
        x.click(FeliminarMotivo);
        
        
      

	}
  function FeliminarMotivo()
  {   $ID=$('#Eliminar-modal #codigo').text();
    var dat={'Motivo_ID':$ID};
  //$("#contenedor").load('pages/permisos/EliminarMotivo.php',dat);
  $.ajax({
                data:  dat,
                url:   'pages/permisos/motivo/EliminarMotivo.php',
                type:  'post',
                dataType:'html',
                timeout:4000,
                beforeSend: function () {
                $(".alert").remove();
                var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>"cargando .............."</div>';
                $("#proceso").append(me);
                
                        
                },
                success:  function (response) {
                 
                $("#contenedor").empty();
                 $dato=response.trim();
                 $("#contenedor").load('pages/permisos/motivo/motivo.php?errores='+$dato); 
                     

                         
                },
                error : function(result) {
                   $(".alert").remove();
                  var me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+result.status + ' ' + result.statusText+'</strong></div>';
                  $("#proceso").append(me);
        
    }
 
    
        });
  
                    
     
    
  }
  function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
 
 

	
	function consulta() {
            var dmotivo=$("#motivo").val(); 
			       data ={ dmotivo:$("#motivo").val()};
               $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/motivo/insertarMotivos.php", 
                beforeSend:function()
                {

                 $(".alert").remove();
                var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>"cargando .............."</div>';
                $("#proceso").append(me); 

                },
                success:function(response)
                {
                  $("#contenedor").empty();
                  $dato=response.trim();
                  $("#contenedor").load('pages/permisos/motivo/motivo.php?errores='+$dato); 
                  
                },
			        	data:data,
                timeout:4000,
                error:function(result){  
                $(".alert").remove();
                 var me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong> '+ result.status + ' ' + result.statusText+'</strong></div>';
                $("#proceso").append(me);
          }
            }); 
			   
            return false;
    }
	
	function editarMotivo(){
		    
			data = {Motivo_ID:$('#codmotivo').val(),dmotivo:$('#descripcionm').val()};
      
			$.ajax({
				async:true,
				type: "POST",
				dataType: "html",
				data:data,
				contentType: "application/x-www-form-urlencoded",
				url:"pages/permisos/motivo/editarMotivos.php",
        timeout:4000,     
				beforeSend:function()
        {  
           
        $(".alert").remove();
        var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>"cargando .............."</div>';
        $("#proceso").append(me); 

         
        },
				success:function(response)
        {
        $("#contenedor").empty();
        $dato=response.trim();
        $("#contenedor").load('pages/permisos/motivo/motivo.php?errores='+$dato); 
            
        },

				
				error:function(result){
        $(".alert").remove();
         var me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong> Error'+result.status + ' ' + result.statusText+'</strong></div>';
        $("#proceso").append(me);

      }
			});
			
		
	}

	
	
   
	


</script>

	
</body>

</html>	