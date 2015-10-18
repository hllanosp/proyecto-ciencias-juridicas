<?php 
$maindir = "../../../";
// include ($maindir .'Datos/conexion.php');
include($maindir . "conexion/config.inc.php");
 ?>
<script >
    //verifica que el checbok este seleccionado
    function validarControles()
    {
        var himno=$('input:checkbox:checked').val();   
                
                if(himno==='0')
                {  
                    return '1';
                }
                else
                {
                    
                    return '0';
                }
    }        
    
    //valida que se alla elegido una fecha y que esta no baya en blanco
    function validaFecha()
    {
        fecha=$("#fecha").val();
        if(fecha.length>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    //Valida que no ningún combobox sea null
    function validaCombobox()
    {
        if($("#periodo").val()==='NULL')
        {
            alert("Debes seleccionar un periodo");
            return false;
        }
        else
        {            
            if($("#selectTiposSolicitud").val()==='NULL')
            {
                alert("Debes seleccionar una Solicitud");
                return false;
            }
            else
            {
                return true;
            }
        }
    }
    
    function obtenerSolicitudEstudiante()
    {
        id =$("#identidad").val();

                    
                    var datos = 
                        {
                            id:id
                        }; 
                    
                    $.ajax({
                        async: true,
                        type: "POST",
                        data:datos,
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/ObtenerTipoSolicitud.php",
                        //beforeSend: inicioVer,
                        success: function(response){
                                                    
                            var arr = JSON.parse(response);
                            //alert("que ondas con esas solicitudes" + arr);   
                            var options = '';
                            var val='NULL';
                            var def='Seleccione una opción';
                            options += '<option value="' + val + '">' +
                                            def+ '</option>';
//                            alert(arr[0].codigo);
//                             alert(arr[0].nombre);
                            for (var index = 0; index < arr.length; index++) 
                            {
                                
                                
                                var codigoTipoSolicitud = arr[index].codigo;
                                var nombreTipoSolicitud = arr[index].nombre;
                                
                                options += '<option value="' + codigoTipoSolicitud + '">' +
                                            nombreTipoSolicitud + '</option>';
                            }                            
                            $("#selectTiposSolicitud").html(options);  
                                                                                                           ;
                        },
                        timeout: 4000,
                        
                    });
    }
    
    function obtenerPeriodos()
    {                  
      
                id =$("#identidad").val();
                    
                    var datos = 
                        {
                            id:id
                        }; //Array 
                    
                    $.ajax({
                        async: true,
                        type: "POST",
                        data:datos,
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/ObtenerPeriodosSolicitudEstudiante.php",
                        //beforeSend: inicioVer,
                        success: function(response){
                                                       
                            var arr = JSON.parse(response);
                            
                            var options = '';
                            var val='NULL';
                            var def='Seleccione una opción';
                            options += '<option value="' + val + '">' +
                                            def+ '</option>';
                                    
                            for (var index = 0; index < arr.length; index++) 
                            {
                                var idPeriodo= arr[index].idPeriodo;
                                var nombrePeriodo = arr[index].nombrePeriodo;
                                
                                options += '<option value="' + idPeriodo + '">' +
                                            nombrePeriodo + '</option>';
                            }
                            
                            $("#periodo").html(options);                                                        
                            
                        },
                        timeout: 4000,
                        
                    });
    }
    
    function reiniciarSolicitudesEstudiante()
    {
        var options = '';
        var val='NULL';
        var def='Seleccione una opción';
        options += '<option value="' + val + '">' +def+ '</option>';
        $("#selectTiposSolicitud").html(options);
    }

    //guarda una solicitud echa para un estudiante
    $(document).ready(function () {
        obtenerPeriodos();
                $("#formSolicitud").submit(function (e) {
                    e.preventDefault();
                    if(validaCombobox()===true)
                    {
                        if(validarControles()==='1')
                        {

                           if(validaFecha()===false)
                            {//si esta seleccionada el checkbox pero no hay fecha
                                alert('Debes de Ingresar una fecha');
                            }
                            else
                            {//si esta seleccionado el checkbox y hay fecha
                                data2 = {identidad: $("#identidad").val(),
                                solicitud: $("#selectTiposSolicitud").val(),
                                periodo: $("#periodo").val(),
                                himno:'true',
                                fecha:$("#fecha").val()
                                };

                                $.ajax({
                                            async: true,
                                            type: "POST",
                                            dataType: "html",
                                            contentType: "application/x-www-form-urlencoded",
                                            url: "Datos/insertarNuevaSolicitudEstudiante.php",
                                            beforeSend: inicioEnvio,
                                            success: llegadaGuardar,
                                            timeout: 4000,
                                            //error: problemas
                                        });
                            } 

                        }
                        else if(validarControles()==='0')
                        {
                            //checkbox no seleccionado
                           data2 = {identidad: $("#identidad").val(),
                                solicitud: $("#selectTiposSolicitud").val(),
                                periodo: $("#periodo").val(),
                                himno:'false',
                                fecha:' '
                                };

                                $.ajax({
                                            async: true,
                                            type: "POST",
                                            dataType: "html",
                                            contentType: "application/x-www-form-urlencoded",
                                            url: "Datos/insertarNuevaSolicitudEstudiante.php",
                                            beforeSend: inicioEnvio,
                                            success: llegadaGuardar,
                                            timeout: 4000,
                                            //error: problemas
                                        });
                        }
                        
                    }                                                           
                        //limpiarCampos();
                    return false;
                });            
            });
            
             function llegadaGuardar()
            {
                $("#contenedor2").load('Datos/insertarNuevaSolicitudEstudiante.php',data2);
                limpiarControles();
                obtenerPeriodos();
                reiniciarSolicitudesEstudiante();
            }
             function inicioEnvio()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }
            
            
            
             //se obtinene informacion del estudiante         
             $(document).on("focusout","#identidad",function () {                                                   
                    id =$("#identidad").val();                    
                    
                    var datos = {id:id}; //Array 
                    $.ajax({
                        async: true,
                        type: "POST",
                        data:datos,
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/obtenerDatosEstudiante.php",
                        
                        success: function(response){
                            
                            var arr = JSON.parse(response);
                            if(arr[0].existe=='0')
                            {                                                                
                                $("#nombre").val(arr[0].nombre);
                                $("#tipoEstudiante").val(arr[0].descripcion);
                            }
                            else
                            {                             
                                $("#nombre").val(arr[0].nombre);
                                $("#tipoEstudiante").val(arr[0].descripcion);
                            }
                            
                        },
                        timeout: 4000,
                        //error: problemas
                    });
                    return false;

             });
             
             
             //con este se llena el combobox del tipo de solicitud del estudiante
             $(document).on("focusout","#identidad",function () {                    
                    obtenerSolicitudEstudiante();
                    // ObtenerPeriodosSolicitudEstudiante();
                    return false;
             });
             

             
             //codigo para habilitar-desabilitar el input:date, cuando el checbox este seleccionado o no lo este
             $(document).ready(function () {                
                $('#himno').change(function() {
                    if($(this).is(":checked")) 
                    {
                        $('#fecha').show();
                        $('#lfecha').show();
                    }
                    else
                    {                        
                        $('#fecha').hide();
                        $('#lfecha').hide();
                    }
                 });
             });
       function limpiarControles()
       {           
            $('#identidad').val(' ' );
            $('#nombre').val(' ' );
            $('#tipoEstudiante').val(' ' );
       }      
             
</script>
<div  id="contenedor2"></div>         
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Solicitud de Estudiante</div>
    <br>
    <br>
    <div class="panel-body" align = "center">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" role="form" id="formSolicitud" name="formSolicitud">
                    <div class="row form-group">                                                                                                                     
                        <label class=" col-sm-2 control-label" >Periodo</label>
                        <div class="col-sm-8">                            
                            <select class="form-control" id="periodo" name="periodo" >
                                <option value="NULL">Seleccione una opción</option>
                            </select>
                        </div>                        
                    </div>
                     
                    <div class="row form-group" >                    
                        <label class=" col-sm-2 control-label"id="2" >N° identidad</label>                       
                        <div class="col-sm-8">                            
                            <input type="text" class="form-control" id="identidad" name="identidad" placeholder="Ejmpl: 0000-0000-00000"required>                                
                        </div>                                                                                                                         
                    </div>
            
                    <div class="row form-group">
                        <label class=" col-sm-2 control-label" >Nombre</label>
                        <div class="col-sm-8">                            
                            <input type="text" class="form-control" id="nombre" name="nombre" required disabled="">                                
                        </div>
                    </div>
            
                    <div class="row form-group">
                        <label class=" col-sm-2 control-label" >Tipo estudiante</label>
                        <div class="col-sm-8">                            
                            <input type="text" class="form-control" id="tipoEstudiante" name="tipoEstudiante" required disabled="">                                
                        </div>
                    </div>                
                     
                    <div class="row form-group">
                        <label class=" col-sm-2 control-label" >Solicitud</label>
                        <div class="col-sm-8">                            
                            <select class="form-control" id="selectTiposSolicitud" name="selectTiposSolicitud">
                                <option value="NULL">Seleccione una opción</option>
                                 <?php 
                                    // $consulta="CALL SP_OBTENER_TIPOS_SOLICITUDES_POR_ESTUDIANTE('".$pcIdentidadEstudiante."',@pcMensajeError)";
                                    // $resultado=mysql_query($consulta);

                                    

                                    // WHILE($linea=mysql_fetch_array($resultado))
                                    //  {
                                    //       echo "<option value= $linea[codigo]> $linea[nombre]</option>";
                                    //  }




                                // $query = 'SELECT codigo, nombre FROM sa_tipos_solicitud';
                                // $result = mysql_query($query);

                                //  while ($fila = mysql_fetch_array($result)) {
                                //    echo "<option value= $fila[codigo]> $fila[nombre]</option>";
                                //  }
                              
                                  ?>
                            </select>
                        </div>
                    </div>
                   
                    <div class="row">
                        <label class="control-label col-sm-2"></label>
                        <div class="checkbox col-sm-4">
                            <label>
                                <input type="checkbox" id="himno" name="himno" value="0"><strong>Solicitud aplica para himno</strong>
                            </label>                                
                        </div>                            
                    </div>
                    <br>
                    
                    <div class="row">                            
                        <label class="control-label col-sm-2" id="lfecha" name="lfecha" hidden>Fecha</label>
                        <div class="col-sm-3">
                            <input type="date" name="fecha" id="fecha" hidden><span class="">
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-8">
                            <p aling ="right">
                                <button class="btn btn-primary btn-primary col-sm-offset-10" ><span class=" glyphicon glyphicon-floppy-disk"></span> Guardar</button> 
                            </p>          
                        </div>                            
                    </div>                                                            
                </form>
            </div>
        </div>
    </div>                                    
</div>                        
