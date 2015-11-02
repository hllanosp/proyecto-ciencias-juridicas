<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $maindir = "../../";

//require($maindir."fpdf/makefont/makefont.php");
//MakeFont("C:\\Users\\owner\\Desktop\\cambriai.ttf", 'cp1252');

require_once($maindir."fpdf/fpdf.php");
require($maindir."conexion/config.inc.php");
define( 'FPDF_FONTPATH', 'font/' );
require_once( 'FlowingBlockFPDF.php' );

$pdf = new PDF('P', 'cm', array(21.59, 35.56));

$pdf->AddFont('Calibri', 'B', 'calibrib.php');
$pdf->AddFont('Cambria', 'BI', 'cambriaz.php');
$pdf->AddFont('Cambria', 'I', 'cambriai.php');

$pdf->AddPage();
$pdf->Image($maindir.'assets/img/Encabezado de documentos.jpg', 0.40, 0.05, 20.96, 3.22, 'JPG');
$pdf->Image($maindir."assets/img/Pie de documentos.jpg", 0.40, 21.6, 20.88, 13.7, 'JPG');
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

$pdf->ln(4);
$pdf->SetFont('Cambria', 'BI', 18);
$pdf->Cell(0, 0, utf8_decode("C E R T I F I C A C I O N"), 0, 1, 'C');

$pdf->Ln(1.9);
$pdf->SetFont('Cambria', 'I', 14);
$pdf->SetLeftMargin(2.2);
$pdf->SetRightMargin(2.2);

$nombreTemporal = "<<NOMBRE DEL ESTUDIANTE>>";
$numCuentaTemporal = "<<CUENTA DEL ESTUDIANTE>>";
$numIdentidadTemporal = "<<ID DEL ESTUDIANTE>>";
$añoInicio = "2010";
$abogado = "ERLINDA ESPERANZA FLORES FLORES";

$pdf->newFlowingBlock(17.0, 1.0, 0, 'J');
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode('El Suscrito, Secretario de la Facultad de Ciencias Jurídicas de la Universidad Nacional '
        . 'Autónoma de Honduras, '));
$pdf->SetFont('Cambria', 'BI', 14);
$pdf->WriteFlowingBlock(utf8_decode('CERTIFICA: '));
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode('Que la firma de la Abogada '));
$pdf->SetFont('Cambria', 'BI', 14);
$pdf->WriteFlowingBlock(utf8_decode($abogado));
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode(', puesta en su condición de Directora del Consultorio Jurídico Gratuito dependiente de '
        . 'la Facultad de Ciencias Jurídicas de la UNAH, '));
$pdf->SetFont('Cambria', 'BI', 14);
$pdf->WriteFlowingBlock(utf8_decode('en la Constancia de Práctica Profesional Supervisada, '));
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode('expedida a favor de '));
$pdf->SetFont('Cambria', 'BI', 14);
$pdf->WriteFlowingBlock(utf8_decode($nombreTemporal));
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode(', con número de Cuenta '));
$pdf->SetFont('Cambria', 'BI', 14);
$pdf->WriteFlowingBlock(utf8_decode($numCuentaTemporal));
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode(', es AUTENTICA por ser la que usa la Abogada Flores Flores en todos los Actos en los que '
        . 'interviene como tal.'));

$pdf->finishFlowingBlock();

//$pdf->MultiCell(0, 0.9, utf8_decode("El Suscrito, Secretario de la Facultad de Ciencias Jurídicas de la Universidad Nacional Autónoma "
//        . "de Honduras, CERTIFICA: Que  la firma de la Abogada ERLINDA ESPERANZA FLORES  FLORES, puesta en su condición de Directora "
//        . "del Consultorio Jurídico Gratuito dependiente de la Facultad de Ciencias Jurídicas de la UNAH,  en la Constancia de Práctica "
//        . "Profesional Supervisada, expedida  a favor de ".$nombreTemporal.", con número de Cuenta ".$numCuentaTemporal.", es  AUTENTICA "
//        . "por ser la que usa la Abogada Flores Flores en todos los Actos  en los que interviene como tal."), 0, 'J');

$pdf->Ln(1.9);
$pdf->SetFont('Cambria', 'I', 14);
$pdf->SetLeftMargin(2.2);
$pdf->SetRightMargin(2.2);

$fechaPalabras = "<<Fecha en palabras>>";

$pdf->newFlowingBlock(17.0, 1.0, 0, 'J');
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode('En fe de lo cual firmo la presente '));
$pdf->SetFont('Cambria', 'BI', 14);
$pdf->WriteFlowingBlock(utf8_decode('CERTIFICACIÓN '));
$pdf->SetFont('Cambria', 'I', 14);
$pdf->WriteFlowingBlock(utf8_decode('en la Ciudad Universitaria, Tegucigalpa, Municipio del Distrito Central, a los '.$fechaPalabras).'.');
$pdf->finishFlowingBlock();

$pdf->Ln(3);
$pdf->SetFont('Cambria', 'BI', 16);
$nombreSecretario = "JORGE ALBERTO MATUTE OCHOA";
$pdf->Cell(0,0, utf8_decode($nombreSecretario), 0 , 1, 'C');
$pdf->Ln(0.6);
$pdf->Cell(0,0, utf8_decode("SECRETARIO"), 0 , 1, 'C');

$pdf->Output('Constancia PPS.pdf','I');
?>
