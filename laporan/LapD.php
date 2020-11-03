<?php

ob_start();
include ('config/koneksi.php');
include('fpdf.php');
//require_once("fpdf.php");

//Open();
$pdf=new FPDF('L');
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);

$tgl=date("d-m-Y");

$pdf->text(10,30,'STUDIO 5');
$pdf->text(10,36,'LAPORAN');

$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'NO TEST',1,0,'C',1);
$pdf->CELL(25,6,'NAMA',1,0,'C',1);
$pdf->CELL(25,6,'ASAL SEKOLAH',1,0,'C',1);
$pdf->CELL(50,6,'IJASAH',1,0,'C',1);
$pdf->CELL(30,6, 'WAWANCARA',1,0,'C',1);
$pdf->CELL(30,6, 'TPA',1,0,'C',1);
$pdf->CELL(30,6,'AL-QURAN',1,0,'C',1);
$pdf->CELL(30,6, 'KETERANGAN',1,0,'C',1);
$ya = $yi + $row;
$grandTota=0;
$sql = mysql_query("select tb_camaba.*, tb_nilai_test.* from tb_camaba,tb_nilai_test where tb_nilai_test.no_test = tb_camaba.no_test order by no_test asc");
$i = 1;
$no = 1;
$max = 31;
$row = 6;



while($data = mysql_fetch_array($sql)){
	

$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(25,6,$data[no_test],1,0,'L',1);
$pdf->CELL(50,6,$data[nama],1,0,'C',1);
$pdf->CELL(50,6,$data[email],1,0,'C',1);
$pdf->CELL(50,6,$data[nilai_ijasah],1,0,'C',1);
$pdf->CELL(50,6,$data[nilai_wawancara],1,0,'C',1);
$pdf->CELL(50,6,$data[nilai_tpa],1,0,'C',1);
$pdf->CELL(50,6,$data[nilai_alquran],1,0,'C',1);
$pdf->CELL(50,6,$data[keterangan],1,0,'C',1);

//$grandTotal=$grandTotal+$data[biaya];
$ya = $ya+$row;
$no++;
$i++;
$dm[kode] = $data[kdprog];


}
//$pdf->text(250,$ya+6,"Total". $grandTotal);
$pdf->text(150,$ya+6,"Denpasar , ".$tgl);
$pdf->text(160,$ya+18,"Ketua Akademik");





$pdf->output();

?>