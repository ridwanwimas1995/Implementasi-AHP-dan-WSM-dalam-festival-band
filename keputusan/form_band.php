<?php 
//include "../session.php"; 
ob_start();
//include ('menu.php'); 
include ('config/koneksi.php');
//include('config/function.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Form Calon Mahasiswa Baru</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<?php
if(isset($_GET['id'])) {
	$aksi = "Edit";
	$id = $_GET['id'];
//select record
	$sql = "select * from tb_band where no_test='$id' ";
	$result = mysql_query($sql) or die(mysql_error());
	$baris = mysql_fetch_object($result);
	$no_test=$baris->no_test;

	} else {
		$aksi = "Tambah";
		$no_test=buatKode("tb_band","MB");
}
?>

<form name="form1" method="post" action="keputusan/simpan_band.php">
  <div align="center">
    <table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
      <tbody>
      <tr> 
        <td align="center" colspan="2" bgcolor="#b9b7b7"><b>INPUT DATA FESTIVAL BAND</b></td>
      </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="77">No Test</td>
        <td><input type='text' name='no_test' readonly='readonly' value='<?php echo $no_test;?>'></td>
		<input type='hidden' name='txtId' value='<?php echo $baris->no_test;?>'>
        </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="77">Nama Band</td>
        <td><input type='text' name='nama' value='<?php echo $baris->nama;?>'></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
        <td  width="77">Asal Kota</td>
        <td><input type='text' name='kota' value='<?php echo $baris->kota;?>'></td>
        </tr>
        
        <tr bgcolor="#FFFFFF">
        <td width="100">Penampilan</td>
        <td>
        <select id='penampilan' name='penampilan' class="required " >
						<?php combo_penampilan($baris->penampilan);?>
		</select>
        </td>
        </tr> 
		
		  <tr bgcolor="#FFFFFF">
        <td width="100">Attitude</td>
        <td>
        <select id='attitude' name='attitude' class="required " >
						<?php combo_attitude($baris->attitude);?>
		</select>
        </td>
        </tr> 
		
		  <tr bgcolor="#FFFFFF">
        <td width="100">Genre</td>
        <td>
        <select id='genre' name='genre' class="required " >
						<?php combo_genre($baris->genre);?>
		</select>
        </td>
        </tr> 
		
		  <tr bgcolor="#FFFFFF">
        <td width="100">Album</td>
        <td>
        <select id='album' name='album' class="required " >
						<?php combo_album($baris->album);?>
		</select
        </td>
        </tr> 
		
        <tr bgcolor="#FFFFFF"> 
        <td width="77">Foto</td>
        <td><input type='text' name='foto' value='<?php echo $baris->foto;?>'></td>
        </tr>
       
      <tr bgcolor="#FFFFFF">
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
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>