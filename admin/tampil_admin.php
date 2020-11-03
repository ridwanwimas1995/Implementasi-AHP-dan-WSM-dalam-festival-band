<?php 
//include ('menu.php'); 
include ('config/koneksi.php');

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from tb_admin where id_admin='$id' ";
	mysql_query($sql) or die(mysql_error());

}
?>
<div class="post">
	<h2 class="title"><a href="#">Data Panitia</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<div align="center">
  <table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="3" bgcolor="#b9b7b7" align="center"><b>LIST DATA PANITIA</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="23"><b>No</b></td>
      <td width="164"><b>Nama Panitia</b></td>
      <td width="92" align="center"><b>Aksi</b></td>
    </tr>
    <?php 
	$sql = "SELECT * FROM tb_admin Where hak_akses = '$_SESSION[hak]' ORDER BY nama_admin Asc";
	$result=mysql_query($sql) or die(mysql_error());
	//proses menampilkan data
	while($rows=mysql_fetch_object($result)){
	$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><?php echo $no; ?></td>
      <td><?php echo $rows->nama_admin; ?></td>
      <td align="center"> 
        <a href='home.php?mod=admin&pg=form_admin&id=<?php echo $rows->id_admin; ?>' target="_self">Ubah</a> 
        | <a href='home.php?mod=admin&pg=tampil_admin&act=del&id=<?php echo $rows->id_admin; ?>' onClick="return confirm('Yakin data akan dihapus?') " target="_self">Hapus</a></td>
    </tr>
    <?php
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center"><a href="home.php?mod=admin&pg=form_admin">Tambah</a></td>
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
		echo "window.alert('User sudah terdaftar, silahkan coba dengan nama yang berbeda');";
		echo "</script>";
	}
}
?>

</p>
 </div>
   
</div>