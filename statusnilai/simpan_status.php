<?php 
ob_start();
include ('../config/koneksi.php');
	
# Baca variabel Form (If Register Global ON)

$nilai= $_POST['txtNilai'];

$id=$_POST['txtId'];
$aksi=$_POST['aksi'];


# Validasi Form
if (trim($nilai)=="") {
	echo "Nilai masih kosong, ulangi kembali";
	//include "admin/tampil_admin.php";
	header('location:../home.php?mod=statusnilai&pg=form_status&status=1');
}
else {
	
	if($aksi=='Edit'){		
		$sql="Update tb_statusnilai set nilai='$nilai' where id_statusnilai='$id'";	
	}

	$result = mysql_query($sql) or die(mysql_error());
	
	//header("Location: about/form_about.php?pesan=$pesan");
	if($result) {
		header("location:../home.php?mod=statusnilai&pg=tampil_status&status=0");
		
	} else {
		header('location:../home.php?mod=statusnilai&pg=tampil_status&status=1');
	}
	
}
?>
