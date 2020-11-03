<?php 
ob_start();
include ('../config/koneksi.php');
include('../config/function.php');	
# Baca variabel Form (If Register Global ON)

$no_test= $_POST['no_test'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$tgl_lahir=format_tanggal($_POST['tgl']);
$jenis_kelamin=$_POST['jenis_kelamin'];
$nama_ortu=$_POST['nama_ortu'];
$tlp=$_POST['telp'];
$sekolah=$sekolah=$_POST['sekolah'];



$id=$_POST['txtId'];
$aksi=$_POST['aksi'];
# Validasi Form
if (trim($nama)=="") {
	echo "Nama camaba masih kosong, ulangi kembali";
	//include "admin/tampil_admin.php";
	header('location:../home.php?mod=admin&pg=form_admin&status=1');
}
else {
	
	if($aksi=='Tambah'){
		
		$sqlCek="Select nama from tb_camaba where nama='$nama'";
		$resultCek=mysql_query($sqlCek);
		$jumlahRow=mysql_num_rows($resultCek);
	
		if($jumlahRow==0){	
			$sql="Insert into tb_camaba(no_test,nama,alamat,tgl_lahir,jenis_kelamin,nama_ortu,tlp,sekolah) VALUES ('$no_test','$nama','$alamat','$tgl_lahir','$jenis_kelamin','$nama_ortu','$tlp','$sekolah')";
			//$pesan= "Data berhasil disimpan";
		}else{
			header('location:../home.php?mod=camaba&pg=form_camaba&status=2');
		}
	}elseif($aksi=='Edit'){
		$sql="Update tb_camaba set nama='$nama',alamat='$alamat',tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',nama_ortu='$nama_ortu',tlp='$tlp',sekolah='$sekolah' where no_test='$id'";	
	}

	$result = mysql_query($sql) or die(mysql_error());
	
	//header("Location: about/form_about.php?pesan=$pesan");
	if($result) {
		header("location:../home.php?mod=camaba&pg=tampil_camaba&status=0");
		
	} else {
		header('location:../home.php?mod=camaba&pg=tampil_camaba&status=1');
	}
	
}
?>
