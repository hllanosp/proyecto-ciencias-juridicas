<?php

$maindir = "../../";
 
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
require("../../conexion/config.inc.php");
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
                                            <input type="text" class="form-control"  id ="motivo" name="motivo" onpaste="return false">
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
                                  <input id="descripcionm" type="text" onpaste="return false"  class="form-control" placeholder="Descripci&#243;n de motivo"    required>
                                  <span class="input-group-btn">
									<button id="editaM" class="edita btn btn-danger glyphicon glyphicon-edit"> </button>


                                      <!--<button id="guardarJ" class="guardarJ btn btn-primary" type="button">Finalizar</button>-->
                                  </span>
                              </div>
                           
                        
                      </div>   
                       
                  </div>
                  
              </div>
           <!--  <div class="modal-footer clearfix">
            <button name="submit" id="submit" class="insertarbg btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i> Insertar</button>
          </div>
           -->
                
                    
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
                url:   'pages/permisos/EliminarMotivo.php',
                type:  'post',
                dataType:'json',
                beforeSend: function () {
                        $("#contenedor").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        if(response.exito)
                        {

                          alert(response.mensaje);

                        }
                        else
                        {
                          if(response.errores.Motivo_ID)
                          {
                            alert(response.errores.Motivo_ID);
                          }
                          
                          if(response.errores.motivorelacionado)
                          {
                            alert(response.errores.motivorelacionado);
                          }
                          if(response.errores.ErrorEliminar)
                          {
                            alert(response.errores.ErrorEliminar);
                          }  
                        }
                        
                          $("#contenedor").load('pages/permisos/motivo.php');
                },
                error : function(xhr, status) {
                  $("#contenedor").html("error");
        
    }
 
    
        });
  
                    
     
    
  }
 
 

	
	function consulta() {
            var dmotivo=$("#motivo").val(); 
			var patron = /[0-9]/;
			if(dmotivo != '' && !(patron.test(dmotivo))){
            //alert(dmotivo);
               data ={ dmotivo:$("#motivo").val()};
               $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/insertarMotivos.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardar,
				data:data,
                timeout:4000,
                error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
            }); 
			}else{alert('El campo esta vacio ó contiene numeros');}
            return false;
    }
	
	function editarMotivo(){
		//var id = $(this).parents("tr").find("td").eq(0).html();
		var respuesta=confirm("¿Esta seguro de que desea cambiar el registro seleccionado?");
        if (respuesta){  
			data = {Motivo_ID:$('#codmotivo').val(),dmotivo:$('#descripcionm').val()};
			$.ajax({
				async:true,
				type: "GET",
				dataType: "html",
				data:data,
				contentType: "application/x-www-form-urlencoded",
				url:"pages/permisos/editarMotivos.php",     
				beforeSend:inicioEnvio,
				success:llegadaEditarMotivo,

				//timeout:4000,
				error:problemas
			});
			return false;
		}
	}

	
	function inicioEnvio(){
    var x=$("#contenedor");
    x.html('Cargando...');
	}
	
	function llegadaGuardar(){
		alert("Transacción completada correctamente");
		$("#contenedor").load('pages/permisos/motivo.php', data);
	}
	
	function problemas()
	{

    $("#contenedor").text('Problemas en el servidor.');
	}

	function llegadaEditarMotivo()
    {
		$("#contenedor").load('pages/permisos/editarMotivos.php',data);
		alert("Transacción completada correctamente");
		$("#contenedor").load('pages/permisos/motivo.php');
    }
   
	


</script>

	
</body>

</html>	