<div class="col-sm-3">
		   <ul class="list-unstyled">
		   
		   <hr>
		   
			<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu"> 
			
			<?php 
				if($rol == 100){
					echo "<li><h5><i class='glyphicon glyphicon-pencil'></i> Mantenimiento <i class='glyphicon glyphicon-chevron-down'></i></h5>";
					echo "<ul class='list-unstyled collapse in' id='userMenu'> <li><a id='motivos' href='#'>Motivos</a></li> 
					 <li><a id='edificios' href='#'>Edificios</a></li>  </ul> </li> ";
					
				}
			?>
			
			</li>		
			<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
			<h5> <i class="fa fa-edit fa-fw" ></i> Solicitudes <i class="glyphicon glyphicon-chevron-down"></i></h5>
					
				<ul class="list-unstyled collapse in" id="userMenu2">
						<li>
							<a id="solicitud" href="#">Solicitud Personal</a>
						</li>
						
						<?php
							if($rol==29 ){
								echo "<li><a id ='solicitude' href='#'> Solicitud Empleados</a>	</li>";
							}						
						?>	
					
						
						<?php
							if($rol==30 or $rol==50 ){
								echo "<li><a id ='revision' href='#'>Revisión</a></li>";
							}						
						?>	
						
						</ul>
				</li>
			
				<!-- /.nav-second-level -->
	
			<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu3">
				<h5><i class="glyphicon glyphicon-book"></i> Reportes<i class="glyphicon glyphicon-chevron-down"></i></h5>
					
				<ul class="list-unstyled collapse in" id="userMenu3">
						
						<?php
							if($rol==50 or $rol==30 ){
							echo "<li><a id='reportetotal' href='#'><i class='fa fa-table fa-fw'></i>Reporte: Completo</a></li>";
							echo "<li><a id='reportetrimestral' href='#'><i class='fa fa-table fa-fw'></i>Consultas Empleado</a></li>";
							}
						?>	
						<li><a id='estadistica' href='#'><i class='fa fa-table fa-fw'></i>Estadistica</a></li>
						
                        	
                        						
                </ul>
				</ul>
            </li>
                <!-- /.sidebar-collapse -->
 </div> 
			
 <script type="text/javascript" src="js/gestion_permisos/principal.js" ></script> 
   