<?php
if(empty($_SESSION['Username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$aksi = null;
	?>



	<!--kolom kiri-->

		<h2> Form Laporan</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="laporan/LapD.php">
    <h2>
    <div class="control-group">
		  <label class="control-label" for="tgl">Dari tanggal :</label>
			<div class="controls">
	  		<select id='tglFrom' name='tglFrom' class="required " style="width:80px; height:40px" >
						<?php 
    						combo_hari($tglFrom);
   						?>
				</select>
                
      		<select id='blnFrom' name='blnFrom' class="required " style="width:80px; height:40px" >
						<?php  
   							 combo_bulan($blnFrom);
   						?>
				</select>
                
      		<select id='thnFrom' name='thnFrom' class="required " style="width:80px; height:40px" >
						<?php  
   							 combo_tahun($thnFrom);
   						?>
				</select>
			</div>  
		</div></h2>
        
        <h2>
   		<div class="control-group">
		  <label class="control-label" for="tgl">Sampai tanggal :</label>
			<div class="controls">
	  		<select id='tglCek' name='tglTo' class="required " style="width:80px; height:40px" >
						<?php 
    						combo_hari($tglTo);
   						?>
				</select>
                
      		<select id='blnTo' name='blnTo' class="required " style="width:80px; height:40px" >
						<?php  
   							 combo_bulan($blnTo);
   						?>
				</select>
                
      		<select id='thnTo' name='thnTo' class="required " style="width:80px; height:40px" >
						<?php  
   							 combo_tahun($thnTo);
   						?>
				</select>          
			</div>  
 	</div></h2>
    
    <div class="control-group">
			<div class="controls">
				<button type='submit' class='btn btn-success' name='aksi' value='tampil'>
				Tampil
				</button>
			</div>
		</div>
       
        </form>
