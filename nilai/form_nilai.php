<?php 
//include "../session.php"; 
ob_start();
//include ('menu.php'); 
include ('config/koneksi.php');
//include('config/function.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Form Data Nilai</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<?php
if(isset($_GET['id'])) {
	$aksi = "Edit";
	$id = $_GET['id'];
//select record
	$sql = "select * from tb_nilai_test where id_nilai='$id' ";
	$result = mysql_query($sql) or die(mysql_error());
	$baris = mysql_fetch_array($result);

	} else {
		$aksi = "Tambah";
}
?>

<form name="form1" method="post" action="nilai/simpan_nilai.php">
  <div align="center">
    <table width="600" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
      <tbody>
      <tr> 
        <td align="center" colspan="3" bgcolor="#b9b7b7"><b>INPUT NILAI TEST</b></td>
      </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="200">No Test</td>
        <td>
        	<select id='no_test' name='no_test' class="required " >
						<?php combo_camaba($baris['no_test']);?>
			</select>
        </td>
        <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
        <td width="200">Nilai Penampilan</td>
        <td>
        	<select id='nilai_ijasah' name='nilai_ijasah' class="required " >
						<?php combo_nilai_test($baris['nilai_ijasah']);?>
			</select>
        </td>
        <td><input type='hidden' name='txtId' value='<?php echo $baris['id_nilai'];?>'></td>
      </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="200">Nilai Attitude</td>
        <td>
        	<select id='nilai_wawancara' name='nilai_wawancara' class="required " >
						<?php combo_nilai_test($baris['nilai_wawancara']);?>
			</select>
        </td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="200">Nilai Genre</td>
        <td>
        	<select id='nilai_tpa' name='nilai_tpa' class="required " >
						<?php combo_nilai_test($baris['nilai_tpa']);?>
			</select>
        </td>
        <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
        <td width="200">Nilai Album</td>
        <td>
        	<select id='nilai_alquran' name='nilai_alquran' class="required " >
						<?php combo_nilai_test($baris['nilai_alquran']);?>
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
		echo "window.alert('No test sudah terdaftar, silahkan coba dengan no test yang berbeda');";
		echo "</script>";
	}
}
?>
</p>
 </div>
   
</div>
