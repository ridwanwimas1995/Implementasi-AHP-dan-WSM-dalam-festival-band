<?php 
//include "../session.php"; 
ob_start();
//include ('menu.php'); 
include ('config/koneksi.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Form Panitia</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<?php
if(isset($_GET['id'])) {
	$aksi = "Edit";
	$id = $_GET['id'];
//select record
	$sql = "select * from tb_admin where id_admin='$id' ";
	$result = mysql_query($sql) or die(mysql_error());
	$baris = mysql_fetch_object($result);

	} else {
		$aksi = "Tambah";
}
?>

<form name="form1" method="post" action="admin/simpan_admin.php">
  <div align="center">
    <table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
      <tbody>
      <tr> 
        <td colspan="3" bgcolor="#b9b7b7"><b>INPUT PANITIA</b></td>
      </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="77">Username</td>
        <td><input type='text' name='txtUsername' value='<?php echo $baris->nama_admin;?>'></td>
        <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
        <td width="77">Password</td>
        <td><input type='password' name='txtPassword' value=''></td>
        <td><input type='hidden' name='txtId' value='<?php echo $baris->id_admin;?>'></td>
      </tr>
       <tr bgcolor="#FFFFFF"> 
        <td width="77">Status</td>
        <td>
        <select id='txtAkses' name='txtAkses' class="required " >
						<?php combo_akses($baris->hak_akses);?>
			</select>
        </td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#FFFFFF"> 
        <td>&nbsp;</td>
        <td><input type='submit' name='aksi' value='<?php echo $aksi;?>'></td>
        <td>&nbsp;</td>
      </tr>
      </tbody>
    </table>
  </div>
</form>
<?php
//menampilkan pesan
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		//echo "Data berhasil disimpan";
		echo "<script language=\"Javascript\">\n";
		echo "window.alert('Data berhasil disimpan');";
		echo "</script>";
	} elseif ($_GET['status']==1) {
		echo "<script language=\"Javascript\">\n";
		echo "window.alert('Data gagal disimpan');";
		echo "</script>";
	} elseif ($_GET['status']==2){
		echo "<script language=\"Javascript\">\n";
		echo "window.alert('Username sudah terdaftar, silahkan coba dengan username yang berbeda');";
		echo "</script>";
	}
}
?>
</p>
 </div>
   
</div>
