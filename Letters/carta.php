<?php
require_once "../resources/libs/fpdf/fpdf.php";
require_once "../models/Practicas.php";

$model = new Practicas();
$request = $model->getPracticaToPDF($_GET['ID']);
$res = json_decode($request);
$instituto = utf8_decode($res->nombre_ins);
$tipo = $res->tipo == 'S' ? "su SERVICIO SOCIAL" : "sus PRACTICAS PROFECIONALES";

date_default_timezone_set('America/Mexico_City');
$fecha =  date('l jS \of F Y h:i:s A');
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$mes = $meses[date('n') - 1];

$fechaI = explode('-', $res->inicio);
$fechaF = explode('-', $res->fin);
$mesI = $meses[intval($fechaI[1]) - 1];
$mesF = $meses[intval($fechaF[1]) - 1];
$nameDoc = $res->nombre."_".$res->app."_".$res->apm;

$fpdf = new FPDF();
$fpdf->SetTitle("Carta Aceptacion-$nameDoc");
$fpdf->AddPage('P', 'Letter', '0');
$fpdf->SetFont('Arial', 'B', 11);
$fpdf->Image('../resources/pictures/icons/Logo.png', 20, 5, 50, 35);

$fpdf->Ln(7);

$fpdf->Cell(70, 10, '');
$fpdf->MultiCell(120, 8, "ASOCIACION NACIONAL PARA EL  DESARROLLO INTEGRAL \n COMUNITARIO A.C.", 0, 'C');

$fpdf->Ln(10);

$fpdf->SetFont('Arial', 'I', 10);
$fpdf->MultiCell(180, 5, "CDMX a " . date('d') . " de $mes del " . date('Y') . "\n OFICIO No. VINC/$res->folio_p/2022", 0, 'R');

$fpdf->Ln(10);

$fpdf->SetFont('Arial', 'B', 11);
$fpdf->MultiCell(0, 5, "$res->repre \nDIRECTOR (A) DEL $instituto\nP R E S E N T E.", 0, 'L');

$fpdf->Ln(10);

$fpdf->SetFont('Arial', 'B', 11);
$fpdf->MultiCell(0, 5, utf8_decode("AT´N: $res->sub \nJEFA (E) DEL DPTO.  DE VINCULACIÓN"), 0, 'R');

$fpdf->Ln(20);

$fpdf->SetFont('Arial', '');
$fpdf->MultiCell(0, 5, utf8_decode("Por medio de la presente me permito informarle que el (la) C. $res->nombre $res->app $res->apm, estudiante de la carrera de $res->service, con número de control $res->matricula, fue aceptado(a) para realizar $tipo en la  Asociación Nacional para el Desarrollo Integral Comunitario A.C. , cubriendo un total de 240 horas, a partir del $fechaI[2] DE $mesI DEL $fechaI[0], concluyendo su estadia el $fechaF[2] DE $mesF del $fechaF[0]."), 0, 'J');

$fpdf->Ln(10);

$fpdf->Cell(0, 10, 'Agradezco las atenciones se sirva brindar al portador de la presente.', 0, 5, 'L');

$fpdf->Ln(15);

$fpdf->SetFont('Arial', 'B');
$fpdf->Cell(60, 10, 'ATENTAMENTE', 0, 10, 'L');

$fpdf->Ln(25);

$fpdf->Cell(70, 5, 'JOSUE FRANCISCO GOMEZ MAYA', 0, 2, 'L');
$fpdf->Cell(70, 5, 'PRESIDENTE DE ANDIC A.C.', 0, 10, 'L');
$fpdf->SetFont('Arial', 'I', 7);
$fpdf->Cell(70, 5, 'JFGM/gm', 0, 10, 'L');

// Posición: a 1,5 cm del final
$fpdf->SetY(-25);
// Arial italic 8
$fpdf->SetFont('Arial', 'I', 8);
// Número de página
$fpdf->Cell(0, 4, utf8_decode('Santa Catarina Tláhuac,CDMX C.P. 13100 Cel. 5531149389'), 0, 0, 'C');

$fpdf->Output();
