<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)
$hardrock1 = 1;
$hardrock2 = $_POST['nHardrockHeavyMetal'];
$hardrock3 = $_POST['nHardrockThrashMetal'];
$hardrock4 = $_POST['nHardrockDeathMetal'];
$hardrock5 = $_POST['nHardrockGrindcore'];


$heavymetal1 = number_format($hardrock2 / ($hardrock2 * $hardrock2 ),2);
$heavymetal2 = 1;
$heavymetal3 = $_POST['nHeavyMetalThrashMetal'];
$heavymetal4 = $_POST['nHeavyMetalDeathMetal'];
$heavymetal5 = $_POST['nHeavyMetalGrindcore'];

$thrashmetal1 = number_format($hardrock3 / ($hardrock3 * $hardrock3),3);
$thrashmetal2 = number_format($heavymetal3 / ($heavymetal3 * $heavymetal3),3);
$thrashmetal3 = 1;
$thrashmetal4 = $_POST['nThrashMetalDeathMetal'];
$thrashmetal5 = $_POST['nThrashMetalGrindcore'];

$deathmetal1 = number_format($hardrock4 / ($hardrock4*$hardrock4),4 ); 
$deathmetal2 = number_format($heavymetal4 / ($heavymetal4*$heavymetal4),4);
$deathmetal3 = number_format($thrashmetal4 / ($thrashmetal4*$thrashmetal4),4);
$deathmetal4 = 1;
$deathmetal5 = $_POST['nDeathMetalGrindcore'];

$grindcore1 = number_format($hardrock5 / ($hardrock5 * $hardrock5 ),5);
$grindcore2 = number_format($heavymetal5 / ($heavymetal5 * $heavymetal5),5);
$grindcore3 = number_format($thrashmetal5 / ($thrashmetal5 * $thrashmetal5),5);
$grindcore4 = number_format($deathmetal5 / ($deathmetal5 * $deathmetal5),5);
$grindcore5 = 1;


//simpan ke tabel kriteria utama
$sqlHardrock="Update tb_subkriteria_genre set hardrock='$hardrock1', heavy_metal='$hardrock2', thrash_metal='$hardrock3', death_metal='$hardrock4', grindcore='$hardrock5' where id_subkriteria=1";
$resultHardrock = mysql_query($sqlHardrock) or die(mysql_error()); 

$sqlHeavyMetal="Update tb_subkriteria_genre set hardrock='$heavymetal1', heavy_metal='$heavymetal2', thrash_metal='$heavymetal3', death_metal='$heavymetal4', grindcore='$heavymetal5' where id_subkriteria=2";
$resultHeavyMetal = mysql_query($sqlHeavyMetal) or die(mysql_error());

$sqlThrashMetal="Update tb_subkriteria_genre set hardrock='$thrashmetal1', heavy_metal='$thrashmetal2', thrash_metal='$thrashmetal3', death_metal='$thrashmetal4', grindcore='$thrashmetal5' where id_subkriteria=3";
$resultThrashMetal = mysql_query($sqlThrashMetal) or die(mysql_error());

$sqlDeathMetal="Update tb_subkriteria_genre set hardrock='$deathmetal1', heavy_metal='$deathmetal2', thrash_metal='$deathmetal3', death_metal='$deathmetal4', grindcore='$deathmetal5' where id_subkriteria=4";
$resultDeathMetal = mysql_query($sqlDeathMetal) or die(mysql_error());

$sqlGrindcore="Update tb_subkriteria_genre set hardrock='$grindcore1', heavy_metal='$grindcore2', thrash_metal='$grindcore3', death_metal='$grindcore4', grindcore='$grindcore5' where id_subkriteria=5";
$resultGrindcore = mysql_query($sqlGrindcore) or die(mysql_error());


//ambil nilai
$sqlNilai="Select * from tb_subkriteria_genre order by id_subkriteria Asc";
$resultNilai=mysql_query($sqlNilai) or die(mysql_error());


$totalHardrock=0;
$totalHeavyMetal=0;
$totalThrashMetal=0;
$totalDeathMetal=0;
$totalGrindcore=0;


$arHardrock[]='';
$arHeavyMetal[]='';
$arThrashMetal[]='';
$arDeathMetal[]='';
$arGrindcore[]='';


while($rowsNilai=mysql_fetch_array($resultNilai)){
	$totalHardrock+=$rowsNilai['hardrock'];
	$totalHeavyMetal+=$rowsNilai['heavy_metal'];
	$totalThrashMetal+=$rowsNilai['thrash_metal'];
	$totalDeathMetal+=$rowsNilai['death_metal'];
	$totalGrindcore+=$rowsNilai['grindcore'];
	
	
	//masukan kriteria genre ke array
	$arHardrock[]=$rowsNilai['hardrock'];
	$arHeavyMetal[]=$rowsNilai['heavy_metal'];
	$arThrashMetal[]=$rowsNilai['thrash_metal'];
	$arDeathMetal[]=$rowsNilai['death_metal'];
	$arGrindcore[]=$rowsNilai['grindcore'];
	
	
	
}

for($i=1;$i<=6;$i++){
	$NilaiHardrock[]=number_format(($arHardrock[$i]/$totalHardrock),2);
	$NilaiHeavyMetal[]=number_format(($arHeavyMetal[$i]/$totalHeavyMetal),2);
	$NilaiThrashMetal[]=number_format(($arThrashMetal[$i]/$totalThrashMetal),2);
	$NilaiDeathMetal[]=number_format(($arDeathMetal[$i]/$totalDeathMetal),2);
	$NilaiGrindcore[]=number_format(($arGrindcore[$i]/$totalGrindcore),2);
	
}

//jumlah nilai
$jumNilaiHardrock=number_format(($NilaiHardrock[0]+$NilaiHeavyMetal[0]+$NilaiThrashMetal[0]+$NilaiDeathMetal[0]+$NilaiGrindcore[0]),2);	
$jumNilaiHeavyMetal=number_format(($NilaiHardrock[1]+$NilaiHeavyMetal[1]+$NilaiThrashMetal[1]+$NilaiDeathMetal[1]+$NilaiGrindcore[1]),2);	
$jumNilaiThrashMetal=number_format(($NilaiHardrock[2]+$NilaiHeavyMetal[2]+$NilaiThrashMetal[2]+$NilaiDeathMetal[2]+$NilaiGrindcore[2]),2);	
$jumNilaiDeathMetal=number_format(($NilaiHardrock[3]+$NilaiHeavyMetal[3]+$NilaiThrashMetal[3]+$NilaiDeathMetal[3]+$NilaiGrindcore[3]),2);	
$jumNilaiGrindcore = number_format(($NilaiHardrock[4]+$NilaiHeavyMetal[4]+$NilaiThrashMetal[4]+$NilaiDeathMetal[4]+$NilaiGrindcore[4]),2);	

//Hit Prioritas
$prioHardrock=number_format(($jumNilaiHardrock/5),2);
$prioHeavyMetal=number_format(($jumNilaiHeavyMetal/5),2);
$prioThrashMetal=number_format(($jumNilaiThrashMetal/5),2);
$prioDeathMetal=number_format(($jumNilaiDeathMetal/5),2);
$prioGrindcore=number_format(($jumNilaiGrindcore/5),2);


//hitung sub prioriti
$subPrioHardrock=number_format(($prioHardrock/$prioHardrock),2);
$subPrioHeavyMetal=number_format(($prioHeavyMetal/$prioHardrock),2);
$subPrioThrashMetal=number_format(($prioThrashMetal/$prioHardrock),2);
$subPrioDeathMetal=number_format(($prioDeathMetal/$prioHardrock),2);
$subPrioGrindcore=number_format(($prioGrindcore/$prioHardrock),2);


//simpan nilai jumlah dan Prioritas
$sqlHardrock="Update tb_metrix_subkriteria_genre set hardrock='$NilaiHardrock[0]',heavy_metal='$NilaiHeavyMetal[0]', thrash_metal='$NilaiThrashMetal[0]', death_metal='$NilaiDeathMetal[0]', grindcore='$NilaiGrindcore[0]' ,jumlah='$jumNilaiHardrock', prioritas='$prioHardrock',sub_prioritas='$subPrioHardrock' where id_matrix=1";
$resultHardrock = mysql_query($sqlHardrock) or die(mysql_error());

$sqlHeavyMetal="Update tb_metrix_subkriteria_genre set hardrock='$NilaiHardrock[1]',heavy_metal='$NilaiHeavyMetal[1]', thrash_metal='$NilaiThrashMetal[1]', death_metal='$NilaiDeathMetal[1]', grindcore='$NilaiGrindcore[1]', jumlah='$jumNilaiHeavyMetal', prioritas='$prioHeavyMetal',sub_prioritas='$subPrioHeavyMetal' where id_matrix=2";
$resultHeavyMetal = mysql_query($sqlHeavyMetal) or die(mysql_error());

$sqlThrashMetal="Update tb_metrix_subkriteria_genre set hardrock='$NilaiHardrock[2]',heavy_metal='$NilaiHeavyMetal[2]', thrash_metal='$NilaiThrashMetal[2]', death_metal='$NilaiDeathMetal[2]', grindcore='$NilaiGrindcore[2]', jumlah='$jumNilaiThrashMetal', prioritas='$prioThrashMetal',sub_prioritas='$subPrioThrashMetal' where id_matrix=3";
$resultThrashMetal = mysql_query($sqlThrashMetal) or die(mysql_error());

$sqlDeathMetal="Update tb_metrix_subkriteria_genre set hardrock='$NilaiHardrock[3]',heavy_metal='$NilaiHeavyMetal[3]', thrash_metal='$NilaiThrashMetal[3]', death_metal='$NilaiDeathMetal[3]', grindcore='$NilaiGrindcore[3]', jumlah='$jumNilaiDeathMetal', prioritas='$prioDeathMetal',sub_prioritas='$subPrioDeathMetal' where id_matrix=4";
$resultDeathMetal = mysql_query($sqlDeathMetal) or die(mysql_error());

$sqlGrindcore="Update tb_metrix_subkriteria_genre set hardrock='$NilaiHardrock[4]',heavy_metal='$NilaiHeavyMetal[4]', thrash_metal='$NilaiThrashMetal[4]', death_metal='$NilaiDeathMetal[4]', grindcore='$NilaiGrindcore[4]', jumlah='$jumNilaiGrindcore', prioritas='$prioGrindcore',sub_prioritas='$subPrioGrindcore' where id_matrix=5";
$resultGrindcore = mysql_query($sqlGrindcore) or die(mysql_error());


///hit penjumlahan matrix tiap baris
$hitMatrixHardrock[]='';
$hitMatrixHeavyMetal[]='';						
$hitMatrixThrashMetal[]='';
$hitMatrixDeathMetal[]='';
$hitMatrixGrindcore[]='';


$matrixHardrock=array($hardrock1,$hardrock2,$hardrock3,$hardrock4,$hardrock5);
$matrixHeavyMetal=array($heavymetal1,$heavymetal2,$heavymetal3,$heavymetal4,$heavymetal5);
$matrixThrashMetal=array($thrashmetal1,$thrashmetal2,$thrashmetal3,$thrashmetal4,$thrashmetal5);
$matrixDeathMetal=array($deathmetal1,$deathmetal2,$deathmetal3,$deathmetal4,$deathmetal5);
$matrixGrindcore=array($grindcore1,$grindcore2,$grindcore3,$grindcore4,$grindcore5);

for($i=0;$i<=4;$i++){
$hitMatrixHardrock[]= number_format(($matrixHardrock[$i]*$prioHardrock),2);
$hitMatrixHeavyMetal[]=number_format(($matrixHeavyMetal[$i]*$prioHeavyMetal),2);
$hitMatrixThrashMetal[]=number_format(($matrixThrashMetal[$i]*$prioThrashMetal),2);
$hitMatrixDeathMetal[]=number_format(($matrixDeathMetal[$i]*$prioDeathMetal),2);
$hitMatrixGrindcore[]=number_format(($matrixGrindcore[$i]*$prioGrindcore),2);

}

$jumMatrixHardrock=number_format((array_sum($hitMatrixHardrock)),2);
$jumMatrixHeavyMetal=number_format((array_sum($hitMatrixHeavyMetal)),2);
$jumMatrixThrashMetal=number_format((array_sum($hitMatrixThrashMetal)),2);
$jumMatrixDeathMetal=number_format((array_sum($hitMatrixDeathMetal)),2);
$jumMatrixGrindcore=number_format((array_sum($hitMatrixGrindcore)),2);



//simpan ke tabel metrix penjumlahan
$sqlHardrock="Update tb_metrix_penjumlahan_genre set hardrock='$hitMatrixHardrock[1]', heavy_metal='$hitMatrixHardrock[2]', thrash_metal='$hitMatrixHardrock[3]', death_metal='$hitMatrixHardrock[4]', grindcore='$hitMatrixHardrock[5]', jumlah='$jumMatrixHardrock' where id_matrix=1";
$resultHardrock= mysql_query($sqlHardrock) or die(mysql_error());

$sqlHeavyMetal="Update tb_metrix_penjumlahan_genre set hardrock='$hitMatrixHeavyMetal[1]', heavy_metal ='$hitMatrixHeavyMetal[2]', thrash_metal='$hitMatrixHeavyMetal[3]', death_metal='$hitMatrixHeavyMetal[4]', grindcore='$hitMatrixHeavyMetal[5]', jumlah='$jumMatrixHeavyMetal' where id_matrix=2";
$resultHeavyMetal = mysql_query($sqlHeavyMetal) or die(mysql_error());

$sqlThrashMetal="Update tb_metrix_penjumlahan_genre set hardrock='$hitMatrixThrashMetal[1]', heavy_metal='$hitMatrixThrashMetal[2]', thrash_metal='$hitMatrixThrashMetal[3]', death_metal='$hitMatrixThrashMetal[4]', grindcore='$hitMatrixThrashMetal[5]', jumlah='$jumMatrixThrashMetal' where id_matrix=3";
$resultThrashMetal = mysql_query($sqlThrashMetal) or die(mysql_error());

$sqlDeathMetal="Update tb_metrix_penjumlahan_genre set hardrock='$hitMatrixDeathMetal[1]', heavy_metal='$hitMatrixDeathMetal[2]', thrash_metal='$hitMatrixDeathMetal[3]', death_metal='$hitMatrixDeathMetal[4]', grindcore='$hitMatrixDeathMetal[5]', jumlah='$jumMatrixDeathMetal' where id_matrix=4";
$resultDeathMetal = mysql_query($sqlDeathMetal) or die(mysql_error());

$sqlGrindcore="Update tb_metrix_penjumlahan_genre set hardrock='$hitMatrixGrindcore[1]', heavy_metal='$hitMatrixGrindcore[2]', thrash_metal='$hitMatrixGrindcore[3]', death_metal='$hitMatrixGrindcore[4]', grindcore='$hitMatrixGrindcore[5]', jumlah='$jumMatrixGrindcore' where id_matrix=5";
$resultGrindcore = mysql_query($sqlGrindcore) or die(mysql_error());



//hitung rasio kriteria
$rasioHardrock = number_format(($hardrock1*$prioHardrock)+($hardrock2*$prioHeavyMetal)+($hardrock3*$prioThrashMetal)+($hardrock4*$prioDeathMetal)+($hardrock5*$prioGrindcore),2);
$rasioHeavyMetal = number_format(($heavymetal1*$prioHardrock)+($heavymetal2*$prioHeavyMetal)+($heavymetal3*$prioThrashMetal)+($heavymetal4*$prioDeathMetal)+($heavymetal5*$prioGrindcore),2);
$rasioThrashMetal = number_format(($thrashmetal1*$prioHardrock)+($thrashmetal2*$prioHeavyMetal)+($thrashmetal3*$prioThrashMetal)+($thrashmetal4*$prioDeathMetal)+($thrashmetal5*$prioGrindcore),2);
$rasioDeathMetal = number_format(($deathmetal1*$prioHardrock)+($deathmetal2*$prioHeavyMetal)+($deathmetal3*$prioThrashMetal)+($deathmetal4*$prioDeathMetal)+($deathmetal5*$prioGrindcore),2);
$rasioGrindcore = number_format(($grindcore1*$prioHardrock)+($grindcore2*$prioHeavyMetal)+($grindcore3*$prioThrashMetal)+($grindcore4*$prioDeathMetal)+($grindcore5*$prioGrindcore),2);



//dari perhitungan diatas diperoleh nilai-nilai sebagai berikut :
$xJumlah=number_format(($rasioHardrock/$prioHardrock)+($rasioHeavyMetal/$prioHeavyMetal)+($rasioThrashMetal/$prioThrashMetal)+($rasioDeathMetal/$prioDeathMetal)+($rasioGrindcore/$prioGrindcore));
$xMaks=number_format(($xJumlah/5),2);
$CI=number_format(($xJumlah-5)/(5-1));
$CR=number_format(($CI/1.12),3);

if($CR<=0.1){
	header('location:../home.php?mod=subkriteria_genre&pg=form_kriteria&status=2');
}else{
	
	//simpan ke tabel rasio konsistensi kriteria
$sqlHardrock="Update tb_rasio_konsistensi_genre set jumlah='$jumMatrixHardrock', prioritas='$prioHardrock',hasil='$rasioHardrock' where id_konsistensi=1";
$resultHardrock = mysql_query($sqlHardrock) or die(mysql_error());

$sqlHeavyMetal="Update tb_rasio_konsistensi_genre set jumlah='$jumMatrixHeavyMetal',prioritas='$prioHeavyMetal', hasil='$rasioHeavyMetal' where id_konsistensi=2";
$resultHeavyMetal = mysql_query($sqlHeavyMetal) or die(mysql_error());

$sqlThrashMetal="Update tb_rasio_konsistensi_genre set jumlah='$jumMatrixThrashMetal',prioritas='$prioThrashMetal', hasil='$rasioThrashMetal' where id_konsistensi=3";
$resultThrashMetal = mysql_query($sqlThrashMetal) or die(mysql_error());

$sqlDeathMetal="Update tb_rasio_konsistensi_genre set jumlah='$jumMatrixDeathMetal',prioritas='$prioDeathMetal', hasil='$rasioDeathMetal' where id_konsistensi=4";
$resultDeathMetal = mysql_query($sqlDeathMetal) or die(mysql_error());

$sqlGrindcore="Update tb_rasio_konsistensi_genre set jumlah='$jumMatrixGrindcore',prioritas='$prioGrindcore', hasil='$rasioGrindcore' where id_konsistensi=5";
$resultGrindcore = mysql_query($sqlGrindcore) or die(mysql_error());




	
	if($resultHardrock) {
		header("location:../home.php?mod=subkriteria_genre&pg=tampil_kriteria&status=0");
		
	} else {
		header('location:../home.php?mod=subkriteria_genre&pg=tampil_kriteria&status=1');
	}
	
}
?>
