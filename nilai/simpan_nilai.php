<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)

$no_test= $_POST['no_test'];

$id=$_POST['txtId'];
$aksi=$_POST['aksi'];

$prioritas[]='';

$prioPenampilan[]='';
$prioAttitude[]='';
$prioGenre[]='';
$prioAlbum[]='';

$xPenampilan='';
$xAttitude='';
$xGenre='';
$xAlbum='';

$xParameter=0;

# Validasi Form
if (isset($no_test)=="") {
	echo "No test masih kosong, ulangi kembali";
	header('location:../home.php?mod=admin&pg=form_admin&status=1');
}
else {
	
	//hitung
	//select prioritas di kriteria utama
	$sqlKriteria="Select prioritas from tb_metrix_nilai_kriteria order by id_matrix asc";
	$resultKriteria=mysql_query($sqlKriteria) or die(mysql_error());
	while($rowKriteria=mysql_fetch_array($resultKriteria)){
	$prioritas[]=$rowKriteria['0'];
	}
	
	
	//select sub prioritas dari masing masing kriteria
	$sqlPenampilan="select prioritas from tb_metrix_subkriteria_penampilan order by prioritas asc";
	$resultPenampilan=mysql_query($sqlPenampilan) or die(mysql_error());
	while($rowPenampilan=mysql_fetch_array($resultPenampilan)){
		$prioPenampilan[]=$rowPenampilan['0'];	
		
	}
	
	$sqlAttitude="select prioritas from tb_metrix_subkriteria_attitude order by prioritas desc";
	$resultAttitude=mysql_query($sqlAttitude) or die(mysql_error());
	while($rowAttitude=mysql_fetch_array($resultAttitude)){
		$prioAttitude[]=$rowAttitude['0'];
	}
	
	$sqlGenre="select prioritas from tb_metrix_subkriteria_genre order by prioritas asc";
	$resultGenre=mysql_query($sqlGenre) or die(mysql_error());
	while($rowGenre=mysql_fetch_array($resultGenre)){
		$prioGenre[]=$rowGenre['0'];	
	}
	
	$sqlAlbum="select prioritas from tb_metrix_subkriteria_album order by prioritas asc";
	$resultAlbum=mysql_query($sqlAlbum) or die(mysql_error());
	while($rowAlbum=mysql_fetch_array($resultAlbum)){
		$prioAlbum[]=$rowAlbum['0'];	
	}
	
	//bandingkan nilai ijasah
	if($nilai_ijasah>85){	
		$xIjasah=number_format(($nilai_ijasah+$prioritas['1']+$prioIjasah['1']),2);
	}elseif($nilai_ijasah>=71 and $nilai_ijasah<=85){
		$xIjasah=number_format(($nilai_ijasah+$prioritas['1']+$prioIjasah['2']),2);
	}elseif($nilai_ijasah>=60 and $nilai_ijasah<=70){
		$xIjasah=number_format(($nilai_ijasah+$prioritas['1']+$prioIjasah['3']),2);
	}elseif($nilai_ijasah<=59){
		$xIjasah=number_format(($nilai_ijasah+$prioritas['1']+$prioIjasah['4']),2);	
	}
	
	//bandingkan nilai wawancara
	if($nilai_wawancara>85){	
		$xWawancara=number_format(($nilai_wawancara+$prioritas['2']+$prioWawancara['1']),2);	
	}elseif($nilai_wawancara>=71 and $nilai_wawancara<=85){
		$xWawancara=number_format(($nilai_wawancara+$prioritas['2']+$prioWawancara['2']),2);	
	}elseif($nilai_wawancara>=60 and $nilai_wawancara<=70){
		$xWawancara=number_format(($nilai_wawancara+$prioritas['2']+$prioWawancara['3']),2);	
	}elseif($nilai_wawancara<=59){
		$xWawancara=number_format(($nilai_wawancara+$prioritas['2']+$prioWawancara['4']),2);	
	}
	
	//bandingkan nilai tpa
	if($nilai_tpa>85){	
		$xTpa=number_format(($nilai_tpa+$prioritas['3']+$prioTpa['1']),2);	
	}elseif($nilai_tpa>=71 and $nilai_tpa<=85){
		$xTpa=number_format(($nilai_tpa+$prioritas['3']+$prioTpa['2']),2);	
	}elseif($nilai_tpa>=60 and $nilai_tpa<=70){
		$xTpa=number_format(($nilai_tpa+$prioritas['3']+$prioTpa['3']),2);	
	}elseif($nilai_tpa<=59){
		$xTpa=number_format(($nilai_tpa+$prioritas['3']+$prioTpa['4']),2);	
	}
	
	//bandingkan nilai Alquran
	if($nilai_alquran>85){	
		$xAlquran=number_format(($nilai_alquran+$prioritas['4']+$prioAlquran['1']),2);	
	}elseif($nilai_alquran>=71 and $nilai_alquran<=85){
		$xAlquran=number_format(($nilai_alquran+$prioritas['4']+$prioAlquran['2']),2);	
	}elseif($nilai_alquran>=60 and $nilai_alquran<=70){
		$xAlquran=number_format(($nilai_alquran+$prioritas['4']+$prioAlquran['3']),2);	
	}elseif($nilai_alquran<=59){
		$xAlquran=number_format(($nilai_alquran+$prioritas['2']+$prioAlquran['4']),2);	
	}
	
	$total=0;
	$keterangan='';
	$total=$xIjasah+$xWawancara+$xTpa+$xAlquran;

	$sqlParameter="select nilai from tb_statusnilai Limit 1";
	$resultParameter=mysql_query($sqlParameter) or die(mysql_error());
	while($rowParameter=mysql_fetch_array($resultParameter)){
		$xParameter=$rowParameter['nilai'];
	}

	if($total>=$xParameter){
		$keterangan="Diterima";
	}else{
		$keterangan="Ditolak";
	}
	
	if($aksi=='Tambah'){
		
		$sqlCek="Select no_test from tb_nilai_test where no_test='$no_test'";
		$resultCek=mysql_query($sqlCek);
		$jumlahRow=mysql_num_rows($resultCek);
	
		if($jumlahRow==0){	
			$sql="Insert into tb_nilai_test(no_test,nilai_ijasah,nilai_wawancara,nilai_tpa,nilai_alquran,keterangan) VALUES ('$no_test','$nilai_ijasah','$nilai_wawancara','$nilai_tpa','$nilai_alquran','$keterangan')";
			
		}else{
			header('location:../home.php?mod=nilai&pg=form_nilai&status=2');
		}
	}elseif($aksi=='Edit'){
		$sql="Update tb_nilai_test set no_test='$no_test',nilai_ijasah='$nilai_ijasah',nilai_wawancara='$nilai_wawancara',nilai_tpa='$nilai_tpa',nilai_alquran='$nilai_alquran',keterangan='$keterangan' where id_nilai='$id'";	
	}

	$result = mysql_query($sql) or die(mysql_error());
	//echo $total;
	//header("Location: about/form_about.php?pesan=$pesan");
	if($result) {
		header("location:../home.php?mod=nilai&pg=tampil_nilai&status=0");
		
	} else {
		header('location:../home.php?mod=nilai&pg=tampil_nilai&status=1');
	}
	
}
?>
