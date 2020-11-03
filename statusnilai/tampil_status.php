 <?php 
//include ('menu.php'); 
include ('config/koneksi.php');

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from tb_statusnilai where id_statusnilai='$id' ";
	mysql_query($sql) or die(mysql_error());

}
?>
<div class="post">
	<h2 class="title"><a href="#">Data Status Nilai</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<div align="center">
  <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="4" bgcolor="#b9b7b7" align="center"><b>LIST DATA STATUS NILAI</b></td>
    </tr>
    <tr bgcolor="#FFFFFF">
    <td width="23" align="center"><b>No</b></td>
      <td width="23" align="center"><b>Keterangan</b></td>
      <td width="100" align="center"><b>Nilai</b></td>
      <td width="100" align="center"><b>Action</b></td>
     </tr>
    <?php 
	$sql = "SELECT * FROM tb_statusnilai ORDER BY id_statusnilai Asc";
	$result=mysql_query($sql) or die(mysql_error());
	//proses menampilkan data
	while($rows=mysql_fetch_array($result)){
	$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td align="center"><?php echo $no; ?></td>
      
      <td align="center">
	  	<?php echo $rows['keterangan']; ?>
      </td>
      <td align="center">
	  	<?php echo $rows['nilai']; ?> 
      </td>
     
      <?php
	  if ($_SESSION['hak']=='Panitia'){
	  ?>
      	<td align="center"><a href='home.php?mod=statusnilai&pg=form_status&id=<?php echo $rows['id_statusnilai']; ?>' target="_self">Ubah</a></td>
   	  <?php
	  }else{
	  ?>
		<td align="center"></td>
      <?php
	  }
	  ?>
    </tr>
    <?php
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
		echo "window.alert(Sudah terdaftar, silahkan coba dengan no test yang berbeda');";
		echo "</script>";
	}
}
?>

</p>
 </div>
   
</div>