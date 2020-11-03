<?php
//include('laporan/fpdf.php');
ob_start();
include ('../inc/config.php');
require_once("fpdf.php");

$kd=$_GET['kd'];

//Open();
$pdf=new FPDF('L');
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);

$tgl=date("d-m-Y");

$pdf->text(10,30,'PROGRAM RESERVASI V. 1');
$pdf->text(10,36,'INVOICE');

$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'NO',1,0,'C',1);
$pdf->CELL(25,6,'RESERVASI NO',1,0,'C',1);
$pdf->CELL(25,6,'KAMAR',1,0,'C',1);
$pdf->CELL(50,6,'PELANGGAN',1,0,'C',1);
$pdf->CELL(30,6, 'CEK IN',1,0,'C',1);
$pdf->CELL(30,6, 'CEK OUT',1,0,'C',1);
$pdf->CELL(30,6,'BIAYA KAMAR',1,0,'C',1);
$pdf->CELL(30,6, 'BIAYA TRANSAKSI',1,0,'C',1);
$pdf->CELL(30,6, 'TOTAL',1,0,'C',1);
$ya = $yi + $row;
$grandTota=0;
//$query="select tb_kamar.*, tb_type_kamar.* from  tb_type_kamar,tb_kamar where tb_kamar.id_type=tb_type_kamar.id_type and tgl_out<='$tgl_cek'";
$sql = mysql_query("select tb_reservasi.*,tb_tamu.*,tb_kamar.* from tb_reservasi,tb_tamu,tb_kamar where tb_reservasi.id_reservasi='$kd'");
//$sql=mysql_query("select tb_cek_in.*,tb_kamar.* from tb_cek_in,tb_kamar  where tb_cek_in.id_kamar=tb_kamar.id_kamar");
$i = 1;
$no = 1;
$max = 31;
$row = 6;



while($data = mysql_fetch_array($sql)){
	
	$temp_id=$data['id_kamar'];
	
	
	//$sql2="select nama_kamar from tb_kamar where id_kamar='$temp_id'";

		//$result2 = mysql_query($sql2) or die(mysql_error());
		//$data2 = mysql_fetch_object($result2);
		//$dateIn=$data->tgl_cekin;
		$Total=$data[biaya_kamar]+$data[biaya_transaksi];
		//echo $kamar;

$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(25,6,$data[id_reservasi],1,0,'L',1);
$pdf->cell(25,6,$data[nama_kamar],1,0,'L',1);
$pdf->CELL(50,6,$data[nama],1,0,'C',1);
$pdf->CELL(30,6,$data[tgl_in],1,0,'C',1);
$pdf->CELL(30,6,$data[tgl_out],1,0,'C',1);
$pdf->CELL(30,6,$data[biaya_kamar],1,0,'C',1);
$pdf->CELL(30,6,$data[biaya_transaksi],1,0,'C',1);
$pdf->CELL(30,6,$Total,1,0,'C',1);

//$grandTotal=$grandTotal+$data[biaya];
$ya = $ya+$row;
$no++;
$i++;
$dm[kode] = $data[kdprog];


}
//$pdf->text(250,$ya+6,"Total". $grandTotal);
$pdf->text(200,$ya+6,"Denpasar , ".$tgl);
$pdf->text(210,$ya+18,"Manager");





$pdf->output();

?>