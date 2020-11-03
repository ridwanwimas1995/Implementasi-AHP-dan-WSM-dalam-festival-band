<?php  
include ('config/koneksi.php');
session_start();
?>
<div class="post">
	<h2 class="title"><a href="#">Form Kriteria Utama</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<div align="center">
  <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="6" bgcolor="#b9b7b7" align="center"><b>Matrik Perbandingan Berpasangan</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b><?php print_r($_SESSION['penampilan1']); ?></b></td>
      <td width="100" align="center"><b>Penampilan</b></td>
	  <td width="100" align="center"><b>Attitude</b></td>
	  <td width="100" align="center"><b>Genre</b></td>
	  <td width="100" align="center"><b>Album</b></td>
      
      
      
      <td width="100" align="center"><b>Aksi</b></td>
    </tr>
    <?php 
	$sql = "SELECT * FROM tb_kriteria_utama ORDER BY id_kriteria Asc";
	$result=mysql_query($sql) or die(mysql_error());
	//proses menampilkan data
	$totalPenampilan=0;
	$totalAttitude=0;
	$totalGenre=0;
	$totalAlbum=0;
	
	
	
	while($rows=mysql_fetch_array($result)){
		$totalPenampilan +=$rows['penampilan'];
		$totalAttitude +=$rows['attitude'];
		$totalGenre +=$rows['genre'];
		$totalAlbum +=$rows['album'];
		
	//$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rows['nama_kriteria']; ?></b></td>
     <td align="center"><?php echo $rows['penampilan']; ?></td> 
	 <td align="center"><?php echo $rows['attitude']; ?></td>
	 <td align="center"><?php echo $rows['genre']; ?></td>
	 <td align="center"><?php echo $rows['album']; ?></td>
     
     
     
     <td>&nbsp;</td>
    </tr>
    
    <?php
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
      <td><b>Jumlah</b></td>
      <td align="center"><?php echo $totalPenampilan;?></td>
	  <td align="center"><?php echo $totalAttitude;?></td>
	  <td align="center"><?php echo $totalGenre;?></td>
	  <td align="center"><?php echo $totalAlbum;?></td>
      
      
      
      <?php
	  if ($_SESSION['hak']=='Panitia'){
	  ?>
      	<td align="center"><a href="home.php?mod=kriteria&pg=form_kriteria">Ubah</a></td>
      <?php
	  }else{
	  ?>
		<td align="center"></td>
      <?php
	  }
	  ?>
    </tr>
    </tbody>
  </table>
  
</div>


<div align="center" style="margin-top:20px">
 <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="7" bgcolor="#b9b7b7" align="center"><b>Matrik Nilai Kriteria</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Penampilan</b></td>
	  <td width="100" align="center"><b>Attitude</b></td>
	  <td width="100" align="center"><b>Genre</b></td>
	  <td width="100" align="center"><b>Album</b></td>
      
      
      
      <td width="100" align="center"><b>Jumlah</b></td>
      <td width="100" align="center"><b>Prioritas</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_metrix_nilai_kriteria ORDER BY id_matrix Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rowsNilai['nama_kriteria']; ?></b></td>
     <td align="center"><?php echo $rowsNilai['penampilan']; ?></td>
	 <td align="center"><?php echo $rowsNilai['attitude']; ?></td>
	 <td align="center"><?php echo $rowsNilai['genre']; ?></td>
	 <td align="center"><?php echo $rowsNilai['album']; ?></td>
     
     
     
     <td align="center"><?php echo $rowsNilai['jumlah'];?></td>
     <td align="center"><?php echo $rowsNilai['prioritas'];?></td>
     </tr>
    
    <?php
	}
	
	
	?>
   
    </tbody>
    </table>
</div>

<div align="center" style="margin-top:20px">
 <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="7" bgcolor="#b9b7b7" align="center"><b>Matrik Penjumlahan Tiap Baris</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Penampilan</b></td>
	  <td width="100" align="center"><b>Attitude</b></td>
      <td width="100" align="center"><b>Genre</b></td>
	  <td width="100" align="center"><b>Album</b></td>
      
      
      <td width="100" align="center"><b>Jumlah</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_metrix_penjumlahan ORDER BY id_matrix Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rowsNilai['nama_kriteria']; ?></b></td>
     <td align="center"><?php echo $rowsNilai['penampilan']; ?></td>
	 <td align="center"><?php echo $rowsNilai['attitude']; ?></td>
	 <td align="center"><?php echo $rowsNilai['genre']; ?></td>
	 <td align="center"><?php echo $rowsNilai['album']; ?></td>
     
     
     
     <td align="center"><?php echo $rowsNilai['jumlah'];?></td>
     </tr>
    
    <?php
	}
	
	
	?>
   
    </tbody>
    </table>
</div>

<div align="center" style="margin-top:20px">
 <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="7" bgcolor="#b9b7b7" align="center"><b>Rasio Konsistensi</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
    <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Jumlah</b></td>
      <td width="100" align="center"><b>Prioritas</b></td>
      <td width="100" align="center"><b>Hasil</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_rasio_konsistensi_kriteria ORDER BY id_konsistensi Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	$xJumlah=0;
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rowsNilai['nama_kriteria']; ?></b></td>
      <td align="center"><?php echo $rowsNilai['jumlah']; ?></td>
     <td align="center"><?php echo $rowsNilai['prioritas']; ?></td>
     <td align="center"><?php echo $rowsNilai['hasil']; ?></td>
     </tr>  
    <?php
	
	$xJumlah+=$rowsNilai['hasil'];
	}
	
	$xMaks=number_format(($xJumlah/4),2);
	$CI=number_format((($xJumlah-4)/(4-1)),2);
	$CR=number_format(($CI/0.90),4);
	?>
   
    </tbody>
    </table>
</div>

<div align="left" style="margin-top:20px">
 <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="7" bgcolor="#b9b7b7" align="center"><b>Hasil Perhitungan</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>Keterangan</b></td>
      <td width="100" align="center"><b>Nilai</b></td>
    </tr>
    <tr bgcolor="#FFFFFF">
    <td><b>Jumlah</b></td>
    <td align="center"><?php echo $xJumlah;?></td>
    </tr>
     <tr bgcolor="#FFFFFF">
    <td><b>n(Jumlah kriteria)</b></td>
    <td align="center">4</td>
    </tr>
     <tr bgcolor="#FFFFFF">
    <td><b>Maks(Jumlah/n)</b></td>
    <td align="center"><?php echo $xMaks;?></td>
    </tr>
     <tr bgcolor="#FFFFFF">
    <td><b>CI((Maks-n)/n)</b></td>
    <td align="center"><?php echo $CI;?></td>
    </tr>
     <tr bgcolor="#FFFFFF">
    <td><b>CR(CI/IR)</b></td>
    <td align="center"><?php echo $CR;?></td>
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
		echo "window.alert('Data tidak disimpan');";
		echo "</script>";
	} elseif ($_GET['status']==2){
		echo "<script language=\"Javascript\">\n";
		echo "window.alert('Admin sudah terdaftar, silahkan coba dengan nama yang berbeda');";
		echo "</script>";
	}
}
?>

</p>
 </div>
   
</div>