<?php

$maindir = "../../../";
require($maindir."conexion/config.inc.php");

 
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



<!DOCTYPE html>

<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<!--<script type="text/javascript" src="../SistemaCienciasJuridicas/js/jquery-2.1.3.js"></script>-->
	
<body>

	<div id="proceso"></div>

    <div id="wrapper">
		<h1 class="page-header">Control de Permisos</h1>
			<div class="box">
            <div class="box-header">
           
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
		    <?php
            
			   require_once($maindir."pages/permisos/revision/tabla_solicitud.php");

             
            ?>
           </div><!-- /.box-body -->
       </div><!-- /.box -->
</div>

<div id="contenedor2">

</div>


 <div class=" modal fade" id="compose-denegar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	  <form role="form" id="form" name="form" action="#">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Justificación de denegación </h4>
      </div>
              <div class="modal-body">
                  <div class="form-group">
                      <div class="input-group">
                              <div class="input-group">
								  <input id="Permiso" type="hidden" class="form-control" value = ""  required>
                                  <input id="observacion" type="text" class="form-control" placeholder="Justificaci&#243;n de Deniego"    required>
                                  <span class="input-group-btn">
                                      <button id="guardarJ "   class=" Denegarlo btn btn-primary" data-dismiss="modal"  >Finalizar</button>
                                  </span>
                              </div>
                           
                        
                      </div>   
                       
                  </div>
                  
              </div>
           
                
                    
          </form>
    
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<div class="modal fade" id="Aprobar-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 style="font-size:large;" class="modal-title">Confirmacion</h4>
      </div>
      <div  class="modal-body">

        <p style='display:none' id="codigo"></p>
        <p style='display:none' id="dias"></p>
        <center><p style="font-size:large;"  id="informacion"></p></center>
        
       
        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="button-Aprobacionm" data-dismiss="modal"  class="button-Aprobacion btn btn-danger ">Aprobar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


<script language="javascript" type="text/javascript">


$(document).on("click", ".open-Modal", function () {
	id = $(this).parents("tr").find("td").eq(0).html();
	$(".modal-body #Permiso").val(id);
	

});
$(document).on("click", ".aprobarlo", function () {
	var id=$(this).parents("tr").find("td").eq(0).html();
	var diasd=$(this).parents("tr").find("td").eq(2).html();
    $('#Aprobar-modal #codigo').text(id);
    $('#Aprobar-modal #dias').text(diasd);
    var descripcion= $(this).parents("tr").find("td").eq(1).html();
    var d = " Desea Aprobar el  permiso  "+descripcion;
    $('#Aprobar-modal #informacion').text(d);
	

});

$(document).ready(function() {
	$(".Exportar").on('click',function(){
          
          id1 = $(this).data('id'); 
			data={
            id1:id1
            };
           
            $.ajax({
                async:true,
                type: "GET",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/revision/crear_pdfpermiso.php", 
               beforeSend: function()
               {
                $(".alert").remove();
                var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>Enviando .......................</div>';
                $("#proceso").append(me); 
               	window.open('pages/permisos/revision/crear_pdfpermiso.php?id1='+id1);
               },

                success:function()
                {   
                  $mensaje="Transaccion Exitosamente..............................................";
                  $(".alert").remove();
                  $me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+$mensaje + '</strong></div>';
                  $("#proceso").append($me);
                  $("#tabla_Solicitudes").empty();
                  $("#tabla_Solicitudes").load('pages/permisos/revision/tabla_solicitud.php');

                },
                timeout:4000,
                error:function(result)
                {
                   $(".alert").remove();
                  var me='<div class="alert alert-danger" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+result.status + ' ' + result.statusText+'</strong></div>';
                  $("#proceso").append(me);
                	
                }
                

            }); 
            
          
        });
});



var a;
a = $(document);
a.ready(inicio);

	function inicio()
	{
		var x;
		x = $('.button-Aprobacion');
		x.click(Aprobacion);
		
		var x;
		x = $('.Denegarlo');
		x.click(Denegacion);
	};
	
	
	function Aprobacion()
	{  
		//var pid=$(this).parents("tr").find("td").eq(0).html();
		//var diasp=$(this).parents("tr").find("td").eq(2).html();
		var pid=$('#Aprobar-modal #codigo').text();
		var diasp=$('#Aprobar-modal #dias').text();			
		data ={codigo:pid, cdias:diasp, usr:"<?php echo $idusuario ?>", rol:"<?php echo $rol ?>"}; 
	    
		$.ajax({
			data:data,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
		    url:'pages/permisos/revision/aprobarSolicitud.php',  
            timeout: 4000,
			beforeSend: function(){ 

             $(".alert").remove();
                var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>"cargando .............."</div>';
                $("#proceso").append(me);


			 },
			success: function(response)
			{
			  $dato=response.trim();
			     if ($dato==1) 
			     	{
                     $mensaje="Transaccion Exitosamente..............................................";
                     $(".alert").remove();
                     $me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+$mensaje + '</strong></div>';
                     $("#proceso").append($me);

			     	} 
			     	else
			     		{
			     			$mensaje="Error critico .....#"+$dato;
                            $(".alert").remove();
                            $me='<div class="alert alert-danger" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+$mensaje+' </strong></div>';
                            $("#proceso").append($me);



			     		};


			$("#tabla_Solicitudes").empty();
            $("#tabla_Solicitudes").load('pages/permisos/revision/tabla_solicitud.php');


			},
			error: function(result)
			{

				$(".alert").remove();
                 var me='<div class="alert alert-danger" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong> '+ result.status + ' ' + result.statusText+'</strong></div>';
                $("#proceso").append(me);




			}		
		
		});

     
        

            
		
	}
	
	
	function Denegacion()
	{
		
		var data ={idpermiso:$('#Permiso').val(), obs:$('#observacion').val()};
		$('#observacion').val("");
	    	 
				 $.ajax({
		 	    
                data:  data,
                url:   'pages/permisos/revision/denegarSolicitud.php',
                type:  'POST',
                dataType:'html',
                beforeSend: function () {
                 
                  $(".alert").remove();
                var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>"cargando .............."</div>';
                $("#proceso").append(me);
                
                    
                },
                success:  function (response) {
                
               $dato=response.trim();
			     if ($dato==1) 
			     	{
                     $mensaje="Transaccion Exitosamente..............................................";
                     $(".alert").remove();
                     $me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+$mensaje + '</strong></div>';
                     $("#proceso").append($me);

			     	} 
			     	else
			     		{
			     			$mensaje="Error critico .....#"+$dato;
                            $(".alert").remove();
                            $me='<div class="alert alert-danger" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+$mensaje+' </strong></div>';
                            $("#proceso").append($me);



			     		};


			$("#tabla_Solicitudes").empty();
            $("#tabla_Solicitudes").load('pages/permisos/revision/tabla_solicitud.php');
                        
                        
                          
                },
                error : function(result) {
                 $(".alert").remove();
                var me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+result.status + ' ' + result.statusText+'</strong></div>';
                  $("#proceso").append(me);
        
                 }
 
    
        });
   
     
    
   

     
     
	
	}
            
	

</script>

					
</body>
</html>
