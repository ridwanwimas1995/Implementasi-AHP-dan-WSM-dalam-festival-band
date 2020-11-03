<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)

$nama_admin= $_POST['txtUsername'];
$password=$_POST['txtPassword'];
$hak=$_POST['txtAkses'];

$id=$_POST['txtId'];
$aksi=$_POST['aksi'];
# Validasi Form
if (trim($nama_admin)=="") {
	echo "Nama user masih kosong, ulangi kembali";
	//include "admin/tampil_admin.php";
	header('location:../home.php?mod=admin&pg=form_admin&status=1');
}
else {
	
	if($aksi=='Tambah'){
		
		$sqlCek="Select nama_admin from tb_admin where nama_admin='$nama_admin'";
		$resultCek=mysql_query($sqlCek);
		$jumlahRow=mysql_num_rows($resultCek);
	
		if($jumlahRow==0){	
			$sql="Insert into tb_admin(nama_admin,password,status,hak_akses) VALUES ('$nama_admin','$password','0','$hak')";
			//$pesan= "Data berhasil disimpan";
		}else{
			header('location:../home.php?mod=admin&pg=form_admin&status=2');
		}
	}elseif($aksi=='Edit'){
		$sql="Update tb_admin set nama_admin='$nama_admin',password='$password',hak_akses='$hak' where id_admin='$id'";	
	}

	$result = mysql_query($sql) or die(mysql_error());
	
	//header("Location: about/form_about.php?pesan=$pesan");
	if($result) {
		header("location:../home.php?mod=admin&pg=tampil_admin&status=0");
		
	} else {
		header('location:../home.php?mod=admin&pg=tampil_admin&status=1');
	}
	
}
?>
