<?php
include ('config/cek_session.php');
//if($_GET['pg']!=""){
//$page=htmlentities($_GET['pg']);
//}
//$halaman="$page.php";

//$pg = '';
/*
 * PHP Code untuk mendapatkan halaman view masing masing tabel
 */

if(empty($_GET['pg'])) {
		include ('config/welcome.php');
} else {
	/*$pg = $page;
	$mod = htmlentities($_GET['mod']);
	include $mod . '/' . $pg . ".php";*/
	$pg = $_GET['pg'];
	$mod = $_GET['mod'];
	include $mod . '/' . $pg . ".php";

}

/*if(!file_exists($halaman) || empty($page)){
	include "config/welcome.php";
}else{
	include "$halaman";
}*/
?>