<?php
/******************************************************************************/
// Arquivo: meuPrimeiroGeradorPDF.php 
// Este arquivo é parte integrante do artigo: 
// Gerando Documentos PDF com a Classe FPDF no PHP 
// Autor: José Vanol Jr. Data: 12/07/2010 
/******************************************************************************/

//Incluindo o arquivo onde está a Classe FPDF
require_once("lib/fpdf/fpdf.php");

include_once "app/model/DeclaracaoRecord.php";



define('FPDF_FONTPATH','lib/fpdf/font/');
class PDF extends FPDF {

//Page header
    function Header() {
        //endereco da imagem,posicao X(horizontal),posicao Y(vertical), tamanho altura, tamanho largura
        //$this->Image("app.images/logo_assemarn.jpg", 10, 10, 26, 18);

        //Arial bold 15
        $this->SetFont('Arial', 'B', 11);
        $this->SetY("19");
        $this->SetX("38");
        $this->Cell(0, 5, utf8_decode("GOVERNO DO ESTADO DO RIO GRANDE DO NORTE"), 0, 1, 'C');
        $this->SetX("38");
        $this->Cell(0, 5, utf8_decode("ASSOCIAÇÃO DOS SERVIDORES DA EMATER DO RIO GRANDE DO NORTE"), 0, 1, 'C');
        $this->Ln();
        $this->Cell(0, 5, '', "T", 1, 'J');

        
        $this->SetFont('Arial', 'BU', 10);
        $this->Cell(0, 5, utf8_decode("LISTA DOS SÓCIOS - ".strtoupper(($_REQUEST['cpf']))." / ".$_POST['cpf']), 0, 0, 'C');
        $this->Ln(7);
        $this->ColumnHeader();
    }

    function ColumnHeader() {
        $this->SetFont('arial', 'B', 8);
        $this->Cell(15, 6, utf8_decode("Matrícula"), 1, 0, 'L');
        $this->Cell(70, 6, utf8_decode("Sócio"), 1, 0, 'L');
        $this->Cell(25, 6, utf8_decode("CPF"), 1, 0, 'L');
        $this->Cell(80, 6, utf8_decode("E-MAIL"), 1, 0, 'L');
        $this->Cell(30, 6, utf8_decode("TELEFONE"), 1, 0, 'L');
        $this->Cell(30, 6, utf8_decode("CELULAR"), 1, 0, 'L');
        $this->Cell(30, 6, utf8_decode("TIPO SOCIO"), 1, 0, 'L');
        $this->Ln();
    }

    function ColumnDetail() {

 
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
$pdf->SetTitle("Relatorio dos Socios");
//define o assunto
$pdf->SetSubject("ASSEMARN | EMATER-RN");

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial', '', 12);
$pdf->ColumnDetail();
$pdf->Output();
?>