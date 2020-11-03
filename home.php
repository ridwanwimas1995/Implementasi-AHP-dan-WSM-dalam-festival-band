<?php 
error_reporting(0);
ob_start();
session_start();
include ('config/cek_session.php');
include('config/function.php'); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>SISTEM PENDUKUNG KEPUTUSAN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" /></head>
<body>
	<div id="logo">
		<h1><width="100" height="100" align="left" />
        Penerimaan Band Undangan Festival Musik KSBD Ponorogo</h1>
        
	<p>&nbsp;</p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
				<li><a href="login/logout.php" onclick="return confirm('Apakah Anda yakin?')">Logout</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="search" >
   			<form method="post" action="home.php?mod=band&pg=tampil_band">
              <table width="450" border="0" cellpadding="2" cellspacing="1" bgcolor="" class="">
 				<tr> 
     			<td width="23">
      			<fieldset>
     			<select id='search-type' name='type_cari' >
						<?php combo_cari($baris->combo_cari);?>
				</select>
        		<input type="text" name="s" id="search-text" size="15" />
        		<input type="submit" id="search-submit" value="Cari" />
        		</fieldset>
        </td>      
      </tr>				
                </table>
			</form>
            
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
		
		<div id="content">
		<?php include "isi.php";?>
		</div>
		<!-- end #content -->
		
		<div id="sidebar">
		<?php include "menu.php";?>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		<p>Copyright (c) 2018. Ridwan Wimaswara</p>
	</div>
	<!-- end #footer -->
</body>
</html>