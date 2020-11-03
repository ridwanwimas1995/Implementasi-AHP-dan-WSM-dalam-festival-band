<?php 
//include "../session.php"; 
ob_start();
//include ('menu.php'); 
include ('config/koneksi.php');
//include('config/function.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Konfigurasi AHP</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
	<?php
//select record
	$sql = "select lebihdarisatu,masihsatu,kosong from tb_subkriteria_album";
	$result = mysql_query($sql) or die(mysql_error());
	while ($baris = mysql_fetch_array($result)){
	
		$arLebihDariSatu[] =$baris['lebihdarisatu'];
		$arMasihSatu[]=$baris['masihsatu'];
		$arKosong[]=$baris['kosong'];
		
	}
?>

<form name="form1" method="post" action="subkriteria_album/simpan_kriteria.php">
  <div align="center">
    <table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
      <tbody>
      <tr> 
        <td colspan="3" bgcolor="#b9b7b7" align="center"><b>INPUT BOBOT NILAI</b></td>
      </tr>
      <tr bgcolor="#b9b7b7" align="center">
      <td><b>Kriteria 1</b></td>
      <td><b>Nilai</b></td>
      <td><b>Kriteria 2</b></td>
      </tr>
<tr bgcolor="#FFFFFF"> 
        <td width="100">Lebih Dari 1</td>
        <td>
        	<select id='nLebihDariSatuMasihSatu' name='nLebihDariSatuMasihSatu' class="required " >
						<?php combo_nilai($arMasihSatu[0]);?>
			</select>
        </td>
        <td>Masih 1</td>
        </tr>
		
        <tr bgcolor="#FFFFFF">
        <td width="100">Lebih Dari 1</td>
        <td>
        	<select id='nLebihDariSatuKosong' name='nLebihDariSatuKosong' class="required " >
						<?php combo_nilai($arKosong[0]);?>
			</select>
        </td>
        <td>Kosong</td>     
      </tr>
	  
      <tr bgcolor="#FFFFFF">
      <td width="100">Masih 1</td>
      <td>
      		<select id='nMasihSatuKosong' name='nMasihSatuKosong' class="required " >
						<?php combo_nilai($arKosong[1]);?>
			</select>
      </td>
      <td>Kosong</td>
      </tr>
	  
    
      <tr bgcolor="#FFFFFF"> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type='submit' name='aksi' value='Proses'></td>
        
      </tr>
      </tbody>
    </table>
  </div>
</form>

<div align="center" style="margin-top:20px">
 <table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="7" bgcolor="#b9b7b7" align="center"><b>Keterangan</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>No</b></td>
      <td width="100" align="center"><b>Intensitas Kepentingan</b></td>
      <td width="100" align="center"><b>Keterangan</b></td>    
    </tr>
     <tr bgcolor="#FFFFFF">
     <td align="center">1</td>
     <td align="center">1</td>
     <td>Kedua elemen sama pentingnya</td>
     </tr>
     <tr bgcolor="#FFFFFF">
     <td align="center">2</td>
     <td align="center">3</td>
     <td>Elemen yang satu sedikit lebih penting daripada elemen yang lainnya</td>
     </tr>
    <tr bgcolor="#FFFFFF">
     <td align="center">3</td>
     <td align="center">5</td>
     <td>Elemen yang satu lebih penting daripada elemen lainnya</td>
     </tr>
     <tr bgcolor="#FFFFFF">
     <td align="center">4</td>
     <td align="center">7</td>
     <td>Satu elemen jelas lebih mutlak penting daripada elemen lainnya</td>
     </tr>
     <tr bgcolor="#FFFFFF">
     <td align="center">5</td>
     <td align="center">9</td>
     <td>Satu elemen mutlak penting dari pada elemen lainnya</td>
     </tr>
     <tr bgcolor="#FFFFFF">
     <td align="center">6</td>
     <td align="center">2,4,6,8</td>
     <td>Nilai-nilai antara dua nilai pertimbangan yang berdekatan</td>
     </tr>
     <tr bgcolor="#FFFFFF">
     <td align="center">7</td>
     <td align="center">Kebalikan</td>
     <td>Jika aktifitas I mendapat satu angka dibandingkan dengan aktifitas j, maka j memiliki nilai kebalikannya</td>
     </tr>
    </tbody>
    </table>
    </div>

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
		echo "window.alert('Rasio konsistensi hasil perhitungan tidak dapat diterima.,silahkan coba lagi dengan angka yang berbeda.,');";
		echo "</script>";
	}
}
?>
</p>
 </div>
   
</div>
