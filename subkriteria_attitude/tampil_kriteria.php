<?php  
include ('config/koneksi.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Form Subkriteria Attitude</a></h2>
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
      <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Baik</b></td>
      <td width="100" align="center"><b>Biasa</b></td>
      <td width="100" align="center"><b>Buruk</b></td>
      
      <td width="100" align="center"><b>Aksi</b></td>
    </tr>
    <?php 
	$sql = "SELECT * FROM tb_subkriteria_attitude ORDER BY id_subkriteria Asc";
	$result=mysql_query($sql) or die(mysql_error());
	//proses menampilkan data
	$totalBaik=0;
	$totalBiasa=0;
	$totalBuruk=0;
	
	while($rows=mysql_fetch_array($result)){
		$totalBaik +=$rows['baik'];
		$totalBiasa +=$rows['biasa'];
		$totalBuruk +=$rows['buruk'];
	
		
	//$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rows['nama_subkriteria']; ?></b></td>
      <td align="center"><?php echo $rows['baik']; ?></td>
     <td align="center"><?php echo $rows['biasa']; ?></td>
     <td align="center"><?php echo $rows['buruk']; ?></td>
    
     <td>&nbsp;</td>
    </tr>
    
    <?php
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
      <td><b>Jumlah</b></td>
      <td align="center"><?php echo $totalBaik;?></td>
      <td align="center"><?php echo $totalBiasa;?></td>
      <td align="center"><?php echo $totalBuruk;?></td>
      
      <?php
	  if ($_SESSION['hak']=='Panitia'){
	  ?>
	    <td align="center"><a href="home.php?mod=subkriteria_attitude&pg=form_kriteria">Ubah</a></td>
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
      <td colspan="8" bgcolor="#b9b7b7" align="center"><b>Matrik Nilai Kriteria</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Baik</b></td>
      <td width="100" align="center"><b>Biasa</b></td>
      <td width="100" align="center"><b>Buruk</b></td>
      <td width="100" align="center"><b>Jumlah</b></td>
      <td width="100" align="center"><b>Prioritas</b></td>
      <td width="100" align="center"><b>Subprioritas</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_metrix_subkriteria_attitude ORDER BY id_matrix Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
     <td><b><?php echo $rowsNilai['nama_subkriteria']; ?></b></td>
     <td align="center"><?php echo $rowsNilai['baik']; ?></td>
     <td align="center"><?php echo $rowsNilai['biasa']; ?></td>
     <td align="center"><?php echo $rowsNilai['buruk']; ?></td>
	 <td align="center"><?php echo $rowsNilai['jumlah']; ?></td>
     <td align="center"><?php echo $rowsNilai['prioritas'];?></td>
     <td align="center"><?php echo $rowsNilai['sub_prioritas'];?></td>
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
      <td width="100" align="center"><b>Baik</b></td>
      <td width="100" align="center"><b>Biasa</b></td>
      <td width="100" align="center"><b>Buruk</b></td>
      <td width="100" align="center"><b>Jumlah</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_metrix_penjumlahan_attitude ORDER BY id_matrix Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rowsNilai['nama_subkriteria']; ?></b></td>
      <td align="center"><?php echo $rowsNilai['baik']; ?></td>
     <td align="center"><?php echo $rowsNilai['biasa']; ?></td>
     <td align="center"><?php echo $rowsNilai['buruk']; ?></td>
    
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
	$sqlNilai = "SELECT * FROM tb_rasio_konsistensi_attitude ORDER BY id_konsistensi Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	$xJumlah=0;
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rowsNilai['nama_subkriteria']; ?></b></td>
      <td align="center"><?php echo $rowsNilai['jumlah']; ?></td>
     <td align="center"><?php echo $rowsNilai['prioritas']; ?></td>
     <td align="center"><?php echo $rowsNilai['hasil']; ?></td>
     </tr>  
    <?php
	
	$xJumlah+=$rowsNilai['hasil'];
	}
	
	$xMaks=number_format(($xJumlah/3),2);
	$CI=number_format(($xJumlah-3)/(3-1),2);
	$CR=number_format(($CI/0.58),4);
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
    <td align="center">3</td>
    </tr>
     <tr bgcolor="#FFFFFF">
    <td><b>Maks(Jumlah/n)</b></td>
    <td align="center"><?php echo $xMaks;?></td>
    </tr>
     <tr bgcolor="#FFFFFF">
    <td><b>CI((Maks-n)/(n-1)</b></td>
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
		echo "window.alert('Data gagal disimpan');";
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