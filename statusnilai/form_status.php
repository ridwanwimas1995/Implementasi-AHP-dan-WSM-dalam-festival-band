<?php 
//include "../session.php"; 
ob_start();
//include ('menu.php'); 
include ('config/koneksi.php');
//include('config/function.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Form Data Status Nilai</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<?php
if(isset($_GET['id'])) {
	$aksi = "Edit";
	$id = $_GET['id'];
//select record
	$sql = "select * from tb_statusnilai where id_statusnilai='y' ";
	$result = mysql_query($sql) or die(mysql_error());
	$baris = mysql_fetch_object($result);

	} else {
		$aksi = "Tambah";
}
?>

<form name="form1" method="post" action="statusnilai/simpan_status.php">
  <div align="center">
    <table width="600" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
    
      <tbody>
      <tr> 
        <td align="center" colspan="3" bgcolor="#b9b7b7"><b>INPUT NILAI</b></td>
         
      </tr>
      
  	<tr bgcolor="#FFFFFF">
        <td width="77">Keterangan</td><td><input type='text' name='txtStatus' readonly="readonly" value='<?php echo $baris->keterangan;?>'></td>
        <td>&nbsp;</td>
        </tr>
        
        <tr bgcolor="#FFFFFF"> 
        <td width="77">Nilai</td><td><input type='text' name='txtNilai' value='<?php echo $baris->nilai;?>'></td>
        <td><input type='hidden' name='txtId' value='<?php echo $baris->id_statusnilai;?>'></td>
       
        </tr>
        
      <tr bgcolor="#FFFFFF"><td>&nbsp;</td> <td><input type='submit' name='aksi' value='<?php echo $aksi;?>'></td>
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
		echo "window.alert('No test sudah terdaftar, silahkan coba dengan no test yang berbeda');";
		echo "</script>";
	}
}
?>
</p>
 </div>
   
</div>
