<?php   
session_start();
if (isset($_POST['username']))
{
	include ("/config/koneksi.php");
	$username=htmlentities((trim($_POST['username'])));
	$password=htmlentities($_POST['password']);
	
	$login=mysql_query("select * from tb_admin where nama_admin='$username' and password='$password'",$koneksi);
	
	$cek_login=mysql_num_rows($login);
		if (empty($cek_login))
		{
			?><script language="javascript">
			alert("Maaf, Password Anda salah!!");
			document.location="index.php";
			</script><?php  
		}
		else
		{
			//daftarkan ID jika user dan password BENAR
			while ($row=mysql_fetch_array($login))
			{
				$id=$row[0];
				$status=$row[3];
				$hak=$row[4];
				//session_register('id');
				//session_register('username');
				$_SESSION['username'] =$username;
				$_SESSION['hak']=$hak;
			}
			echo "<script> document.location.href='home.php'; </script>";
		}
}else{
	unset($_POST['username']);
	unset($_POST['hak']);
}
?>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>Login</title>
<body onLoad=document.postform.elements['username'].focus();>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="19%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
<tr> 
	<td width="4%" align="right"><img src="./images/kiri.jpg"></td>
	<td width="74%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">FORM LOGIN</font></strong></div></td>
	<td width="21%"><img src="./images/kanan.jpg"></td>
</tr>
<tr>
	<td background="./images/b-kiri.jpg">&nbsp;</td>
	<td>
	<table width="259" align="center">
		<tr><td width="251"><font face="verdana" size="2">&nbsp;
		</font>
		
		<form action="index.php" method="post" name="postform" id="postform">
		  <table width="251" height="101" border="0" align="center">
		  <tr valign="bottom">
			<td width="104" height="35"><font size="4" face="verdana">Username</font></td>
			  <td width="137"><font size="4" face="verdana">
				<input type="text" name="username" size="20" id="username">
			  </font></td>
		  </tr>
		  
		  <tr valign="top">
			<td height="34"><font size="4" face="verdana">Password</font></td>
			  <td><font size="4" face="verdana">
				<input type="password" name="password" size="20" id="password">
			  </font></td>
		  </tr>
		  
		  <tr>
		  	<td>&nbsp;</td>
		  	<td><font size="4" face="verdana">
				<input type="submit" value="LOGIN" onClick="return cek()">
			  </font></td>
		  </tr>
		  </table>
		</form>
		
				
		</td></tr>
	</table>
	</td>
	<td background="./images/b-kanan.jpg">&nbsp;</td>
	<td width="1%"></td>
</tr>
<tr> 
	<td align="right"><img src="./images/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td><img src="./images/kab.jpg"></td>
</tr>
</table>
</body>
</html>