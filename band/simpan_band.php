<?php 
ob_start();
include ('../config/koneksi.php');
include('../config/function.php');	
# Baca variabel Form (If Register Global ON)

$no_test= $_POST['no_test'];
$nama=$_POST['nama'];
$kota=$_POST['kota'];
$penampilan=$_POST['penampilan'];
$attitude=$_POST['attitude'];
$genre=$_POST['genre'];
$album=$_POST['album'];
$total_nilai=$_POST['total_nilai'];


$id=$_POST['txtId'];
$aksi=$_POST['aksi'];

$prioritas[]='';
$nilai_penampilan[]='';
$nilai_attitude[]='';
$nilai_genre[]='';
$nilai_album[]='';


$SubPrioGenre[]='';

$xPenampilan='';
$xAttitude='';
$xGenre='';
$xAlbum='';

# Validasi Form
if (trim($nama)=="") {
	echo "Nama band masih kosong, ulangi kembali";
	//include "admin/tampil_admin.php";
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
	
	
	
	
	
	$sqlGenre="select sub_prioritas from tb_metrix_subkriteria_genre order by id_matrix asc";
	$resultGenre=mysql_query($sqlGenre) or die(mysql_error());
	while($rowGenre=mysql_fetch_array($resultGenre)){
		$SubPrioGenre[]=$rowGenre['0'];	
	}
	
	
	
	
	


	
	
	
	
	
	if($aksi=='Tambah'){
		
		$sqlCek="Select nama from tb_band where nama='$nama'";
		$resultCek=mysql_query($sqlCek);
		$jumlahRow=mysql_num_rows($resultCek);
	
		if($jumlahRow==0){
		if($penampilan =='Baik'){
				$xPenampilan=number_format((1*$prioritas['1']),3);
			}elseif($penampilan=='Biasa'){
				$xPenampilan=number_format((0.75*$prioritas['1']),3);
			}elseif($penampilan=='Buruk'){
				$xPenampilan=number_format((0.5*$prioritas['1']),3);
			}
			
			
		if($attitude =='Baik'){
				$xAttitude=number_format((1*$prioritas['2']),3);
			}elseif($attitude=='Biasa'){
				$xAttitude=number_format((0.75*$prioritas['2']),3);
			}elseif($attitude=='Buruk'){
				$xAttitude=number_format((0.5*$prioritas['2']),3);
			}			
			
			
		if($genre =='Hard_rock'){
				$xGenre=number_format((1*($prioritas['3']*$SubPrioGenre['1'])),3);
			}elseif($genre=='Heavy_metal'){
				$xGenre=number_format((0.75*($prioritas['3']*$SubPrioGenre['2'])),3);
			}elseif($genre=='Thrash_metal'){
				$xGenre=number_format((0.50*($prioritas['3']*$SubPrioGenre['3'])),3);
			}elseif($genre=='Death_metal'){
				$xGenre=number_format((0.25*($prioritas['3']*$SubPrioGenre['4'])),3);
			}elseif($genre=='Grindcore'){
				$xGenre=number_format((0*($prioritas['3']*$SubPrioGenre['4'])),3);
			}			
			
			
		if($album =='>1'){
				$xAlbum=number_format((1*$prioritas['4']),3);
			}elseif($album=='1'){
				$xAlbum=number_format((0.75*$prioritas['4']),3);
			}elseif($album=='Kosong'){
				$xAlbum=number_format((0.5*$prioritas['4']),3);
			}	
		}		
			
	$total=0;
	$keterangan='';
	$total=$xPenampilan+$xAttitude+$xGenre+$xAlbum;
	$sql="Insert into tb_band(no_test,nama,kota,penampilan,attitude,genre,album,total_nilai) VALUES ('$no_test','$nama','$kota','$penampilan','$attitude','$genre','$album','$total')";
			//$pesan= "Data berhasil disimpan";	
		
		
	}elseif($aksi=='Edit'){
		
			if($penampilan =='Baik'){
				$xPenampilan=number_format((1*$prioritas['1']),3);
			}elseif($penampilan=='Biasa'){
				$xPenampilan=number_format((0.75*$prioritas['1']),3);
			}elseif($penampilan=='Buruk'){
				$xPenampilan=number_format((0.5*$prioritas['1']),3);
			}
			
			
		if($attitude =='Baik'){
				$xAttitude=number_format((1*$prioritas['2']),3);
			}elseif($attitude=='Biasa'){
				$xAttitude=number_format((0.75*$prioritas['2']),3);
			}elseif($attitude=='Buruk'){
				$xAttitude=number_format((0.5*$prioritas['2']),3);
			}				
			
			
		if($genre =='Hard_rock'){
				$xGenre=number_format((1*($prioritas['3']*$SubPrioGenre['1'])),3);
			}elseif($genre=='Heavy_metal'){
				$xGenre=number_format((0.75*($prioritas['3']*$SubPrioGenre['2'])),3);
			}elseif($genre=='Thrash_metal'){
				$xGenre=number_format((0.50*($prioritas['3']*$SubPrioGenre['3'])),3);
			}elseif($genre=='Death_metal'){
				$xGenre=number_format((0.25*($prioritas['3']*$SubPrioGenre['4'])),3);
			}elseif($genre=='Grindcore'){
				$xGenre=number_format((0*($prioritas['3']*$SubPrioGenre['4'])),3);
			}			
			
			
		if($album =='>1'){
				$xAlbum=number_format((1*$prioritas['4']),3);
			}elseif($album=='1'){
				$xAlbum=number_format((0.75*$prioritas['4']),3);
			}elseif($album=='Kosong'){
				$xAlbum=number_format((0.5*$prioritas['4']),3);
			}		
			
	$total=0;
	$keterangan='';
	$total=$xPenampilan+$xAttitude+$xGenre+$xAlbum;		
	$sql="Update tb_band set nama='$nama',kota='$kota',penampilan='$penampilan',attitude='$attitude',genre='$genre',album='$album', total_nilai='$total' where no_test='$id'";	
	}

	$result = mysql_query($sql) or die(mysql_error());
	
	//header("Location: about/form_about.php?pesan=$pesan");
	if($result) {
		header("location:../home.php?mod=band&pg=tampil_band&status=0");
		
	} else {
		header('location:../home.php?mod=band&pg=tampil_band&status=1');
	}
	
}
?>
