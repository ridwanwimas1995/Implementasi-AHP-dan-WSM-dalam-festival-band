<?php
ob_start();
include ('../config/koneksi.php');
	$data = mysql_query('SELECT * FROM tb_band ORDER BY total_nilai desc');
	
	$tgl=date('d-m-Y');
	$name='Panitia';

?>
<html>
<head>
	<title></title>
	<h3 align="center"><width="100" height="100" align="left" />LAPORAN DATA HASIL PENYELEKSIAN BAND</h3>
    <h3 align="center">FESTIVAL MUSIK KSBD PONOROGO
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th rowspan="1">No. Test</th>
            <th>Nama</th>
            <th>Kota</th>
            <th>Total Nilai</th>
        
          
        </tr>
        <?php while($hasil = mysql_fetch_array($data)){ ?>
        <tr id="rowHover">
        	<td width="10%" align="center"><?php echo $hasil['no_test']; ?></td>
            <td width="20%" id="column_padding"><?php echo $hasil['nama']; ?></td>
			<td width="20%" id="column_padding"><?php echo $hasil['kota']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['total_nilai']; ?>
     
            </td>
            
        
    
     
          
        </tr>
        
        <?php } ?>
   
    </table>
    
     <table border="1" width="90%" style=" border:none; margin-top:10px;" align="center">
    	<tr class="" style="border:none">
        	<th rowspan="1" style="border:none">&nbsp;</th>
            <th style="border:none" width="25%">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none" align="center">Ponorogo, <?php echo $tgl ?></th>
        </tr>
        <tr>
        <th rowspan="1" style="border:none">&nbsp;</th>
            <th style="border:none" width="25%">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none" align="center"><?php echo $name;?></th>
        </tr>
        <tr height="100px">
        <th rowspan="1" style="border:none; margin-top:30px;">&nbsp;</th>
            <th style="border:none" width="25%">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none">&nbsp;</th>
            <th style="border:none; margin-top:30px;" align="center">................</th>
        </tr>
     </table>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>