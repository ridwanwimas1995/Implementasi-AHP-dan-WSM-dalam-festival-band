<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)
$baik1 = 1;
$baik2 = $_POST['nBaikBiasa'];
$baik3 = $_POST['nBaikBuruk'];

$biasa1 = number_format($baik2 / ($baik2 * $baik2), 2);
$biasa2 = 1;
$biasa3 = $_POST['nBiasaBuruk'];

$buruk1 = number_format($baik3 / ($baik3 * $baik3), 3);
$buruk2 = number_format($biasa3 / ($biasa3 * $biasa3), 3);
$buruk3 = 1;


//simpan ke tabel kriteria utama
$sqlBaik="Update tb_subkriteria_penampilan set baik='$baik1',biasa='$baik2',buruk='$baik3' where id_subkriteria=1";
$resultBaik = mysql_query($sqlBaik) or die(mysql_error());

$sqlBiasa="Update tb_subkriteria_penampilan set baik='$biasa1',biasa='$biasa2',buruk='$biasa3' where id_subkriteria=2";
$resultBiasa = mysql_query($sqlBiasa) or die(mysql_error());

$sqlBuruk="Update tb_subkriteria_penampilan set baik='$buruk1',biasa='$buruk2',buruk='$buruk3' where id_subkriteria=3";
$resultBuruk = mysql_query($sqlBuruk) or die(mysql_error());


//ambil nilai
$sqlNilai="Select * from tb_subkriteria_penampilan order by id_subkriteria Asc";
$resultNilai=mysql_query($sqlNilai) or die(mysql_error());


$totalBaik=0;
$totalBiasa=0;
$totalBuruk=0;


$arBaik[]='';
$arBiasa[]='';
$arBuruk[]='';


while($rowsNilai=mysql_fetch_array($resultNilai)){
	$totalBaik+=$rowsNilai['baik'];
	$totalBiasa+=$rowsNilai['biasa'];
	$totalBuruk+=$rowsNilai['buruk'];
	
	
	//masukan kriteria ijasah ke array
	$arBaik[]=$rowsNilai['baik'];
	$arBiasa[]=$rowsNilai['biasa'];
	$arBuruk[]=$rowsNilai['buruk'];
	
	
}

for($i=1;$i<=4;$i++){
	$NilaiBaik[]=number_format(($arBaik[$i]/$totalBaik),2);
	$NilaiBiasa[]=number_format(($arBiasa[$i]/$totalBiasa),2);
	$NilaiBuruk[]=number_format(($arBuruk[$i]/$totalBuruk),2);
	
}

//jumlah nilai
$jumNilaiBaik=number_format(($NilaiBaik[0]+$NilaiBiasa[0]+$NilaiBuruk[0]),2);	
$jumNilaiBiasa=number_format(($NilaiBaik[1]+$NilaiBiasa[1]+$NilaiBuruk[1]),2);
$jumNilaiBuruk=number_format(($NilaiBaik[2]+$NilaiBiasa[2]+$NilaiBuruk[2]),2);



//Hit Prioritas
$prioBaik=number_format(($jumNilaiBaik/3),2);
$prioBiasa=number_format(($jumNilaiBiasa/3),2);
$prioBuruk=number_format(($jumNilaiBuruk/3),2);


//hitung sub prioriti
$subPrioBaik=number_format(($prioBaik/$prioBaik),2);
$subPrioBiasa=number_format(($prioBiasa/$prioBaik),2);
$subPrioBuruk=number_format(($prioBuruk/$prioBaik),2);


//simpan nilai jumlah dan Prioritas
$sqlBaik="Update tb_metrix_subkriteria_penampilan set baik='$NilaiBaik[0]',biasa='$NilaiBiasa[0]',buruk='$NilaiBuruk[0]',jumlah='$jumNilaiBaik',prioritas='$prioBaik',sub_prioritas='$subPrioBaik' where id_matrix=1";
$resultBaik = mysql_query($sqlBaik) or die(mysql_error());

$sqlBiasa="Update tb_metrix_subkriteria_penampilan set baik='$NilaiBaik[1]',biasa='$NilaiBiasa[1]',buruk='$NilaiBuruk[1]', jumlah='$jumNilaiBiasa',prioritas='$prioBiasa',sub_prioritas='$subPrioBiasa' where id_matrix=2";
$resultBiasa = mysql_query($sqlBiasa) or die(mysql_error());

$sqlBuruk="Update tb_metrix_subkriteria_penampilan set baik='$NilaiBaik[2]',biasa='$NilaiBiasa[2]',buruk='$NilaiBuruk[2]' ,jumlah='$jumNilaiBuruk',prioritas='$prioBuruk',sub_prioritas='$subPrioBuruk' where id_matrix=3";
$resultBuruk = mysql_query($sqlBuruk) or die(mysql_error());


///hit penjumlahan matrix tiap baris
$hitMatrixBaik[]='';
$hitMatrixBiasa[]='';
$hitMatrixBuruk[]='';


$matrixBaik=array($baik1,$baik2,$baik3);
$matrixBiasa=array($biasa1,$biasa2,$biasa3);
$matrixBuruk=array($buruk1,$buruk2,$buruk3);


for($i=0;$i<=3;$i++){
$hitMatrixBaik[]= number_format(($matrixBaik[$i]*$prioBaik),2);
$hitMatrixBiasa[]=number_format(($matrixBiasa[$i]*$prioBiasa),2);
$hitMatrixBuruk[]=number_format(($matrixBuruk[$i]*$prioBuruk),2);
}

$jumMatrixBaik=number_format((array_sum($hitMatrixBaik)),2);
$jumMatrixBiasa=number_format((array_sum($hitMatrixBiasa)),2);
$jumMatrixBuruk=number_format((array_sum($hitMatrixBuruk)),2);



//simpan ke tabel metrix penjumlahan
$sqlBaik="Update tb_metrix_penjumlahan_penampilan set baik='$hitMatrixBaik[1]',biasa='$hitMatrixBaik[2]',buruk='$hitMatrixBaik[3]', jumlah='$jumMatrixBaik' where id_matrix=1";
$resultBaik= mysql_query($sqlBaik) or die(mysql_error());

$sqlBiasa="Update tb_metrix_penjumlahan_penampilan set baik='$hitMatrixBiasa[1]',biasa ='$hitMatrixBiasa[2]',buruk='$hitMatrixBiasa[3]', jumlah='$jumMatrixBiasa' where id_matrix=2";
$resultBiasa = mysql_query($sqlBiasa) or die(mysql_error());

$sqlBuruk="Update tb_metrix_penjumlahan_penampilan set baik='$hitMatrixBuruk[1]',biasa='$hitMatrixBuruk[2]',buruk='$hitMatrixBuruk[3]',jumlah='$jumMatrixBuruk' where id_matrix=3";
$resultBuruk = mysql_query($sqlBuruk) or die(mysql_error());


//hitung rasio kriteria
$rasioBaik=number_format(($baik1*$prioBaik)+($baik2*$prioBiasa)+($baik3*$prioBuruk),2);
$rasioBiasa=number_format(($biasa1*$prioBaik)+($biasa2*$prioBiasa)+($biasa3*$prioBuruk),2);
$rasioBuruk=number_format(($buruk1*$prioBaik)+($buruk2*$prioBiasa)+($buruk3*$prioBuruk),2);




//dari perhitungan diatas diperoleh nilai-nilai sebagai berikut :
$xJumlah=number_format(($rasioBaik/$prioBaik)+($rasioBiasa/$prioBiasa)+($rasioBuruk/$prioBuruk),2);
$xMaks=number_format(($xJumlah/3),2);
$CI=number_format(($xJumlah-3)/(3-1));
$CR=number_format(($CI/0.58),4);

if($CR<=0.1){
	header('location:../home.php?mod=subkriteria_penampilan&pg=form_kriteria&status=2');
}else{
	
	//simpan ke tabel rasio konsistensi kriteria
$sqlBaik="Update tb_rasio_konsistensi_penampilan set jumlah='$jumMatrixBaik',prioritas='$prioBaik', hasil='$rasioBaik' where id_konsistensi=1";
$resultBaik = mysql_query($sqlBaik) or die(mysql_error());

$sqlBiasa="Update tb_rasio_konsistensi_penampilan set jumlah='$jumMatrixBiasa',prioritas='$prioBiasa', hasil='$rasioBiasa' where id_konsistensi=2";
$resultBiasa = mysql_query($sqlBiasa) or die(mysql_error());

$sqlBuruk="Update tb_rasio_konsistensi_penampilan set jumlah='$jumMatrixBuruk',prioritas='$prioBuruk', hasil='$rasioBuruk' where id_konsistensi=3";
$resultBuruk = mysql_query($sqlBuruk) or die(mysql_error());



	
	if($resultBaik) {
		header("location:../home.php?mod=subkriteria_penampilan&pg=tampil_kriteria&status=0");
		
	} else {
		header('location:../home.php?mod=subkriteria_penampilan&pg=tampil_kriteria&status=1');
	}
	
}
?>
