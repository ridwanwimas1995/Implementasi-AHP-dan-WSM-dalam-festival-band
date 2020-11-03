<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)
$lebihdarisatu1 = 1;
$lebihdarisatu2 = $_POST['nLebihDariSatuMasihSatu'];
$lebihdarisatu3 = $_POST['nLebihDariSatuKosong'];

$masihsatu1 = number_format($lebihdarisatu2 / ($lebihdarisatu2 * $lebihdarisatu2), 2);
$masihsatu2 = 1;
$masihsatu3 = $_POST['nMasihSatuKosong'];

$kosong1 = number_format($lebihdarisatu3 / ($lebihdarisatu3 * $lebihdarisatu3), 3);
$kosong2 = number_format($masihsatu3 / ($masihsatu3 * $masihsatu3), 3);
$kosong3 = 1;


//simpan ke tabel kriteria utama
$sqlLebihDariSatu="Update tb_subkriteria_album set lebihdarisatu='$lebihdarisatu1',masihsatu='$lebihdarisatu2',kosong='$lebihdarisatu3' where id_subkriteria=1";
$resultLebihDariSatu = mysql_query($sqlLebihDariSatu) or die(mysql_error());

$sqlMasihSatu="Update tb_subkriteria_album set lebihdarisatu='$masihsatu1',masihsatu='$masihsatu2',kosong='$masihsatu3' where id_subkriteria=2";
$resultMasihSatu = mysql_query($sqlMasihSatu) or die(mysql_error());

$sqlKosong="Update tb_subkriteria_album set lebihdarisatu='$kosong1',masihsatu='$kosong2',kosong='$kosong3' where id_subkriteria=3";
$resultKosong = mysql_query($sqlKosong) or die(mysql_error());


//ambil nilai
$sqlNilai="Select * from tb_subkriteria_album order by id_subkriteria Asc";
$resultNilai=mysql_query($sqlNilai) or die(mysql_error());


$totalLebihDariSatu=0;
$totalMasihSatu=0;
$totalKosong=0;


$arLebihDariSatu[]='';
$arMasihSatu[]='';
$arKosong[]='';


while($rowsNilai=mysql_fetch_array($resultNilai)){
	$totalLebihDariSatu+=$rowsNilai['lebihdarisatu'];
	$totalMasihSatu+=$rowsNilai['masihsatu'];
	$totalKosong+=$rowsNilai['kosong'];
	
	
	//masukan kriteria ijasah ke array
	$arLebihDariSatu[]=$rowsNilai['lebihdarisatu'];
	$arMasihSatu[]=$rowsNilai['masihsatu'];
	$arKosong[]=$rowsNilai['kosong'];
	
	
}

for($i=1;$i<=4;$i++){
	$NilaiLebihDariSatu[]=number_format(($arLebihDariSatu[$i]/$totalLebihDariSatu),2);
	$NilaiMasihSatu[]=number_format(($arMasihSatu[$i]/$totalMasihSatu),2);
	$NilaiKosong[]=number_format(($arKosong[$i]/$totalKosong),2);
	
}

//jumlah nilai
$jumNilaiLebihDariSatu=number_format(($NilaiLebihDariSatu[0]+$NilaiMasihSatu[0]+$NilaiKosong[0]),2);	
$jumNilaiMasihSatu=number_format(($NilaiLebihDariSatu[1]+$NilaiMasihSatu[1]+$NilaiKosong[1]),2);
$jumNilaiKosong=number_format(($NilaiLebihDariSatu[2]+$NilaiMasihSatu[2]+$NilaiKosong[2]),2);



//Hit Prioritas
$prioLebihDariSatu=number_format(($jumNilaiLebihDariSatu/3),2);
$prioMasihSatu=number_format(($jumNilaiMasihSatu/3),2);
$prioKosong=number_format(($jumNilaiKosong/3),2);


//hitung sub prioriti
$subPrioLebihDariSatu=number_format(($prioLebihDariSatu/$prioLebihDariSatu),2);
$subPrioMasihSatu=number_format(($prioMasihSatu/$prioLebihDariSatu),2);
$subPrioKosong=number_format(($prioKosong/$prioLebihDariSatu),2);


//simpan nilai jumlah dan Prioritas
$sqlLebihDariSatu="Update tb_metrix_subkriteria_album set lebihdarisatu='$NilaiLebihDariSatu[0]',masihsatu='$NilaiMasihSatu[0]',kosong='$NilaiKosong[0]',jumlah='$jumNilaiLebihDariSatu',prioritas='$prioLebihDariSatu',sub_prioritas='$subPrioLebihDariSatu' where id_matrix=1";
$resultLebihDariSatu = mysql_query($sqlLebihDariSatu) or die(mysql_error());

$sqlMasihSatu="Update tb_metrix_subkriteria_album set lebihdarisatu='$NilaiLebihDariSatu[1]',masihsatu='$NilaiMasihSatu[1]',kosong='$NilaiKosong[1]', jumlah='$jumNilaiMasihSatu',prioritas='$prioMasihSatu',sub_prioritas='$subPrioMasihSatu' where id_matrix=2";
$resultMasihSatu = mysql_query($sqlMasihSatu) or die(mysql_error());

$sqlKosong="Update tb_metrix_subkriteria_album set lebihdarisatu='$NilaiLebihDariSatu[2]',masihsatu='$NilaiMasihSatu[2]',kosong='$NilaiKosong[2]' ,jumlah='$jumNilaiKosong',prioritas='$prioKosong',sub_prioritas='$subPrioKosong' where id_matrix=3";
$resultKosong= mysql_query($sqlKosong) or die(mysql_error());


///hit penjumlahan matrix tiap baris
$hitMatrixLebihDariSatu[]='';
$hitMatrixMasihSatu[]='';
$hitMatrixKosong[]='';


$matrixLebihDariSatu=array($lebihdarisatu1,$lebihdarisatu2,$lebihdarisatu3);
$matrixMasihSatu=array($masihsatu1,$masihsatu2,$masihsatu3);
$matrixKosong=array($kosong1,$kosong2,$kosong3);


for($i=0;$i<=3;$i++){
$hitMatrixLebihDariSatu[]= number_format(($matrixLebihDariSatu[$i]*$prioLebihDariSatu),2);
$hitMatrixMasihSatu[]=number_format(($matrixMasihSatu[$i]*$prioMasihSatu),2);
$hitMatrixKosong[]=number_format(($matrixKosong[$i]*$prioKosong),2);
}

$jumMatrixLebihDariSatu=number_format((array_sum($hitMatrixLebihDariSatu)),2);
$jumMatrixMasihSatu=number_format((array_sum($hitMatrixMasihSatu)),2);
$jumMatrixKosong=number_format((array_sum($hitMatrixKosong)),2);



//simpan ke tabel metrix penjumlahan
$sqlLebihDariSatu="Update tb_metrix_penjumlahan_album set lebihdarisatu='$hitMatrixLebihDariSatu[1]',masihsatu='$hitMatrixLebihDariSatu[2]',kosong='$hitMatrixLebihDariSatu[3]', jumlah='$jumMatrixLebihDariSatu' where id_matrix=1";
$resultLebihDariSatu= mysql_query($sqlLebihDariSatu) or die(mysql_error());

$sqlMasihSatu="Update tb_metrix_penjumlahan_album set lebihdarisatu='$hitMatrixMasihSatu[1]',masihsatu ='$hitMatrixMasihSatu[2]',kosong='$hitMatrixMasihSatu[3]', jumlah='$jumMatrixMasihSatu' where id_matrix=2";
$resultMasihSatu = mysql_query($sqlMasihSatu) or die(mysql_error());

$sqlKosong="Update tb_metrix_penjumlahan_album set lebihdarisatu='$hitMatrixKosong[1]',masihsatu='$hitMatrixKosong[2]',kosong='$hitMatrixKosong[3]',jumlah='$jumMatrixKosong' where id_matrix=3";
$resultKosong = mysql_query($sqlKosong) or die(mysql_error());


//hitung rasio kriteria
$rasioLebihDariSatu=number_format(($lebihdarisatu1*$prioLebihDariSatu)+($lebihdarisatu2*$prioMasihSatu)+($lebihdarisatu3*$prioKosong),2);
$rasioMasihSatu=number_format(($masihsatu1*$prioLebihDariSatu)+($masihsatu2*$prioMasihSatu)+($masihsatu3*$prioKosong),2);
$rasioKosong=number_format(($kosong1*$prioLebihDariSatu)+($kosong2*$prioMasihSatu)+($kosong3*$prioKosong),2);




//dari perhitungan diatas diperoleh nilai-nilai sebagai berikut :
$xJumlah=number_format(($rasioLebihDariSatu/$prioLebihDariSatu)+($rasioMasihSatu/$prioMasihSatu)+($rasioKosong/$prioKosong),2);
$xMaks=number_format(($xJumlah/3),2);
$CI=number_format(($xJumlah-3)/(3-1));
$CR=number_format(($CI/0.58),3);

if($CR<=0.1){
	header('location:../home.php?mod=subkriteria_album&pg=form_kriteria&status=2');
}else{
	
	//simpan ke tabel rasio konsistensi kriteria
$sqlLebihDariSatu="Update tb_rasio_konsistensi_album set jumlah='$jumMatrixLebihDariSatu',prioritas='$prioLebihDariSatu',hasil='$rasioLebihDariSatu' where id_konsistensi=1";
$resultLebihDariSatu = mysql_query($sqlLebihDariSatu) or die(mysql_error());

$sqlMasihSatu="Update tb_rasio_konsistensi_album set jumlah='$jumMatrixMasihSatu',prioritas='$prioMasihSatu', hasil='$rasioMasihSatu' where id_konsistensi=2";
$resultMasihSatu = mysql_query($sqlMasihSatu) or die(mysql_error());

$sqlKosong="Update tb_rasio_konsistensi_album set jumlah='$jumMatrixKosong',prioritas='$prioKosong',hasil='$rasioKosong' where id_konsistensi=3";
$resultKosong = mysql_query($sqlKosong) or die(mysql_error());



	
	if($resultLebihDariSatu) {
		header("location:../home.php?mod=subkriteria_album&pg&pg=tampil_kriteria&status=0");
		
	} else {
		header('location:../home.php?mod=subkriteria_album&pg=tampil_kriteria&status=1');
	}
	
}
?>
