<?php  
include ('config/koneksi.php');
?>
<div class="post">
	<h2 class="title"><a href="#">Form Subkriteria Genre</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<div align="center">
  <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="7" bgcolor="#b9b7b7" align="center"><b>Matrik Perbandingan Berpasangan</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Hardrock</b></td>
      <td width="100" align="center"><b>Heavy Metal</b></td>
      <td width="100" align="center"><b>Thrash Metal</b></td>
	  <td width="100" align="center"><b>Death Metal</b></td>
      <td width="100" align="center"><b>Grindcore</b></td>
      <td width="100" align="center"><b>Aksi</b></td>
    </tr>
	
    <?php 
	$sql = "SELECT * FROM tb_subkriteria_genre ORDER BY id_subkriteria Asc";
	$result=mysql_query($sql) or die(mysql_error());
	//proses menampilkan data
	$totalHardrock=0;
	$totalHeavyMetal=0;
	$totalThrashMetal=0;
	$totalDeathMetal=0;
	$totalGrindcore=0;
	while($rows=mysql_fetch_array($result)){
		$totalHardrock +=$rows['hardrock'];
		$totalHeavyMetal +=$rows['heavy_metal'];
		$totalThrashMetal +=$rows['thrash_metal'];
		$totalDeathMetal +=$rows['death_metal'];
		$totalGrindcore +=$rows['grindcore'];
	//$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><b><?php echo $rows['nama_subkriteria']; ?></b></td>
      <td align="center"><?php echo $rows['hardrock']; ?></td>
     <td align="center"><?php echo $rows['heavy_metal']; ?></td>
     <td align="center"><?php echo $rows['thrash_metal']; ?></td>
     <td align="center"><?php echo $rows['death_metal']; ?></td>
	 <td align="center"><?php echo $rows['grindcore']; ?></td>
     <td>&nbsp;</td>
    </tr>
    
    <?php
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
      <td><b>Jumlah</b></td>
      <td align="center"><?php echo $totalHardrock;?></td>
      <td align="center"><?php echo $totalHeavyMetal;?></td>
      <td align="center"><?php echo $totalThrashMetal;?></td>
      <td align="center"><?php echo $totalDeathMetal;?></td>
      <td align="center"><?php echo $totalGrindcore;?></td>
	  
	  <?php
	  if ($_SESSION['hak']=='Panitia'){
	  ?>
	      <td align="center"><a href="home.php?mod=subkriteria_genre&pg=form_kriteria">Ubah</a></td>
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
      <td colspan="9" bgcolor="#b9b7b7" align="center"><b>Matrik Nilai Kriteria</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="100" align="center"><b>Kriteria</b></td>
      <td width="100" align="center"><b>Hardrock</b></td>
      <td width="100" align="center"><b>Heavy Metal</b></td>
      <td width="100" align="center"><b>Thrash Metal</b></td>
      <td width="100" align="center"><b>Death Metal</b></td>
      <td width="100" align="center"><b>Grindcore</b></td>
	  <td width="100" align="center"><b>Jumlah</b></td>
      <td width="100" align="center"><b>Prioritas</b></td>
      <td width="100" align="center"><b>Subprioritas</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_metrix_subkriteria_genre ORDER BY id_matrix Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
     <td><b><?php echo $rowsNilai['nama_subkriteria']; ?></b></td>
     <td align="center"><?php echo $rowsNilai['hardrock']; ?></td>
     <td align="center"><?php echo $rowsNilai['heavy_metal']; ?></td>
     <td align="center"><?php echo $rowsNilai['thrash_metal']; ?></td>
     <td align="center"><?php echo $rowsNilai['death_metal']; ?></td>
	 <td align="center"><?php echo $rowsNilai['grindcore']; ?></td>
     <td align="center"><?php echo $rowsNilai['jumlah'];?></td>
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
       <td width="100" align="center"><b>Hardrock</b></td>
      <td width="100" align="center"><b>Heavy Metal</b></td>
      <td width="100" align="center"><b>Thrash Metal</b></td>
      <td width="100" align="center"><b>Death Metal</b></td>
      <td width="100" align="center"><b>Grindcore</b></td>
      <td width="100" align="center"><b>Jumlah</b></td>
     
    </tr>
    <?php
	$sqlNilai = "SELECT * FROM tb_metrix_penjumlahan_genre ORDER BY id_matrix Asc";
	$resultNilai=mysql_query($sqlNilai) or die(mysql_error());
	
	//$n=0;
	while($rowsNilai=mysql_fetch_array($resultNilai)){
		
	?>
     <tr bgcolor="#FFFFFF"> 
     <td><b><?php echo $rowsNilai['nama_subkriteria']; ?></b></td>
     <td align="center"><?php echo $rowsNilai['hardrock']; ?></td>
     <td align="center"><?php echo $rowsNilai['heavy_metal']; ?></td>
     <td align="center"><?php echo $rowsNilai['thrash_metal']; ?></td>
     <td align="center"><?php echo $rowsNilai['death_metal']; ?></td>
	 <td align="center"><?php echo $rowsNilai['grindcore']; ?></td>
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
	$sqlNilai = "SELECT * FROM tb_rasio_konsistensi_genre ORDER BY id_konsistensi Asc";
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
	
	$xMaks=number_format(($xJumlah/5),2);
	$CI=number_format((($xJumlah-5)/(5-1)),2);
	$CR=number_format(($CI/1.12),3);
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
    <td align="center">5</td>
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