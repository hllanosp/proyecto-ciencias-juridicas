<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $maindir = "../../";

require_once($maindir."fpdf/fpdf.php");
require($maindir."conexion/config.inc.php");

define( 'FPDF_FONTPATH', 'font/' );
require_once( 'FlowingBlockFPDF.php' );

$nombreTemporal = "KEVIN ALEXANDER VALLADARES ARGUELLO";
$numCuentaTemporal = "20070000804";
$numIdentidadTemporal = "1701-1989-00998";
$calificacion = "100 POR CIENTO(%)";
$nombreSecretario = "JORGE ALBERTO MATUTE OCHOA";
$fechaPalabras = "veintidós días del mes de julio de dos mil quince.";

if(isset($_POST["arregloHimno"]) && isset($_POST["cadena"])){
    $listaDNI = $_POST["arregloHimno"];
    $tok = explode(',', $listaDNI);
    $tam = count($tok);
    
    $pdf = new PDF('P', 'cm', array(21.59, 33.02));
    
    $pdf->AddFont('Calibri', 'B', 'calibrib.php');
    $pdf->AddFont('Cambria', 'BI', 'cambriaz.php');
    $pdf->AddFont('Cambria', 'I', 'cambriai.php');    
    
    for($i = 0; $i < $tam; $i++){
        $statement = $db->prepare('CALL SP_OBTENER_ESTUDIANTE_CONDUCTA(?, @pcMensajeError)');
        $statement->bindValue(1, $tok[$i]);
        $statement->execute();
        $contadorFilas = $statement->rowCount();

        if($contadorFilas >= 1){
            $tabla = $statement->fetchALL(PDO::FETCH_ASSOC);
        }

        foreach($tabla as $fila){
            $nombreTemporal = mb_strtoupper($fila['NOMBRE'], 'utf-8');
            $numCuentaTemporal = $fila['CUENTA'];
            $numIdentidadTemporal = $fila['DNI'];
        }

        $fechaPalabras = $_POST['cadena'];
        $statement->nextRowSet();
        $statement->closeCursor();
        
        $pdf->AddPage();
        $pdf->Image($maindir.'assets/img/Encabezado de documentos.jpg', 0.40, 0.05, 20.96, 3.22, 'JPG');
        $pdf->Image($maindir."assets/img/Pie de documentos.jpg", 0.40, 19.1, 20.88, 13.7, 'JPG');
        $pdf->SetRightMargin(1.0);
        $pdf->SetLeftMargin(1.0);
        $pdf->SetFont('Calibri', 'B', 11);
        $pdf->Cell(0, -0.45, utf8_decode("FACULTAD DE CIENCIAS JURÍDICAS    "), 0, 0, 'R');
        $pdf->Ln(0.2);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 0, utf8_decode("Teléfono: 2232-2290    "), 0, 1, 'R');
        $pdf->Ln(0.41);
        $pdf->Cell(0, 0, utf8_decode("Edificio A-2    "), 0, 1, 'R');
        $pdf->Ln(0.41);
        $pdf->Cell(0, 0, utf8_decode("Ciudad Universitaria    "), 0, 1, 'R');
        $pdf->Ln(0.41);
        $pdf->Cell(0, 0, utf8_decode("Tegucigalpa, Honduras    "), 0, 1, 'R');

        $pdf->ln(3.5);
        $pdf->SetFont('Cambria', 'BI', 16);
        $pdf->Cell(0, 0, utf8_decode("CONSTANCIA DE HIMNO"), 0, 1, 'C');

        $pdf->Ln(2.9);
        $pdf->SetFont('Cambria', 'I', 16);
        $pdf->SetLeftMargin(2.2);
        $pdf->SetRightMargin(2.2);

        $pdf->newFlowingBlock(17.0, 1.0, 0, 'J');
        $pdf->SetFont('Cambria', 'I', 16);
        $pdf->WriteFlowingBlock(utf8_decode('El Suscrito, Secretario de la Facultad de Ciencias Jurídicas de la Universidad Nacional '
                . 'Autónoma de Honduras, '));
        $pdf->setFont('Cambria', 'BI', 16);
        $pdf->WriteFlowingBlock(utf8_decode('HACE CONSTAR: '));
        $pdf->setFont('Cambria', 'I', 16);
        $pdf->WriteFlowingBlock(utf8_decode('Que '));
        $pdf->setFont('Cambria', 'BI', 16);
        $pdf->WriteFlowingBlock(utf8_decode($nombreTemporal));
        $pdf->setFont('Cambria', 'I', 16);
        $pdf->WriteFlowingBlock(utf8_decode(' con Número de Cuenta '));
        $pdf->setFont('Cambria', 'BI', 16);
        $pdf->WriteFlowingBlock(utf8_decode($numCuentaTemporal));
        $pdf->setFont('Cambria', 'I', 16);
        $pdf->WriteFlowingBlock(utf8_decode(' y Tarjeta de Identidad '));
        $pdf->setFont('Cambria', 'BI', 16);
        $pdf->WriteFlowingBlock(utf8_decode($numIdentidadTemporal));
        $pdf->setFont('Cambria', 'I', 16);
        $pdf->WriteFlowingBlock(utf8_decode(', ha realizado Examen del Himno Nacional de la República de Honduras, habiendo obtenido una '
                . 'calificación de  '));
        $pdf->setFont('Cambria', 'BI', 16);
        $pdf->WriteFlowingBlock(utf8_decode($calificacion).'.');
        $pdf->finishFlowingBlock();

        $pdf->Ln(1.9);
        $pdf->SetFont('Cambria', 'I', 16);
        $pdf->SetLeftMargin(2.2);
        $pdf->SetRightMargin(2.2);

        $pdf->newFlowingBlock(17.0, 1.0, 0, 'J');
        $pdf->setFont('Cambria', 'I', 16);
        $pdf->WriteFlowingBlock(utf8_decode("En fe de lo cual, firmo la presente en la Ciudad Universitaria, Tegucigalpa, Municipio del "
                . "Distrito Central, a los ".$fechaPalabras.""));
        $pdf->finishFlowingBlock();

        $pdf->Ln(4);
        $pdf->SetFont('Cambria', 'BI', 16);
        $pdf->Cell(0,0, utf8_decode($nombreSecretario), 0 , 1, 'C');
        $pdf->Ln(0.6);
        $pdf->Cell(0,0, utf8_decode("SECRETARIO ACADÉMICO"), 0 , 1, 'C');      
        
    }
    
    $pdf->Output('ConstanciaHimnoEgresado.pdf', 'I');  
}
?>
