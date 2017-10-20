<?php

//Incluindo o arquivo onde está a Classe FPDF
require_once("lib/fpdf/fpdf.php");

include_once "app/model/DeclaracaoRecord.php";
include_once "util.php";


define('FPDF_FONTPATH','lib/fpdf/font/');


class PDF extends FPDF {

//Page header
    function Header() {

        $this->Image("app/images/logo_relatorio2.jpg", 10, 10, 26, 18);

       //Arial bold 15
        $this->SetFont('Arial', 'B', 12);
        $this->SetY("10");
        $this->SetX("50");
        $this->Cell(0, 4, utf8_decode("ASSOCIAÇÃO DOS SERVIDORES DA EMATER - RN"), 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->SetX("50");
        $this->Cell(0, 4, utf8_decode("Centro Administrativo do Estado - BR-101 km 0"), 0, 1, 'L');
        $this->SetX("50");
        $this->Cell(0, 4, utf8_decode("CEP 59064.901 - Lagoa Nova - Natal-RN "), 0, 1, 'L');
        
        $this->SetX("50");
        $this->Cell(0, 4, utf8_decode("CGC 08.455.941/0001-21 Fone 84 3234-9490 - Cel. 84 9950-9341 "), 0, 1, 'L');
        
        $this->SetX("50");
        $this->Cell(0, 4, utf8_decode("WWW.ASSEMARN.COM.BR - Reconhecida de utilidade pública: Lei Estadual 8639"), 0, 1, 'L');
        $this->Cell(0, 5, '', "T", 1, 'J');
        $this->ColumnHeader();
    }

    function ColumnHeader() {
        $this->SetFont('arial', 'B', 12);
        $this->Cell(60, 6, utf8_decode("Plano"), 1, 0, 'L');
        $this->Cell(40, 6, utf8_decode("Tipo"), 1, 0, 'L');
        $this->Cell(95, 6, utf8_decode("Nome"), 1, 0, 'L');
        $this->Cell(40, 6, utf8_decode("CPF"), 1, 0, 'L');
        $this->Cell(30, 6, utf8_decode("Valor"), 1, 0, 'L');

        $this->Ln();
    }

    function ColumnDetail() {
        
    $decript = $_GET['seleciona'];
    $cpf = base64_decode($decript);

    $objects = DeclaracaoRecord::getData();

    foreach ( $objects as $object ) {
        if (  $cpf == $object['titular']) {
            $this->Cell(60, 6, $object['plano'], 1, 0, 'L');
            $this->Cell(40, 6, $object['tipo'], 1, 0, 'L');
            $this->Cell(95, 6, $object['nome'], 1, 0, 'L');
            $this->Cell(40, 6, formatarCpf($object['paciente']), 1, 0, 'L');
            $this->Cell(30, 6, $object['valor'], 1, 1, 'L');
            }
        }
    }

//Page footer
    function Footer() {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Page number
        //data atual
        $data = date("d/m/Y");
        $hora = date("H:i:s");
        $conteudo = "impresso em " . $data . " às " . $hora;
        $texto = "http://www.assemarn.com.br";
        //imprime uma linha... largura,altura, texto,borda,quebra de linha, alinhamento
        $this->Cell(0, 0, '', 1, 1, 'L');

        //imprime uma celula... largura,altura, texto,borda,quebra de linha, alinhamento
        $this->Cell(0, 5, $texto, 0, 0, 'L');
        $this->Cell(0, 5, 'Pag. ' . $this->PageNo() . ' de ' . '{nb}' . ' - ' . utf8_decode($conteudo), 0, 0, 'R');
        $this->Ln();
    }

}

$pdf = new PDF("L", "mm", "A4");
//define o titulo
$pdf->SetTitle("Declaracao Plano Saude");
//define o assunto
$pdf->SetSubject("ASSEMARN | EMATER-RN");

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial', '', 12);
$pdf->ColumnDetail();
$pdf->Output();
?>