<?php //===========CODE DELETE RECORD ================
/*if(empty($_SESSION['Username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}*/
	
$tglFrom=$_POST['tglFrom'];
$blnFrom=$_POST['blnFrom'];
$thnFrom=$_POST['thnFrom'];
$tgl_From="$tglFrom-$blnFrom-$thnFrom";

$tglTo=$_POST['tglTo'];
$blnTo=$_POST['blnTo'];
$thnTo=$_POST['thnTo'];
$tgl_to="$tglTo-$blnTo-$thnTo";
	
?>

<div>
	<h2 id="headings"> Laporan </h2>
	Dari tanggal : <?php echo $tgl_From;?>
    <br />Sampai tanggal : <?php echo $tgl_to;?> 
    <form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="index.php?mod=kamar&pg=cek_kamar">
    <h2><div class="control-group">
		  <label class="control-label" for="tgl">Cek avalable room :</label>
			<div class="controls">
	  		<select id='tglCek' name='tglCek' class="required " style="width:80px; height:40px" >
						<?php 
    						combo_hari($tglCek);
   						?>
				</select>
                
      		<select id='blnCek' name='blnCek' class="required " style="width:80px; height:40px" >
						<?php  
   							 combo_bulan($blnCek);
   						?>
				</select>
                
      		<select id='thnCek' name='thnCek' class="required " style="width:80px; height:40px" >
						<?php  
   							 combo_tahun($thnCek);
   						?>
				</select>
                
				<button type='submit' class="required" name='aksi' value='find' style="height:40px">
				Cek
				</button>
          
			</div>  
            
		</div></h2>
        </form>
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama kamar</b></td><td><b>Type</b></td><td><b>Harga</b></td><td><b>Status</b></td><td style='min-width: 100px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='15';
$tabel="tb_kamar";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}


$query="SELECT tb_kamar.*, tb_type_kamar.*,tb_status_kamar.*
 from tb_kamar,tb_type_kamar,tb_status_kamar
 where tb_kamar.id_type=tb_type_kamar.id_type and tb_status_kamar.id_status=tb_kamar.id_status
 limit $posisi,$batas ";
 
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){
?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			
				<td><?php echo $rows ->nama_kamar; ?></td>
				<td><?php echo $rows ->nama_type; ?></td>
				<td><?php echo $rows ->harga;?></td>
                <td><?php echo $rows->status;?></td>
				<td>	
					
					<a href='index.php?mod=kamar&pg=kamar_form&id=<?php echo $rows -> id_kamar; ?>'

				class='btn btn-warning'> <i class="icon-pencil"></i></a><a href='index.php?mod=kamar&pg=kamar_view&act=del&id=<?php echo $rows -> id_kamar; ?>'
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php $no++;
				}
			?>

			<tr>
				<td colspan='5' ></td><td><a href="index.php?mod=kamar&pg=kamar_form"
				class='btn btn-primary'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT id_kamar from tb_kamar");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "tb_kamar"); ?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php $jmldata; ?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database
?>

</div>
