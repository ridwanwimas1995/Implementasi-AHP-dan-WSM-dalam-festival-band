<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)




//kalikan metrik berpasangan
$penampilan1=1;
$penampilan2=$_POST['nPenampilanAttitude'];
$penampilan3=$_POST['nPenampilanGenre'];
$penampilan4=$_POST['nPenampilanAlbum'];


$attitude1=number_format($penampilan2/($penampilan2*$penampilan2),2);
$attitude2=1;
$attitude3=$_POST['nAttitudeGenre'];
$attitude4=$_POST['nAttitudeAlbum'];

//$wawancara1=$wawancara1;
$genre1=number_format(1/$penampilan3,3);
$genre2=number_format(1/$attitude3,3);
$genre3=1;
$genre4=$_POST['nGenreAlbum'];

$album1=number_format(1/$penampilan4,4);
$album2=number_format(1/$attitude4,4);
$album3=number_format(1/$genre4,4);
$album4=1;

//simpan ke tabel kriteria utama
$sqlPenampilan="Update tb_kriteria_utama set penampilan='$penampilan1',attitude='$penampilan2',genre='$penampilan3',album='$penampilan4' where id_kriteria=1";
$resultPenampilan = mysql_query($sqlPenampilan) or die(mysql_error());

$sqlAttitude="Update tb_kriteria_utama set penampilan='$attitude1',attitude='$attitude2',genre='$attitude3',album='$attitude4' where id_kriteria=2";
$resultAttitude = mysql_query($sqlAttitude) or die(mysql_error());

$sqlGenre="Update tb_kriteria_utama set penampilan='$genre1',attitude='$genre2',genre='$genre3',album='$genre4' where id_kriteria=3";
$resultGenre = mysql_query($sqlGenre) or die(mysql_error());

$sqlAlbum="Update tb_kriteria_utama set penampilan='$album1',attitude='$album2',genre='$album3',album='$album4' where id_kriteria=4";
$resultAlbum = mysql_query($sqlAlbum) or die(mysql_error());

//ambil nilai
$sqlNilai="Select * from tb_kriteria_utama order by id_kriteria Asc";
$resultNilai=mysql_query($sqlNilai) or die(mysql_error());


$totalPenampilan=0;
$totalAttitude=0;
$totalGenre=0;
$totalAlbum=0;


$arPenampilan[]='';
$arAttitude[]='';
$arGenre[]='';
$arAlbum[]='';



while($rowsNilai=mysql_fetch_array($resultNilai)){
	$totalPenampilan+=$rowsNilai['penampilan'];
	$totalAttitude+=$rowsNilai['attitude'];
	$totalGenre+=$rowsNilai['genre'];
	$totalAlbum+=$rowsNilai['album'];
	
	
	//masukan kriteria ijasah ke array
	$arPenampilan[]=$rowsNilai['penampilan'];
	$arAttitude[]=$rowsNilai['attitude'];
	$arGenre[]=$rowsNilai['genre'];
	$arAlbum[]=$rowsNilai['album'];
	
	
}

for($i=1;$i<=4;$i++){
	$NilaiPenampilan[]=number_format(($arPenampilan[$i]/$totalPenampilan),2);
	$NilaiAttitude[]=number_format(($arAttitude[$i]/$totalAttitude),2);
	$NilaiGenre[]=number_format(($arGenre[$i]/$totalGenre),2);
	$NilaiAlbum[]=number_format(($arAlbum[$i]/$totalAlbum),2);
	
	
	
}

//jumlah nilai
$jumNilaiPenampilan=number_format(($NilaiPenampilan[0]+$NilaiAttitude[0]+$NilaiGenre[0]+$NilaiAlbum[0]),2);
$jumNilaiAttitude=number_format(($NilaiPenampilan[1]+$NilaiAttitude[1]+$NilaiGenre[1]+$NilaiAlbum[1]),2);
$jumNilaiGenre=number_format(($NilaiPenampilan[2]+$NilaiAttitude[2]+$NilaiGenre[2]+$NilaiAlbum[2]),2);
$jumNilaiAlbum=number_format(($NilaiPenampilan[3]+$NilaiAttitude[3]+$NilaiGenre[3]+$NilaiAlbum[3]),2);




//Hit Prioritas
$prioPenampilan=number_format(($jumNilaiPenampilan/4),2);
$prioAttitude=number_format(($jumNilaiAttitude/4),2);
$prioGenre=number_format(($jumNilaiGenre/4),2);
$prioAlbum=number_format(($jumNilaiAlbum/4),2);


//simpan nilai jumlah dan Prioritas
$sqlPenampilan="Update tb_metrix_nilai_kriteria set penampilan='$NilaiPenampilan[0]',attitude='$NilaiAttitude[0]',genre='$NilaiGenre[0]', album='$NilaiAlbum[0]', jumlah='$jumNilaiPenampilan',prioritas='$prioPenampilan' where id_matrix=1";
$resultPenampilan = mysql_query($sqlPenampilan) or die(mysql_error());

$sqlAttitude="Update tb_metrix_nilai_kriteria set penampilan='$NilaiPenampilan[1]',attitude='$NilaiAttitude[1]',genre='$NilaiGenre[1]',album='$NilaiAlbum[1]', jumlah='$jumNilaiAttitude',prioritas='$prioAttitude' where id_matrix=2";
$resultAttitude = mysql_query($sqlAttitude) or die(mysql_error());

$sqlGenre="Update tb_metrix_nilai_kriteria set penampilan='$NilaiPenampilan[2]',attitude='$NilaiAttitude[2]',genre='$NilaiGenre[2]',album='$NilaiAlbum[2]', jumlah='$jumNilaiGenre',prioritas='$prioGenre' where id_matrix=3";
$resultGenre = mysql_query($sqlGenre) or die(mysql_error());

$sqlAlbum="Update tb_metrix_nilai_kriteria set penampilan='$NilaiPenampilan[3]',attitude='$NilaiAttitude[3]',genre='$NilaiGenre[3]',album='$NilaiAlbum[3]', jumlah='$jumNilaiAlbum', prioritas='$prioAlbum' where id_matrix=4";
$resultAlbum = mysql_query($sqlAlbum) or die(mysql_error());


///hit penjumlahan matrix tiap baris
$hitMatrixPenampilan[]='';
$hitMatrixAttitude[]='';
$hitMatrixGenre[]='';
$hitMatrixAlbum[]='';

$matrixPenampilan=array($penampilan1,$penampilan2,$penampilan3,$penampilan4);
$matrixAttitude=array($attitude1,$attitude2,$attitude3,$attitude4);
$matrixGenre=array($genre1,$genre2,$genre3,$genre4);
$matrixAlbum=array($album1,$album2,$album3,$album4);

for($i=0;$i<=3;$i++){
$hitMatrixPenampilan[]= number_format(($matrixPenampilan[$i]*$prioPenampilan),2);
$hitMatrixAttitude[]=number_format(($matrixAttitude[$i]*$prioAttitude),2);
$hitMatrixGenre[]=number_format(($matrixGenre[$i]*$prioGenre),2);
$hitMatrixAlbum[]=number_format(($matrixAlbum[$i]*$prioAlbum),2);
}

$jumMatrixPenampilan=number_format((array_sum($hitMatrixPenampilan)),2);
$jumMatrixAttitude=number_format((array_sum($hitMatrixAttitude)),2);
$jumMatrixGenre=number_format((array_sum($hitMatrixGenre)),2);
$jumMatrixAlbum=number_format((array_sum($hitMatrixAlbum)),2);


//simpan ke tabel metrix penjumlahan tiap baris
$sqlPenampilan="Update tb_metrix_penjumlahan set penampilan='$hitMatrixPenampilan[1]',attitude='$hitMatrixPenampilan[2]',genre='$hitMatrixPenampilan[3]',album='$hitMatrixPenampilan[4]', jumlah='$jumMatrixPenampilan' where id_matrix=1";
$resultPenampilan = mysql_query($sqlPenampilan) or die(mysql_error());

$sqlAttitude="Update tb_metrix_penjumlahan set penampilan='$hitMatrixAttitude[1]',attitude='$hitMatrixAttitude[2]',genre='$hitMatrixAttitude[3]',album='$hitMatrixAttitude[4]', jumlah='$jumMatrixAttitude' where id_matrix=2";
$resultAttitude = mysql_query($sqlAttitude) or die(mysql_error());

$sqlGenre="Update tb_metrix_penjumlahan set penampilan='$hitMatrixGenre[1]',attitude='$hitMatrixGenre[2]',genre='$hitMatrixGenre[3]',album='$hitMatrixGenre[4]', jumlah='$jumMatrixGenre' where id_matrix=3";
$resultGenre = mysql_query($sqlGenre) or die(mysql_error());

$sqlAlbum="Update tb_metrix_penjumlahan set penampilan='$hitMatrixAlbum[1]',attitude='$hitMatrixAlbum[2]',genre='$hitMatrixAlbum[3]',album='$hitMatrixAlbum[4]', jumlah='$jumMatrixAlbum' where id_matrix=4";
$resultAlbum = mysql_query($sqlAlbum) or die(mysql_error());

//hitung rasio konsistensi kriteria
$rasioPenampilan=number_format(($penampilan1*$prioPenampilan)+($penampilan2*$prioAttitude)+($penampilan3*$prioGenre)+($penampilan4*$prioAlbum),2);
$rasioAttitude=number_format(($attitude1*$prioPenampilan)+($attitude2*$prioAttitude)+($attitude3*$prioGenre)+($attitude4*$prioAlbum),2);
$rasioGenre=number_format(($genre1*$prioPenampilan)+($genre2*$prioAttitude)+($genre3*$prioGenre)+($genre4*$prioAlbum),2);
$rasioAlbum=number_format(($album1*$prioPenampilan)+($album2*$prioAttitude)+($album3*$prioGenre)+($album4*$prioAlbum),2);



//dari perhitungan diatas diperoleh nilai-nilai sebagai berikut :
$xJumlah=number_format(($rasioPenampilan/$prioPenampilan)+($rasioAttitude/$prioAttitude)+($rasioGenre/$prioGenre)+($rasioAlbum/$prioAlbum),2);
$xMaks=number_format(($xJumlah/4),2);
$CI=number_format(($xJumlah-4)/(4-1));
$CR=number_format(($CI/0.9),2);

if($CR<=0.1){
	header('location:../home.php?mod=kriteria&pg=form_kriteria&status=2');
}else{
//simpan ke tabel rasio konsistensi kriteria
$sqlPenampilan="Update tb_rasio_konsistensi_kriteria set jumlah='$jumMatrixPenampilan',prioritas='$prioPenampilan',hasil='$rasioPenampilan' where id_konsistensi=1";
$resultPenampilan = mysql_query($sqlPenampilan) or die(mysql_error());

$sqlAttitude="Update tb_rasio_konsistensi_kriteria set jumlah='$jumMatrixAttitude',prioritas='$prioAttitude', hasil='$rasioAttitude' where id_konsistensi=2";
$resultAttitude = mysql_query($sqlAttitude) or die(mysql_error());

$sqlGenre="Update tb_rasio_konsistensi_kriteria set jumlah='$jumMatrixGenre',prioritas='$prioGenre',hasil='$rasioGenre' where id_konsistensi=3";
$resultGenre = mysql_query($sqlGenre) or die(mysql_error());

$sqlAlbum="Update tb_rasio_konsistensi_kriteria set jumlah='$jumMatrixAlbum',prioritas='$prioAlbum', hasil='$rasioAlbum' where id_konsistensi=4";
$resultAlbum = mysql_query($sqlAlbum) or die(mysql_error());
	
	if($resultPenampilan) {
		header("location:../home.php?mod=kriteria&pg=tampil_kriteria&status=0");
		
	} else {
		header('location:../home.php?mod=kriteria&pg=tampil_kriteria&status=1');
	}
}

?>
