<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$mkdir = "../../../../";
include($mkdir."conexion/config.inc.php");

$statement = $db->prepare('CALL SP_OBTENER_SOLICITUDES_REPORTES(@pcMensajeError)');
$statement->execute();

$contadorFilas = $statement->rowCount();

if($contadorFilas >= 1){
    $tabla = $statement->fetchAll(PDO::FETCH_ASSOC);
}

$statement->nextRowSet();
$statement->closeCursor();

?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <label><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Generar Constancias </label>
    </div>
    <div class="panel-body ">
<!--        <div class="page-header">
            <h3>Filtros</h3>
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
        </label>-->
        <div class="col-md-12 well">
            <div class="table-responsive">
                <table id="lista_solicitudes" class="table table-striped table-bordered table-hover">
                    <thead class="well">
                        <tr>
                            <th>Cod</th>
                            <th>Estudiante</th>
                            <th>DNI</th>
                            <th>Fecha</th>
                            <th>Tipo Solicitud</th>
                            <th style="width: 40px">Exportar</th>
                        </tr>
                    <!--<a class="fa fa-file-pdf-o"></a>-->
                    </thead>
                    <tbody id="tablaBody">
                        <?php
                        foreach ($tabla as $fila){
                            echo '<tr>'.
                                    '<td>'.$fila['CODIGO'].'</td>'.
                                    '<td>'.$fila['NOMBRE'].'</td>'.
                                    '<td class="'.$fila['DNI'].'">'.$fila['DNI'].'</td>'.
                                    '<td>'.$fila['FECHA'].'</td>'.
                                    '<td>'.$fila['TIPOSOLICITUD'].'</td>'.
                                    '<td class="'.$fila['TIPOSOLICITUD'].'"><center><a title="'.$fila['TIPOSOLICITUD'].'" class="'.$fila['TIPOSOLICITUD'].' btn btn-danger fa fa-file-pdf-o"></a></center></td>'.
                                    '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button style="width: 200px; margin-top: 10px;" class="btn btn-primary pull-right" id="btnExportarTodos">Exportar Todas</button>
        </div>
        <div> 
        </div>
    </div>
    
    <div class="modal fade" id="modalHimno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Botón para cerrar la ventana -->
                    <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                    </button>
                    <!-- Título de la ventana -->
                    <h3 class="title">Constancia de Himno</h3>
                </div>
                <div class="modal-body" style="padding-left: 45px">
                    <div role="form" class="form-group form-horizontal">
                        <div class="row">
                            <label class="label label-default">Fecha en la que se emite la constancia:</label>
                        </div>
                        <input placeholder="ejem: siete dias del mes de noviembre de dos mil quince." style="margin-bottom: 10px; margin-top: 10px; width: 450px" class="form-control" id="txtFechaPalabrasHimno" type="text">

<!--                        <div class="row">
                            <label class="label label-default">Recibio sanci&oacute;n:</label>
                        </div>
                        
                        <div class="input-group">
                            <div>
                                <label class="radio-primary">
                                    <input type="radio" name="opciones" id="opciones_1" value="false" checked>
                                    No recibio sanci&oacute;n.
                                </label>                                
                            </div>
                            <div>
                                <label class="radio-primary">
                                    <input type="radio" name="opciones" id="opciones_2" value="true">
                                    S&iacute; recibio sanci&oacute;n.
                                </label> 
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAceptarHimno" class="btn btn-success">Aceptar</button>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="modal fade" id="modalConducta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Botón para cerrar la ventana -->
                    <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                    </button>
                    <!-- Título de la ventana -->
                    <h3 class="title">Constancia de Conducta</h3>
                </div>
                <div class="modal-body" style="padding-left: 45px">
                    <div role="form" class="form-group form-horizontal">
                        <div class="row">
                            <label class="label label-default">Fecha en la que se emite la constancia:</label>
                        </div>
                        <input placeholder="ejem: siete dias del mes de noviembre de dos mil quince." style="margin-bottom: 10px; margin-top: 10px; width: 450px" class="form-control" id="txtFechaPalabrasConducta" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAceptarConducta" class="btn btn-success">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalPPS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Botón para cerrar la ventana -->
                    <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                    </button>
                    <!-- Título de la ventana -->
                    <h3 class="title">Certificaci&oacute;n de Practica Profesional</h3>
                </div>
                <div class="modal-body" style="padding-left: 45px">
                    <div role="form" class="form-group form-horizontal">
                        <div class="row">
                            <label class="label label-default">Fecha en la que se emite la certificaci&oacute;n:</label>
                        </div>
                        <input placeholder="ejem: siete dias del mes de noviembre de dos mil quince." style="margin-bottom: 10px; margin-top: 10px; width: 450px" class="form-control" id="txtFechaPalabrasPPS" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAceptarPPS" class="btn btn-success">Aceptar</button>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="modal fade" id="modalEgresado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Botón para cerrar la ventana -->
                    <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                    </button>
                    <!-- Título de la ventana -->
                    <h3 class="title">Constancia de Egresado</h3>
                </div>
                <div class="modal-body" style="padding-left: 45px">
                    <div role="form" class="form-group form-horizontal">
                        <div class="row">
                            <label class="label label-default">Fecha en la que se emite la constancia:</label>
                        </div>
                        <input placeholder="ejem: siete dias del mes de noviembre de dos mil quince." style="margin-bottom: 10px; margin-top: 10px; width: 450px" class="form-control" id="txtFechaPalabrasEgresado" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAceptarEgresado" class="btn btn-success">Aceptar</button>
                </div>
            </div>
        </div>
    </div>    
    
</div>

<script>
    $(document).ready(function(){
        var table = $("#lista_solicitudes").DataTable();
        var DNI;
        var matrizConducta = [];
        var matrizPPS = [];
        var matrizHimno = []; //al parecer solo se enviaran los dni
        var matrizEgresado = [];
        
        $(".Constancia.de.Egresado").click(function(){
            DNI = $(this).parents("tr").find("td").eq(2).attr('class');
            matrizEgresado[0] = DNI;
            $("#modalEgresado").modal("show");
            $("#txtFechaPalabrasEgresado").val(null);
        });
        
        $("#btnAceptarEgresado").click(function(){
            if(!$.trim($("#txtFechaPalabrasEgresado").val())){
                alert("Introduzca la fecha en la que se emitie la constancia")
            }
            else{
                var cadena = $.trim($("#txtFechaPalabrasEgresado").val());
                var arregloEgresado = matrizEgresado.toString();
                submit_post_via_hidden_form(
                    'pages/SecretariaAcademica/ConstanciaEgresado.php',
                    {
                        arregloEgresado: arregloEgresado,
                        cadena: cadena
                    }
                );
                $("#modalEgresado").modal("hide");
            }
        });
          
        $(".Certificación.para.PPS").click(function(){
            DNI = $(this).parents("tr").find("td").eq(2).attr('class');
            matrizPPS[0] = DNI;
            $("#modalPPS").modal("show");
            $("#txtFechaPalabrasPPS").val(null);
        });
        
        $("#btnAceptarPPS").click(function(){
            if(!$.trim($("#txtFechaPalabrasPPS").val())){
                alert("Introduzca la fecha en la que se emitie la certificación");
            }
            else{
                var cadena = $.trim($("#txtFechaPalabrasPPS").val());
                var arregloPPS = matrizPPS.toString();
                submit_post_via_hidden_form('pages/SecretariaAcademica/ConstanciaPPS.php',
                    {
                        arregloPPS: arregloPPS,
                        cadena: cadena
                    }
                );
                $("#modalPPS").modal("hide");
            }
        });
        
        $(".Constancia.de.Conducta").click(function(){
            DNI = $(this).parents("tr").find("td").eq(2).attr('class');
            matrizConducta[0] = DNI;
            $("#modalConducta").modal("show");
            $("#txtFechaPalabrasConducta").val(null);
        });
        
        $("#btnAceptarConducta").click(function(){
            if(!$.trim($("#txtFechaPalabrasConducta").val())){
                alert("Introduzca la fecha en la que se emitie la constancia");
            }
            else{
                var cadena = $.trim($("#txtFechaPalabrasConducta").val());
                var arregloConducta = matrizConducta.toString();
                submit_post_via_hidden_form(
                    'pages/SecretariaAcademica/ConstanciaConducta.php',
                    {
                        arregloConducta: arregloConducta,
                        cadena: cadena
                    }
                );                
                $("#modalConducta").modal("hide");
            }
        });
                
        $(".Constancia.de.Himno").click(function(){
            DNI = $(this).parents("tr").find("td").eq(2).attr('class');
            matrizHimno[0] = DNI;
            $("#modalHimno").modal("show");
            $("#txtFechaPalabrasHimno").val(null);
        });
        
        $("#btnAceptarHimno").click(function(){
            if(!$.trim($("#txtFechaPalabrasHimno").val())){
                alert("Introduzca la fecha en la que se emitie la constancia");
            }
            else{
                var cadena = $.trim($("#txtFechaPalabrasHimno").val());
                var arregloHimno = matrizHimno.toString();
                submit_post_via_hidden_form(
                    'pages/SecretariaAcademica/ConstanciaHimno.php',
                    {
                        arregloHimno: arregloHimno,
                        cadena: cadena
                    }
                );                
                $("#modalHimno").modal("hide");
            }
        });
        
        $("#btnExportarTodos").click(function(){
            var matrizSolicitudes = [];
            
            var i = 0;
            var ini = false;
            var contHimno = 0;
            var contPPS = 0;
            var contConducta = 0;
            var contEgresado = 0;
            
//            var matrizConducta = [];
//            var matrizPPS = [];
//            var matrizHimno = []; //al parecer solo se enviaran los dni
//            var matrizEgresado = [];
            
            $("#lista_solicitudes tr").each(function(){
                if(ini){
                    matrizSolicitudes[i] = [$(this).find("td").eq(2).attr('class'), $(this).find("td").eq(5).attr('class')];
                    i++;
                }
                else{
                    ini = true;
                }
            });
            
            for(var i = 0; i < matrizSolicitudes.length; i++){
                //alert(matrizSolicitudes[i][1]);
                
                if(matrizSolicitudes[i][1] === "Constancia de Himno"){
                    matrizHimno[contHimno] = matrizSolicitudes[i][0];
                    //alert(matrizHimno[0]);
                    contHimno++;
                }
                
                if(matrizSolicitudes[i][1] === "Certificación para PPS"){
                    
                    matrizPPS[contPPS] = [matrizSolicitudes[i][0]];
                    contPPS++;
                }
                
                if(matrizSolicitudes[i][1] === "Constancia de Conducta"){
                    matrizConducta[contConducta] = matrizSolicitudes[i][0];
                    contConducta++;
                }
                
                if(matrizSolicitudes[i][1] === "Constancia de Egresado"){
                    matrizEgresado[contEgresado] = matrizSolicitudes[i][0];
                    contEgresado++;
                }
            }
            
            if(matrizHimno.length >= 1){
                $("#modalHimno").modal("show");
                $("#txtFechaPalabrasHimno").val(null);
            }
            
            if(matrizConducta.length >= 1){
                $("#modalConducta").modal("show");
                $("#txtFechaPalabrasConducta").val(null);
            }
            
            if(matrizPPS.length >= 1){
                $("#modalPPS").modal("show");
                $("#txtFechaPalabrasConducta").val(null);
            }
            
            if(matrizEgresado.length >= 1){
                $("#modalEgresado").modal("show");
                $("#txtFechaPalabrasEgresado").val(null);
            }
        });
        
        //PROVISIONAL los eventos click siguientes
        $("#btnExportarDocumentos1").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaConducta.php');
        });

        $("#btnExportarDocumentos2").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaHimno.php');

            //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
        });

        $("#btnExportarDocumentos3").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaEgresado.php');
            //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
        });    

        $("#btnExportarDocumentos4").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaPPS.php');
            //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
        });
    });
    
                        
    function submit_post_via_hidden_form(url, params) {
        var f = $("<form target='_blank' method='POST' style='display:none;'></form>").attr({
            action: url
        }).appendTo(document.body);

        for (var i in params) {
            if (params.hasOwnProperty(i)) {
                $('<input type="hidden" />').attr({
                    name: i,
                    value: params[i]
                }).appendTo(f);
            }
        }

        f.submit();

        f.remove();
    }
</script>