<?php

    include '../Datos/conexion.php';

    require_once('funciones.php');
	
	$nombre='';	
	$apellido='';
	$id='';
	$pais='';
        
       
	  if (isset($_POST['idpersona'])) 
    {
              
	  $id=$_POST['idpersona'];
	  $pa = mysql_query("SELECT * FROM persona WHERE N_identidad='".$id."'");
            
     			  
		if($row=mysql_fetch_array($pa)){
			$existe=TRUE;
			
			
			$nombre=$row['Primer_nombre'] ;
                        $apellido=$row['Primer_apellido'] ;
			//echo $nombre;
			
			
		}
                else{
                    $existe=FALSE;
                    
                    
               echo mensajes('No se encontro ningun registro','azul');

                    
                }
    }
    
   ?>
<!DOCTYPE html>
<html>
    
    <head>
        <script>
            $( document ).ready(function() {
                $("[name='my-checkbox']").bootstrapSwitch();
                $('[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
                  if (state == true) {
                    estado = 1;
                    //marcarCheckbox();
                  }else {
                    estado = 0;
                    //marcarCheckbox();
                  }
                  return estado;
                });
                function marcarCheckbox(){
        for (i=0;i<document.form.elements.length;i++) 
          if(document.form.elements[i].type == "checkbox")    
                document.form.elements[i].checked=1
    }
           $("form").submit(function(e) {
	    e.preventDefault();
          
               if(validator()){
            
             var idpersona = "<?php echo $id; ?>" ;
                
                data={
                    identi:idpersona,
                    cod_empleado:$('#cod').val(),
                    fecha:$('#fecha').val(),
                    obs:$('#obs').val(),
                    id_dep:$('#depar').val(),
                    cargo:$('#cargo').val(),
                    jefe:$('input[name="my-checkbox"]').bootstrapSwitch('state'),
                    tipoProcedimiento:"insertar"
                };
                
            
            $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvioAP,
                    success: llegadainsertarEmpleado,
                    timeout: 4000,
                    error: problemasAP
            }); 
            return false;
               }
	});
        
   });
            
            
          
                      function soloLetrasYNumeros(text){
	    var letters = /^[0-9]+$/; 
			if(text.match(letters)){
			    return true;
			}else{
			    return false;
			}
	}

    function validator(){
	    var nombre = $("#cod").val();
	 
		
		//valida si se han itroduzido otros digitos aparte de numeros y letras
		
		if(soloLetrasYNumeros(nombre) == false){
		    $("#Cempleado").addClass("has-warning");
			$("#Cempleado").find("label").text("codigo empleado: Solo numeros");
			$("#cod").focus();
			return false;
		}else{
		    $("#Cempleado").removeClass("has-warning");
			$("#Cempleado").find("label").text("codigo empleado");
		}
		
		
		
		return true;
	}
            
            
            
           
            


            function inicioEnvioAP()
            {
                var x = $("#contenedor");
                x.html('Cargando...');
            }

            function llegadainsertarEmpleado()
            {
                $('body').removeClass('modal-open');
                $("#contenedor").load('pages/recursos_humanos/Empleados.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }
            

            function problemasAP()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }



        </script>
        
        
        
    </head>
    
    <body>
        
        <?php
        if($existe){
    echo <<<HTML
     
        
    <div class="row">  
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informacion personal
                </div>
                <div class="panel-body">
                 <div class="row">
                        <div class="col-xs-12">
                             
                            <strong> Numero de identidad :</strong>   $id 
                           
                            </br>
                            <strong> Nombre :</strong> $nombre $apellido 
                            </br>
                           
                  
                        </div>
                     <div class="col-xs-12">
                         
                         
                         
                     </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>

            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

            

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Llene los campos a continuacion solicitados
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12"> 

                                <form role="form" id="form" action="#" method="Post" name="form">

                                    <div id="Cempleado" class="form-group">
     
                                         <label  class="col-lg-6 control-label" >Codigo Empleado</label>
                                            
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="cod_empleado" id="cod" required> 
                                        </div>
                                           
                                    </div>


                                   <div class="form-group">
                                        <label class="col-lg-6 control-label" >Departamento</label>
                                   
                                    <div class="col-lg-6">
                                        <select name='depar' class="form-control" id="depar" >

HTML;
    
                                            $consulta_mysql = "SELECT * FROM `departamento_laboral`";
                                            $rec = mysql_query($consulta_mysql);



                                            while ($row = mysql_fetch_array($rec)) {
                                                echo "<option value = '" . $row['Id_departamento_laboral'] . "'>";

                                                echo $row["nombre_departamento"];

                                                echo "</option>";
                                            }
                                           
HTML;
                                          echo <<<HTML

                                        </select>
                                  </div>
                                </div>
                               


                                  

                                    <!-- ---------------------------------------   -->

                                     <div class="form-group">
                                        <label class="col-lg-6 control-label">Cargo</label>
                                    
                                    <div class="col-lg-6" >
                                        <select name='cargo' class="form-control" id="cargo">

HTML;
                                            $consulta_mysql = "SELECT * FROM `cargo`";
                                            $rec = mysql_query($consulta_mysql);



                                            while ($row = mysql_fetch_array($rec)) {
                                                echo "<option value = '" . $row['ID_cargo'] . "'>";

                                                echo $row["Cargo"];

                                                echo "</option>";
                                            }
HTML;
echo<<<HTML
                                        </select>
                                     </div>
                                    
                                     </div>

                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">Fecha de ingreso como empleado</label>
                                  
                                    <div class="col-lg-6">
                                        <input type="date"  class="form-control" name="Fecha" id="fecha" required> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->
                                     </div>
                                    </div>
                                   



                                   <div class="form-group">
                                        <label class="col-lg-6 control-label"><strong>Observacion:</strong></label> 
                                  
                                    <div class="col-lg-6">
                                        <textarea name="comentarios" rows="3" cols="31"  id="obs" ></textarea>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-body">
                                            <input class = 'bootstrapSwitch bootstrap-switch-wrapper bootstrap-switch-id-switch-state bootstrap-switch-animate bootstrap-switch-on' data-id = '0' data-on-color = 'primary' data-off-color  = 'success' data-off-text = 'NO' data-on-text = 'SI' type='checkbox' name='my-checkbox'>  
                                        </div>
                                    </div>
                                   </div>
                                    <button id="Empleado" class="btn btn-primary">Agregar empleado</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

HTML;
        }
        ?>



    </body>





</html>