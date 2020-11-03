<?php 
//include ('menu.php'); 
include ('config/koneksi.php');

$cari= $_POST['s'];
$type_cari=$_POST['type_cari'];
$user=$_SESSION['username'];
//include('config/function.php');
if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from tb_band where no_test='$id' ";
	mysql_query($sql) or die(mysql_error());

}
?>
<div class="post">
	<h1 class="title">Laporan Data Undangan Festival Musik</h1>
    <p class="meta"><em></em></p>
	<div class="entry">
    <p>
<div align="center">
  <table width="900" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" class="table table-condensed table-striped table-hover">
   <tbody>
   <tr bgcolor="#FFFFFF">
   <td width="100" bgcolor="#FFFFFF">
    	<button style="margin-left:5%" onClick="print_d()">Print</button>
         <script>
		function print_d(){
			window.open("laporan/print.php?name=<?php echo $user;?>","_blank");
		}
	</script>
   </td>
   </tr>
    <tr> 
      <td colspan="10" bgcolor="#b9b7b7" align="center"><b>LAPORAN DATA BAND</b></td>
    </tr>
    
    <tr bgcolor="#FFFFFF"> 
      <td width="10"><b>No</b></td>
	  <td width="70"><b>No Test</b></td>
      <td width="70"><b>Nama Band</b></td>
      <td width="100"><b>Kota</b></td>
      <td width="150"><b>Total Nilai</b></td>
 
     
      
    </tr>
    <?php 
	//if($cari==""){
	$sql = "SELECT * FROM tb_band ORDER BY total_nilai desc";
	
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
       <td><?php echo number_format($rows->total_nilai,3,",",".");?></td>
      <?php 
	  //koding menentukan nilai

	  ?>
      </td>
      



      
    
            
    </tr>
    <?php
  }
  ?>
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