<!-- Tabla de solicitdes en el sistema -->

<div class="container"> <h1>Modulo de Reportes</h1> </div>
        

     
<div class = "col-md-12">
    <div class="panel panel-default">
        <div class="panel-body" id = "Solicitudes">
           
<div class = "col-md-12">

    <div class="panel panel-default">
        <div class="panel-heading"></div>

    </div>
    <div class="well">
    	<div class="page-header">
  <h1>Columnas a exportar <small></small></h1>
</div>
				<label  class="checkbox-inline">
  					<input  class="toggle-vis" data-column="0" type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Codigo
				</label>
				<label class="checkbox-inline">
  					<input class="toggle-vis" data-column="1" type="checkbox" type="checkbox" id="checkboxEnLinea2" value="opcion_2"> Estudiante
				</label>
				<label class="checkbox-inline">
  					<input class="toggle-vis" data-column="2" type="checkbox"type="checkbox" id="checkboxEnLinea3" value="opcion_3"> Observaciones
				</label>

     			<label class="checkbox-inline">
  					<input class="toggle-vis" data-column="3" type="checkbox" type="checkbox" id="checkboxEnLinea3" value="opcion_3"> Estado
				</label>

     			<label class="checkbox-inline">
  					<input class="toggle-vis" data-column="4" type="checkbox" type="checkbox" id="checkboxEnLinea3" value="opcion_3"> DNI
				</label>

     			<label class="checkbox-inline">
  					<input class="toggle-vis" data-column="5" type="checkbox"type="checkbox" id="checkboxEnLinea3" value="opcion_3"> Tipo Solicitud
				</label>
    			 <label class="checkbox-inline">
  					<input class="toggle-vis" data-column="6" type="checkbox" type="checkbox" id="checkboxEnLinea3" value="opcion_3" > Himno
				</label>

               

     <!-- 
            <div>
					Toggle column: <a class="toggle-vis" data-column="0">Cod</a>
					 - <a class="toggle-vis" data-column="1">Estudiante</a> - 
					 <a class="toggle-vis" data-column="2">Fecha</a> - 
					 <a class="toggle-vis" data-column="3">Observaciones</a> - 
					 <a class="toggle-vis" data-column="4">Estado</a> - 
					 <a class="toggle-vis" data-column="5">DNI</a>
					 <a class="toggle-vis" data-column="6">Tipo Solicitud</a>
					 <a class="toggle-vis" data-column="7">Himno</a>

				</div>
 -->
    	

    </div>
        	
          
      
</div>

<!-- Tabla de solicitdes en el sistema -->
<div class = "col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Solicitudes </label>
        </div>
        <div class="panel-body" id = "Solicitudes" style = "background-color : white;">
            <section class="content" style = "background-color : ;">
                <div class="table-responsive">
                    <table id= "tabla_reportes_solicitudes" border="1" class="table table-bordered table-hover">
                        <thead class = "well">
                            <tr>
                                <th>Cod</th>
                                <th>Estudiante</th>  
                                <th>Fecha</th>   
                                <th>Observaciones</th>
                                <th>Estado</th>  
                                <th>DNI</th>
                                <th>Tipo Solicitud</th>
                                <th>Himno</th>
                               

                            </tr>
                        </thead>
                        <tbody id = "tabla_filtrada">
                            <!-- Contenido de la tabla generado atravez de la consulta a 
                                la base de datos -->

                                <?php include("cargar_datosReportes.php"); ?>
                        </tbody>
                    </table>       
                </div>
            </section>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

<script>
	
	$(document).ready(function() {
    var table = $('#tabla_reportes_solicitudes').DataTable( {
        
    } );
 
    $('.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 		
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
        $(this).attr('color', ' blue');
    } );      
} );
</script>
