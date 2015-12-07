<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

  $maindir = "../../";

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");

  
  $userId = $_SESSION['user_id'];
  $usuario2 = $userId;

  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }else{
    $contenido = 'gestion_de_folios';
	$navbar_loc = 'contenido';
  }
  
  require_once($maindir.'pages/navbar.php');

  $NroFolio = $_POST['idFolio'];
  
  if(isset($_POST['tipoProcedimiento'])){
    $tipoProcedimiento =  $_POST['tipoProcedimiento'];
	if($tipoProcedimiento == 'actualizar'){
	  require_once("actualizar_seguimiento.php");
	}elseif($tipoProcedimiento == 'actualizar_folio_'){
	  require_once("actualizar_datos_folio_codigo.php");
	}elseif($tipoProcedimiento == 'actualizar_Asignado'){
      require_once("actualizar_encargado_folio.php");
    }
  }

  require_once('datos/obtener_datos_folio.php');
  
  require_once("datos/datos_seguimiento_folio.php");

?>


<!-- agregando php necesario para generar la nueva solicitud hllanos 12/12 -->
<?php 

?>


<!-- Main -->
<div class="container-fluid">
<div class="row">
<?php
    require_once("navbar.php");
?>
    <div class="col-sm-10">
	
<?php
 
  if(isset($codMensaje) and isset($mensaje)){
    if($codMensaje == 1){
      echo '<div class="alert alert-success">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Exito! </strong>';
      echo $mensaje;
      echo '</div>';
    }else{
      echo '<div class="alert alert-danger">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Error! </strong>';
      echo $mensaje;
      echo '</div>';
    }
  } 

?>
	
                    <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
            
            <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                <!-- Main content -->
                
                <article id="id_folio" data-folio="<?php echo $result['NroFolio']; ?>" data-prioridad=<?php echo $result['Prioridad']; ?> ></article>
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                <div id="folios_noti"></div>
                                <i class="fa fa-newspaper-o"></i> Folio <?php echo $result['NroFolio']; ?>
                                <i class="fa fa-globe"></i> <?php echo $result['DescripcionPrioridad']; ?>
                                <small class="pull-right">Fecha de Entrada: <?php echo $result['FechaEntrada']; ?></small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <strong>Tipo de Folio: </strong> 
                            <?php 
                                if($result['TipoFolio'] == 0){
                                    echo "Folio de entrada";
                                }elseif($result['TipoFolio'] == 1){
                                    echo "Folio de salida";
                                }
								echo "<br>";
                                echo "<strong>Categoria del folio: </strong>";
                                echo $result['NombreCategoria'];
                            ?><br><br>
                            <address>
                                <?php 
                                    if($result['NombreUnidadAcademica'] == null or $result['NombreUnidadAcademica'] == ""){
                                        echo "<strong>Organizacion referente: </strong>";  
                                        echo $result['NombreOrganizacion'];
                                    }elseif($result['NombreOrganizacion'] == null or $result['NombreOrganizacion'] == ""){
                                        echo "<strong>Unidad Academica referente: </strong>";  
                                        echo $result['NombreUnidadAcademica'];
                                    }
                                ?><br>
                                <strong>Persona referente al folio: </strong><?php echo $result['PersonaReferente']; ?><br>
                            </address>

                            <div class="">
                                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modals"><i class="fa fa-pencil"></i> Nueva Notificación</a>
                            </div>

                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Fecha de creacion del folio: </b> <?php echo $result['FechaCreacion']; ?><br/><br/><br/>
							<?php if($result['NroFolioRespuesta']){ ?><b>Folio de respuesta: </b> <?php echo '<a id="FolioRes" href="#" data-id="'.$result['NroFolioRespuesta'].'">'.$result['NroFolioRespuesta'].'</a>'; ?><br/><?php } ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <p class="lead">Descripcion: </p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            <?php echo $result['DescripcionAsunto']; ?>
                            </p>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            <p class="lead">Ubicacion fisica en archivo</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:35%">Ubicacion </th>
                                        <td><?php echo $result['DescripcionUbicacionFisica']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
						<?php if($rol >= 40){
						 
								    if($seguimiento == 1){
										$finalizado = false;
										    foreach( $rows as $row ){
										        $a = $row["DescripcionEstadoSeguimiento"];
											       if (strpos($a,'finalizado') != 0 or strpos($a,'fin') != 0 or strpos($a,'terminar') != 0 or strpos($a,'terminado') != 0) {											    
												     $finalizado = true;
										           }
										        }
						  
						?>
						<div class="col-xs-6">
                            <p class="lead">Encargado del seguimiento</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        
										<?php		
											if($UsuarioAsignado != 0){
                                                echo $userName." - ".$primerN." ".$segundoN." ".$primerA." ".$segundoA;
                                            }elseif($finalizado){
											    echo "Seguimiento del folio finalizado sin encargado.";
											}else{
                                                echo '<button class="btn btn-info" data-toggle="modal" data-target="#compose-modal-actualizar-encargado"><i class="fa fa-users"></i> Actualizar encargado </button>';
                                            }  
                                        ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
						<?php }  } ?> 
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row">
                        <div class="col-xs-12">
							<?php
							
							    if($rol >= 40){

									if($seguimiento == 1){
										
										if($finalizado){
					                        echo '<strong><p> * El seguimiento de este folio ha finalizado. </p></strong>';
											echo '<button class="btn btn-default pull-right" id="exp" data-mode="verPDF" data-id="'.$NroFolio.'" href="#">Exportar a PDF</button>';
										}else{
                                            echo '<button class="btn btn-warning" data-toggle="modal" data-target="#compose-modal-actualizar"><i class="glyphicon glyphicon-wrench"></i> Actualizar Seguimiento </button>';
							                echo '<button class="btn btn-default pull-right" id="exp" data-mode="verPDF" data-id="'.$NroFolio.'" href="#">Exportar a PDF</button>';
                                                                  if(!$result['NroFolioRespuesta']) {
                                                                      echo '<button class="btn btn-primary pull-right" style="margin-right: 5px;" id="folio_respuesta" ><i class="fa fa-retweet"></i> Crear folio de respuesta </button>';
                                                                  }
											echo '<button class="btn btn-primary pull-right" style="margin-right: 5px;" id="modificar_datos"><i class="glyphicon glyphicon-save-file"></i> Modificar datos del folio </button>';
									    }
									}else{
                                        //echo '<button class="btn btn-warning" data-toggle="modal" data-target="#compose-modal-actualizar"><i class="glyphicon glyphicon-wrench"></i> Actualizar Seguimiento </button>';
										echo '<button class="btn btn-default pull-right" id="exp" data-mode="verPDF" data-id="'.$NroFolio.'" href="#">Exportar a PDF</button>';
							            echo '<button class="btn btn-primary pull-right" style="margin-right: 5px;" id="modificar_datos"><i class="glyphicon glyphicon-save-file"></i> Modificar datos del folio </button>';
									}
                                }
							?>
                        </div>
                    </div>
					<br />
				    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Ver seguimiento 
                                    </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
	                            <?php
									if($seguimiento == 1){
					                    require_once("seguimiento.php");
									}else{
										echo '<p> El folio seleccionado no tiene seguimiento, verificar con el administrador del sistema. </p>';
									}
								?>
	                            </div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
			</div>		
        </aside><!-- /.right-side -->
    </div><!--/col-span-10-->

  </div>
  
</div>
<!-- /Main -->
  
<?php require("datos/datos_modificar_encargado.php");
      require("datos/datos_modificar_seguimiento.php"); ?>

<div class="modal fade" id="compose-modal-actualizar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<form role="form" id="form1" name="form1" action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Actualizar el seguimiento del folio: <?php echo $result['NroFolio']; ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
					    <label>Estado del seguimiento</label>
				        <div class="input-group">
                            <select id="Seguimiento_actualizar" class="form-control" width="420" style="width: 420px" name="Seguimiento" required>
                                <option value=-1> Seleccione el estado del seguimiento </option>
                                <?php while($filas = mysqli_fetch_assoc($result5)) { ?>
                                <option value="<?php echo $filas["Id_Estado_Seguimiento"];?>"><?php echo $filas["DescripcionEstadoSeguimiento"];?></option><?php } mysqli_free_result($result5); mysqli_close($conexion); ?>
				            </select>
                        </div>
			        </div>
					<div class="form-group">
                        <div class="checkbox">
                            <label>
                            <input id="chkFinalizado" type="checkbox"/>
                            finalizar seguimiento del folio?
                            </label>
                        </div>
                    </div>
			        <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> Notas del seguimiento </span>
                            <textarea id="NotasSeguimiento_actualizar" class="form-control" name="NotasSeguimiento" rows="5" placeholder="Ingrese una nota referente al sequimiento..." required></textarea>
                        </div>
                    </div>			
                </div> 
                <div class="modal-footer clearfix">
                    <button id="submit" name="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i> Actualizar </button>
                </div>
			</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="compose-modal-actualizar-encargado" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<form role="form" id="form2" name="form2" action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Actualizar el encargado del seguimiento al folio: <?php echo $result['NroFolio']; ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
	                  <label>Encargado del seguimiento</label>
				        <div class="input-group">
                            <select id="modEncargado" class="form-control" width="420" style="width: 420px" name="modEncargado">
                                <option value=-1> -- Seleccione el encargado del seguimiento -- </option>
                                <?php while($filas = mysqli_fetch_assoc($result_1)) { ?>
                                <option value="<?php echo $filas["id_Usuario"];?>"><?php echo $filas["Nombre"];?></option><?php } mysqli_free_result($result_1); mysqli_close($conexion); ?>
				            </select>
                        </div>
						<p> Nota: Sólo podrá elegir el encargado del seguimiento una vez, después este no puede ser modificado</p>
			        </div>			
                </div> 
                <div class="modal-footer clearfix">
                    <button id="submit" name="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i> Actualizar </button>
                </div>
			</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- agregando php necesario para generar la nueva solicitud hllanos 12/12 -->
<?php 
  // $user = $_SESSION['nombreUsuario'];

//  if(isset($_POST['tipoProcedimiento'])){
//    $tipoProcedimiento =  $_POST['tipoProcedimiento'];
//    if($tipoProcedimiento == 'insertar'){
//      require_once("gestion_de_folios/Enviar_notificacion.php");
//    }
//  }


$query2 = $db->prepare( "SELECT NroFolio  FROM folios");
$query2->execute();
$filas = $query2->fetchAll();
        if($filas){
            //$number_of_rows = $rows->rowCount();
            $folio = 1;
        }else{
            $numero_filas = 0;
            $notificacion = 0;
        }
    $query2 = null;
    

//Consulta para cargar los usuarios al combobox
$query3 = $db->prepare("SELECT * FROM usuario");
$query3->execute();
$filas2 = $query3->fetchAll();
        if($filas2){
            //$number_of_rows = $rows->rowCount();
            $usuario= 1;
        }else{
            $numero_filas = 0;
            $notificacion = 0;
        }
    $query3 = null;

 //Consulta para ver el idUsuario   
// $query5 = $db->prepare( "SELECT *  FROM usuario WHERE nombre ='".$user."'");
// $query5->execute();
// $filas3 = $query5->fetchAll();
// foreach( $filas3 as $row ){ 
     
//             $usuario2 = $row['id_Usuario'];
//             }


//Consulta para ver las notificaciones Enviadas
//  $query = $db->prepare("SELECT NroFolio,Titulo,FechaCreacion FROM notificaciones_folios WHERE IdEmisor=(SELECT id_Usuario FROM usuario WHERE nombre='".$user."')");
//    $query->execute();
//    $rows = $query->fetchAll();
//        if($rows){
//            //$number_of_rows = $rows->rowCount();
//            $notificacion = 1;
//        }else{
//            $number_of_rows = 0;
//            $notificacion = 0;
//        }
//    $query = null;
//    
//
////Consulta para ver las notificaciones Recibidas
// $query4 = $db->prepare("SELECT NroFolio,Titulo,FechaCreacion FROM notificaciones_folios WHERE Id_Notificacion=(SELECT Id_Notificacion from usuario_notificado WHERE Id_Usuario=(SELECT id_Usuario from usuario where nombre ='".$user."'))");
//    $query4->execute();
//    $rows2 = $query4->fetchAll();
//        if($rows2){
//            //$number_of_rows = $rows->rowCount();
//            $notificacion = 1;
//        }else{
//            $number_of_rows = 0;
//            $notificacion = 0;
//        }
//    $query4 = null;

?>



<!-- nueva modal para eviar una notificacion hllanos 4/12 -->
<div class="modal fade" id="compose-modals" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Enviar Notificacion</h4>
      </div>
      <!-- form start -->
      <div role="form" id="form" name="form" action="#">
          <div class="modal-body">  
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Componer nueva notificacion</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" name="Usuario" id="Insertar_Emisors" class="form-control"  readonly="readonly"  value="<?php echo $usuario2;?>"/>
                    <input type="hidden" name="FechaCreacion" id="FechaCreacions" class="form-control"  readonly="readonly" value="<?php echo date('Y-m-d');?>" />
                    <?php echo $user;?>
                    <div class="pull-right">
                      Fecha: <?php echo date('Y-m-d');?>
                    </div>                    
                  </div>   
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Numero Folio :</span>
                      <select id="NroFolios" class="form-control"name="NroFolio" >
                                            
                                          
                                            <option value="<?php echo $result['NroFolio']; ?>"selected><?php echo $result['NroFolio']; ?></option> 
                                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Para :</span>
                      <select required= "required" multiple id="Destinatarioss" class="form-control" name="Destinatarios[]" >                  
                                            <?php foreach( $filas2 as $row ) {if($row["nombre"]!=$usuario ){ ?>
                                            <option value="<?php echo $row["id_Usuario"];?>"><?php echo $row["nombre"];?></option><?php }} ?>
                                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="Titulo" id="Insertar_Titulos" placeholder="Titulo:" required>
                  </div>
                  <div class="form-group">
                    <textarea name="Mensaje" id="Insertar_Mensajes" class="form-control" style="height: 150px" placeholder="Mensaje..." required></textarea>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="" name="submit" id="nueva_notificacion" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                  </div>
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Descartar</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
      </div><!-- /.modal-content -->
    </div><!-- /.form -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<script>
$( document ).ready(function() {
    // script para enviar la nueva notificacion hllanos
    $('#nueva_notificacion').click(function(){
        data={
                NroFolio:$("#NroFolios").val(),
                idEmisor:$("#Insertar_Emisors").val(),
                Titulo:$("#Insertar_Titulos").val(),
                Cuerpo:$("#Insertar_Mensajes").val(),
                FechaCreacion:$("#FechaCreacions").val(),
                UsuariosNotificados:$("#Destinatarioss").val(),
                tipoProcedimiento:"insertar",
                tipoNotificacion:"NotificacionEnviada"
            };

            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/Notificacion.php", 
                success:EnviarNotificacion,
                timeout:4000,
                error:problemas  
            }); 
            return false;
    });
    
    function EnviarNotificacion(){
         $('body').removeClass('modal-open');

            $("#div_contenido").load('pages/gestion_folios/Notificacion.php',data);
        }
 function problemas(){

            $("#div_contenido").text('Problemas con el servidor.');
        }

    $( "#Seguimiento_actualizar" ).change(function () {
		    var sel = $( "#Seguimiento_actualizar option:selected" ).text();
			if( sel.indexOf("finalizado") >= 0 || sel.indexOf("terminado") >= 0){
			    if($("#chkFinalizado").prop('checked') == false){
				    $('#chkFinalizado').prop('checked', 'disabled');
					$('#Seguimiento_actualizar').prop('disabled', true);
                }	    
			}else{
			    if($("#chkFinalizado").prop('checked') == true){
				    $('#chkFinalizado').prop('checked', false);
                }	  
			}
	});

    $("#chkFinalizado").change(function () {
		    if($("#chkFinalizado").prop('checked') == true){
			    $('#Seguimiento_actualizar').prop('disabled', 'disabled');
				$('#Seguimiento_actualizar').val(5);
			}else{
			    $('#Seguimiento_actualizar').prop('disabled', false);
				$('#Seguimiento_actualizar').val(-1);
			}
		});
        
		
	$("#exp").on('click',function(){
          mode = $(this).data('mode');
          id1 = $(this).data('id');
          if(mode == "verPDF"){
            window.open('pages/gestion_folios/crear_pdf.php?id1='+id1);
          }
        });
});
</script>

<script type="text/javascript" src="js/gestion_folios/modificacion_folio.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>