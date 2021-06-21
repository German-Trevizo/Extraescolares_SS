<?php
session_start();
include 'Invoice.php';


$invoice = new Invoice();
$invoice->checkLoggedIn();


if (!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
	echo $_GET['invoice_id'];
	$invoiceValues = $invoice->getInvoice($_GET['invoice_id']);
	$invoiceItems = $invoice->getInvoiceItems($_GET['invoice_id']);
}
$invoiceDate = date("d/M/Y", strtotime($invoiceValues['fecha_hoy']));
require "../fpdf/fpdf.php";
ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start();
$pdf = new FPDF($orientation = 'P', $unit = 'mm', $size = 'A4');
$pdf->AddPage();
$pdf->AddFont('CalibriR', '', 'calibri-regular.php');
$pdf->AddFont('Calibri', '', 'calibri-bold.php');
$pdf->Image('../img/itsncg.jpg', 28, 9, 19, 20);
$pdf->SetFont('Arial', 'B', 16);
$textypos = 5;
$pdf->setY(8);
$pdf->setX(56);
// Agregamos los datos de la empresa
$pdf->Cell(5, $textypos, utf8_decode("INSTITUTO TECNOLÓGICO SUPERIOR"));
$pdf->setY(14);
$pdf->setX(68);
$pdf->Cell(5, $textypos, utf8_decode("DE NUEVO CASAS GRANDES"));



$pdf->SetFont('Calibri', '', 11);
$pdf->setY(29);
$pdf->setX(59);
$pdf->Cell(5, $textypos, utf8_decode("CEDULA DE INSCRIPCION A GRUPO CULTURAL O DEPORTIVO"));



$pdf->setY(36);
$pdf->setX(128);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "FECHA");
$pdf->setY(36);
$pdf->setX(141);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(61, $textypos, utf8_decode(date("d/m/Y", strtotime($invoiceValues['fecha_hoy']))), 'B');

//--------------------------------
$pdf->setY(44);
$pdf->setX(89);

$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(55, $textypos, utf8_decode("DATOS ACADÉMICOS"));
$pdf->setY(49);
$pdf->setX(18);
$pdf->SetLineWidth(0.4);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, 33, "", 'LRTB');

$pdf->setY(52);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, "NOMBRE");
//---INVOICE
$pdf->setY(52);
$pdf->setX(40);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(160, $textypos, utf8_decode($invoiceValues['nombre']), 'B');


$pdf->setY(60);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, "CARRERA");
//---INVOICE
$pdf->setY(60);
$pdf->setX(40);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(76, $textypos, utf8_decode($invoiceValues['carrera']), 'B');

$pdf->setY(60);
$pdf->setX(118);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, utf8_decode("NÚM. DE CONTROL"));
//---INVOICE
$pdf->setY(60);
$pdf->setX(155);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(45, $textypos, utf8_decode($invoiceValues['num_control_alumno']), 'B');



$pdf->setY(68);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, "SEMESTRE");
//---INVOICE
$pdf->setY(68);
$pdf->setX(40);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(28, $textypos, utf8_decode($invoiceValues['semestre']), 'B');

$pdf->setY(68);
$pdf->setX(69.5);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, "TURNO");
//---INVOICE
$pdf->setY(68);
$pdf->setX(83.5);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(32, $textypos, utf8_decode($invoiceValues['num_control_alumno']), 'B');


$pdf->setY(68);
$pdf->setX(116);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, "SEXO");
//---INVOICE
if ((utf8_decode($invoiceValues['sexo'])) == 'F') {
	$pdf->setY(68);
	$pdf->setX(130.5);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(7, $textypos, "X", 'TLRB', '', 'C');
	$pdf->setY(68);
	$pdf->setX(138.5);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(186, $textypos, "F");
	//---INVOICE
	$pdf->setY(68);
	$pdf->setX(155);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(7, $textypos, "", 'TLRB', '', 'C');

	$pdf->setY(68);
	$pdf->setX(162);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(186, $textypos, "M");
} else {
	$pdf->setY(68);
	$pdf->setX(130.5);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(7, $textypos, "", 'TLRB', '', 'C');
	$pdf->setY(68);
	$pdf->setX(138.5);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(186, $textypos, "F");
	//---INVOICE
	$pdf->setY(68);
	$pdf->setX(155);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(7, $textypos, "X", 'TLRB', '', 'C');

	$pdf->setY(68);
	$pdf->setX(162);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(186, $textypos, "M");
}







$pdf->setY(75);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, $textypos, utf8_decode("NÚMERO DE SEGURO SOCIAL"));
//---INVOICE
$pdf->setY(74);
$pdf->setX(73.5);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(126.5, $textypos, utf8_decode($invoiceValues['numero_seguro_social']), 'B');

/////
$pdf->setY(85);
$pdf->setX(89);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(55, $textypos, "DATOS INFORMATIVOS");
$pdf->setY(89.8);
$pdf->setX(18);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, 40, "", 'LRTB');

$pdf->setY(91.5);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "DOMICILIO");
//---INVOICE
$pdf->setY(91.5);
$pdf->setX(40.5);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(160, $textypos, utf8_decode($invoiceValues['domicilio']), 'B');

$pdf->setY(99);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, utf8_decode("TELÉFONO"));
$pdf->setY(99);
$pdf->setX(42);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "CASA");
//---INVOICE
$pdf->setY(99);
$pdf->setX(55);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(33.5, $textypos, utf8_decode($invoiceValues['telefono_casa']), 'B');

$pdf->setY(99);
$pdf->setX(92);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "CEL.");
//---INVOICE
$pdf->setY(99);
$pdf->setX(102);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(36, $textypos, utf8_decode($invoiceValues['telefono_cel']), 'B');

$pdf->setY(99);
$pdf->setX(140);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "TRABAJO");
//---INVOICE
$pdf->setY(99);
$pdf->setX(158);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(42, $textypos, utf8_decode($invoiceValues['telefono_trabajo']), 'B');

$pdf->setY(107);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "FECHA DE NACIMIENTO");
//---INVOICE
$pdf->setY(107);
$pdf->setX(62);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(50, $textypos, utf8_decode(date("d/m/Y", strtotime($invoiceValues['fecha_nacimiento']))), 'B');

$pdf->setY(107);
$pdf->setX(117);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "CURP");
//---INVOICE
$pdf->setY(107);
$pdf->setX(130);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(70, $textypos, utf8_decode($invoiceValues['curp']), 'B');

$pdf->setY(115);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "TIPO DE SANGRE");
//---INVOICE
$pdf->setY(115);
$pdf->setX(51);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(25, $textypos, utf8_decode($invoiceValues['tipo_de_sangre']), 'B');

$pdf->setY(115);
$pdf->setX(78);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "LUGAR DE NACIMIENTO");
//---INVOICE
$pdf->setY(115);
$pdf->setX(120);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(80, $textypos, utf8_decode($invoiceValues['lugar_nacimiento']), 'B');

$pdf->setY(123);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, utf8_decode("ESTATURA"));
//---INVOICE
$pdf->setY(123);
$pdf->setX(40);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(33.5, $textypos, utf8_decode($invoiceValues['estatura']), 'B');

$pdf->setY(123);
$pdf->setX(76);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "PESO");
//---INVOICE
$pdf->setY(123);
$pdf->setX(88);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(42, $textypos, utf8_decode($invoiceValues['peso']), 'B');



///////


$pdf->setY(132);
$pdf->setX(89);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(55, $textypos, "DATOS PERSONALES");
$pdf->setY(137);
$pdf->setX(18);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, 18, "", 'LRTB');

$pdf->setY(140);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, utf8_decode("Correo Electrónico"));
//---INVOICE
$pdf->setY(140);
$pdf->setX(52);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(148, $textypos, utf8_decode($invoiceValues['email_alumno']), 'B');

if ((utf8_decode($invoiceValues['alergias'])) == 'SI') {

	$pdf->setY(148);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "ALERGIAS");
	$pdf->setY(148);
	$pdf->setX(39);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "NO");
	//---INVOICE
	$pdf->setY(148);
	$pdf->setX(47);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');

	$pdf->setY(148);
	$pdf->setX(56);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SI");
	//---INVOICE
	$pdf->setY(148);
	$pdf->setX(62);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');

	$pdf->setY(148);
	$pdf->setX(72);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("ESPECIFIQUE"));
	//---INVOICE
	$pdf->setY(148);
	$pdf->setX(94.5);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(105, $textypos, utf8_decode($invoiceValues['alergias_e']), 'B');
} else {
	$pdf->setY(148);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "ALERGIAS");
	$pdf->setY(148);
	$pdf->setX(39);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "NO");
	//---INVOICE
	$pdf->setY(148);
	$pdf->setX(47);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');

	$pdf->setY(148);
	$pdf->setX(56);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SI");
	//---INVOICE
	$pdf->setY(148);
	$pdf->setX(62);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');

	$pdf->setY(148);
	$pdf->setX(72);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("ESPECIFIQUE"));
	//---INVOICE
	$pdf->setY(148);
	$pdf->setX(94.5);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(105, $textypos, "", 'B');
}



/////


$pdf->setY(158);
$pdf->setX(61);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(55, $textypos, "ACTIVIDADES EXTRAESCOLARES Y/O COMPLEMENTARIAS");
$pdf->setY(163);
$pdf->setX(18);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, 37, "", 'LRTB');


if ((utf8_decode($invoiceValues['actividades'])) == 'OTRAS') {



	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, utf8_decode($invoiceValues['actividades_e']), 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'DANZA') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'MUSICA') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'PINTURA') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'BANDA-DE-GUERRA') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'BASQUET-BOL') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'VOLEIBOL') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'ATLETISMO') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'BEISBOL') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'SOCCER') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'KARATE-DO') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'TAE-KWON-DO') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'AJEDREZ') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'STAFF') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
} else if ((utf8_decode($invoiceValues['actividades'])) == 'PESAS') {

	$pdf->setY(166);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "CULTURALES");
	//------------
	$pdf->setY(172);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "DANZA");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("MÚSICA"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "PINTURA");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BANDA DE GUERRA");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(63);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "DEPORTIVAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BASQUET BOL");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("VOLEIBOL"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "ATLETISMO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(70);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "BESISBOL");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(64);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');




	//------------
	$pdf->setY(172);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "SOCCER");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("KARATE DO"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "TAE KWON DO");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(108);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "AJEDREZ");
	//---INVOICE
	$pdf->setY(193);
	$pdf->setX(102);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');


	$pdf->setY(166);
	$pdf->setX(138);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//------------
	$pdf->setY(172);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "STAFF");
	//---INVOICE
	$pdf->setY(172);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(179);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, utf8_decode("PESAS"));
	//---INVOICE
	$pdf->setY(179);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", 'TLRB', '', 'C');
	//------------
	$pdf->setY(186);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(5, $textypos, "OTRAS");
	//---INVOICE
	$pdf->setY(186);
	$pdf->setX(139);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
	//------------
	$pdf->setY(193);
	$pdf->setX(145);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(54, $textypos, "", 'B', '', 'C');
}






////////////////////////////////////////////////

$pdf->setY(202);
$pdf->setX(48);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(55, $textypos, "EXCLUSIVO DEPARTAMENTO ACTIVIDADES EXTRAESCOLARES");
$pdf->setY(207);
$pdf->setX(18);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(186, 41, "", 'LRTB');


$pdf->setY(210);
$pdf->setX(26);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "SERVICIO SOCIAL");
//---INVOICE
if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'SERVICIO-SOCIAL') {
	$pdf->setY(210);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", '', '', 'C');
}
$pdf->setY(210);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
//---INVOICE
$pdf->setY(210);
$pdf->setX(57);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(140, $textypos, '', 'B');

if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'SERVICIO-SOCIAL') {
	$pdf->setY(210);
	$pdf->setX(57);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(140, $textypos, utf8_decode($invoiceValues['exclusivo_servicio_e']), '');
}
//------------
$pdf->setY(217);
$pdf->setX(26);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, utf8_decode("ACTIVIDAD COMPLEMENTARIA"));
if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'ACTIVIDADES-COMPLEMENTARIAS') {
	$pdf->setY(217);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", '', '', 'C');
}
//---INVOICE
$pdf->setY(217);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
//
$pdf->setY(217);
$pdf->setX(80);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "CUAL:", '');

if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'ACTIVIDADES-COMPLEMENTARIAS') {
	$pdf->setY(217);
	$pdf->setX(94);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(103, $textypos, utf8_decode($invoiceValues['exclusivo_servicio_e']), '');
}
$pdf->setY(217);
$pdf->setX(94);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(103, $textypos, '', 'B');

//------------
$pdf->setY(224);
$pdf->setX(26);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "BECA");
if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'BECA') {
	$pdf->setY(224);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", '', '', 'C');
}
//---INVOICE
$pdf->setY(224);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
//
$pdf->setY(224);
$pdf->setX(38);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(5, $textypos, "TIPO:", '');
if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'BECA') {
	$pdf->setY(224);
	$pdf->setX(50);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(147, $textypos, utf8_decode($invoiceValues['exclusivo_servicio_e']), '');
}

$pdf->setY(224);
$pdf->setX(50);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(147, $textypos, '', 'B');

//------------
$pdf->setY(231);
$pdf->setX(26);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "OTRAS ACTIVIDADES DE SERVICIO SOCIAL");
if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'OTRAS-ACTIVIDADES-DE-SERVICIO-SOCIAL') {
	$pdf->setY(231);
	$pdf->setX(20);
	$pdf->SetFont('Calibri', '', 11);
	$pdf->Cell(5, $textypos, "X", '', '', 'C');
}
//---INVOICE
$pdf->setY(231);
$pdf->setX(20);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(5, $textypos, "", 'TLRB', '', 'C');
//---INVOICE
if ((utf8_decode($invoiceValues['exclusivo_servicio'])) == 'OTRAS-ACTIVIDADES-DE-SERVICIO-SOCIAL') {
	$pdf->setY(237);
	$pdf->setX(26);
	$pdf->SetFont('CalibriR', '', 11);
	$pdf->Cell(172, $textypos, utf8_decode($invoiceValues['exclusivo_servicio_e']), '');
}
$pdf->setY(237);
$pdf->setX(26);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(172, $textypos, '', 'B');
/////////////////////////////////

$pdf->setY(254);
$pdf->setX(71);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(55, $textypos, utf8_decode("Liderazgo, Calidad y Formación de Excelencia."));
$pdf->SetAutoPageBreak(false);

$pdf->setY(272);
$pdf->setX(21.5);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(77, $textypos, "", 'B');
$pdf->setY(272);
$pdf->setX(117.5);
$pdf->SetFont('Calibri', '', 11);
$pdf->Cell(80, $textypos, "", 'B');

$pdf->setY(277);
$pdf->setX(35);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(60, $textypos, "FIRMA DEL INSTRUCTOR");


$pdf->setY(277);
$pdf->setX(140);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(55, $textypos, "FIRMA DEL ALUMNO", '', 'C');

$pdf->SetAutoPageBreak(false);
$pdf->setY(282);
$pdf->setX(20);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(55, $textypos, "00/1114");


$pdf->setY(282);
$pdf->setX(176);
$pdf->SetFont('CalibriR', '', 11);
$pdf->Cell(55, $textypos, "F-AE-11");

$pdf->output();
ob_end_flush();
?>;