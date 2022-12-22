<?php
require("../resources/libs/fpdf/fpdf.php");
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

class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}

$html = utf8_decode("Por medio de la presente me permito informarle que el (la) <b>C. $res->nombre $res->app $res->apm,</b> estudiante de la carrera de <b>$res->service,</b> con número de control <b>$res->matricula</b>, del <b>$res->nombre_ins</b>, realizo <b>$tipo</b> en el programa <b>\"Aplicando tus conocimientos realizando una propuesta\",</b>  durante el periodo comprendido del <b>$fechaI[2] DE $mesI DEL $fechaI[0], concluyendo su estadia el $fechaF[2] DE $mesF del $fechaF[0].</b>, cubriendo un total de <b>480 horas.</b>");

$fpdf = new PDF();
$fpdf->SetTitle("Carta Termino-$nameDoc");
$fpdf->AddPage('P', 'Letter', '0');
$fpdf->SetFont('Arial', 'B', 11);
$fpdf->Image('../resources/pictures/icons/Logo.png', 20, 5, 50, 35);

$fpdf->Ln(7);

$fpdf->Cell(70, 10, '');
$fpdf->MultiCell(120, 8, "ASOCIACION NACIONAL PARA EL  DESARROLLO INTEGRAL \n COMUNITARIO A.C.", 0, 'C');

$fpdf->Ln(10);

$fpdf->SetFont('Arial', 'I', 10);
$fpdf->MultiCell(180, 5, utf8_decode("CDMX a " . date('d') . " de $mes del " . date('Y') . "\nOFICIO No. VINC/$res->folio_p - 2/2022\nAsunto: Terminación de Servicio Social"), 0, 'R');

$fpdf->Ln(10);

$fpdf->SetFont('Arial', 'B', 11);
$fpdf->MultiCell(0, 5, "$res->repre \nDIRECTOR (A) DEL $instituto\nP R E S E N T E.", 0, 'L');

$fpdf->Ln(10);

$fpdf->SetFont('Arial', 'B', 11);
$fpdf->MultiCell(0, 5, utf8_decode("AT´N: $res->sub\nJEFA (E) DEL DPTO.  DE VINCULACIÓN"), 0, 'R');

$fpdf->Ln(20);

$fpdf->SetFont('Arial', '');

$fpdf->WriteHTML($html);

$fpdf->Ln(10);

$fpdf->MultiCell(0, 5, utf8_decode("Se extiende la presente para los fines legales que al interesado convengan, en la Ciudad de México a los ". date('d')." días del mes de $mes del ".date('Y')."."), 0,'J');

$fpdf->Ln(15);

$fpdf->SetFont('Arial', 'B');
$fpdf->Cell(60, 10, 'ATENTAMENTE', 0, 10, 'L');

$fpdf->Ln(25);

$fpdf->Cell(70, 5, 'JOSUE FRANCISCO GOMEZ MAYA', 0, 2, 'L');
$fpdf->Cell(70, 5, 'PRESIDENTE DE ANDIC A.C.', 0, 10, 'L');
$fpdf->SetFont('Arial', 'I', 7);
$fpdf->Cell(70, 5, 'JFGM/gm', 0, 10, 'L');

// Posición: a 1,5 cm del final
$fpdf->SetY(-30);
// Arial italic 8
$fpdf->SetFont('Arial', 'I', 8);
// Número de página
$fpdf->MultiCell(0, 3, utf8_decode('Santa Catarina Tláhuac,CDMX C.P. 13100      
www.andic.org.mx/
Tel. 5531149389'), 0,'C');

$fpdf->Output();