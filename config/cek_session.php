<?php 

//session_start();
/*if (session_is_registered('id'))
{*/
if(empty($_SESSION['username'])){
	?><script language="javascript">
	alert("Maaf, Anda tidak berhak mengakses halaman ini!!");
	document.location="index.php";
	</script>
	<?php 	
}
?>