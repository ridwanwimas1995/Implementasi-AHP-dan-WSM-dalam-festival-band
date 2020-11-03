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
$foto=$_POST['foto'];



$id=$_POST['txtId'];
$aksi=$_POST['aksi'];
# Validasi Form
if (trim($nama)=="") {
	echo "Nama band masih kosong, ulangi kembali";
	//include "admin/tampil_admin.php";
	header('location:../home.php?mod=admin&pg=form_admin&status=1');
}
else {
	
	if($aksi=='Tambah'){
		
		$sqlCek="Select nama from tb_band where nama='$nama'";
		$resultCek=mysql_query($sqlCek);
		$jumlahRow=mysql_num_rows($resultCek);
	
		if($jumlahRow==0){	
			$sql="Insert into tb_band(no_test,nama,kota,penampilan,attitude,genre,album,foto) VALUES ('$no_test','$nama','$kota','$penampilan','$attitude','$genre','$album','$foto')";
			//$pesan= "Data berhasil disimpan";
		}else{
			header('location:../home.php?mod=keputusan&pg=form_band&status=2');
		}
	}elseif($aksi=='Edit'){
		$sql="Update tb_band set nama='$nama',kota='$kota',penampilan='$penampilan',attitude='$attitude',genre='$genre',album='$album',foto='$foto' where no_test='$id'";	
	}

	$result = mysql_query($sql) or die(mysql_error());
	
	//header("Location: about/form_about.php?pesan=$pesan");
	if($result) {
		header("location:../home.php?mod=keputusan&pg=tampil_band&status=0");
		
	} else {
		header('location:../home.php?mod=keputusan&pg=tampil_band&status=1');
	}
	
}
?>
