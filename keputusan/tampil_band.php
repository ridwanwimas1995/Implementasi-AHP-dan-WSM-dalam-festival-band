<?php 
//include ('menu.php'); 
include ('config/koneksi.php');

$cari= $_POST['s'];
$type_cari=$_POST['type_cari'];


//include('config/function.php');
if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from tb_band where no_test='$id' ";
	mysql_query($sql) or die(mysql_error());

}
?>
<div class="post">
	<h2 class="title"><a href="#">Data Band Festival</a></h2>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<div align="center">
  <table width="900" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000" class="table table-condensed table-striped table-hover">
   <tbody>
    <tr> 
      <td colspan="10" bgcolor="#b9b7b7" align="center"><b>LIST DATA BAND</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
	<td width="23" align="center"><b>No</b></td>
	<td width="100" align="center"><b>No Test</b></td>
	<td width="100" align="center"><b>Nama</b></td>
	<td width="100" align="center"><b>Kota</b></td>
	<td width="100" align="center"><b>Penampilan</b></td>
	<td width="100" align="center"><b>Attitude</b></td>
	<td width="100" align="center"><b>Genre</b></td>
	<td width="100" align="center"><b>Album</b></td>
	
	<td width="100" align="center"><b>Foto</b></td>
	
	
      
           
      <td width="92" align="center"><b>Aksi</b></td>
    </tr>
    <?php 
	if($cari==""){
	$sql = "SELECT * FROM tb_band ORDER BY nama Asc";
	}else{
		if($type_cari=="No test"){
			$sql = "SELECT * FROM tb_band where no_test LIKE'%" .$cari. "%'ORDER BY nama Asc";
		}elseif($type_cari=="Nama"){
			$sql = "SELECT * FROM tb_band where nama LIKE'%" .$cari. "%'ORDER BY nama Asc";
		}elseif($type_cari=="Alamat"){
			$sql = "SELECT * FROM tb_band where kota LIKE'%" .$cari. "%'ORDER BY nama Asc";	
		}
	}
	
	$result=mysql_query($sql) or die(mysql_error());
	//proses menampilkan data
	while($rows=mysql_fetch_object($result)){
	$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><?php echo $no; ?></td>
      <td><?php echo $rows->no_test; ?></td>
      <td><?php echo $rows->nama;?></td>
      <td><?php echo $rows->kota;?></td>
      <td><?php echo $rows->penampilan;?></td>
	  <td><?php echo $rows->attitude;?></td>
	  <td><?php echo $rows->genre;?></td>
	  <td><?php echo $rows->album;?></td>
     
      <td><?php echo $rows->foto;?></td>
     
      
     	<?php
		if ($_SESSION['hak']=='Panitia'){
		?>
    	 	<td align="center"> <a href='home.php?mod=keputusan&pg=form_band&id=<?php echo $rows->no_test; ?>' target="_self">Ubah</a>
            | <a href='home.php?mod=keputusan&pg=tampil_band&act=del&id=<?php echo $rows->no_test; ?>' onClick="return confirm('Yakin data akan dihapus?') " target="_self">Hapus</a></td>
            </td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  
	  
            <?php
			if ($_SESSION['hak']=='Panitia'){
			?>
      			<td align="center"><a href="home.php?mod=keputusan&pg=form_band">Tambah</a></td> 
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