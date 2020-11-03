<?php
function buatKode($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);

 	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
	
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}

function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}

function selected($t1, $t2) {
	if(trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = arrayToObject($value);
         }
      }
      return $object;
    }
    else {
      return FALSE;
    }
}

function combo_genre($kode){
	echo"<option value='' selected>- Pilih genre -</option>";
	$genre=array('Hard_rock','Heavy_metal','Thrash_metal','Death_metal','Grindcore');
	foreach($genre as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
	/*for ($i=0;$i<2;$i++){
		if($kode==""){
			echo "<option value='$jk[$i]'>" . ucwords($jk[$i]) . "</option>";	
		}else{
			echo "<option value='$jk[$i]'>" . selected($jk[$i],$kode) . "> " . ucwords($jk[$i]) . "</option>";
		}
	}*/
	
}

function combo_penampilan($kode){
	echo"<option value='' selected>- Pilih Penampilan -</option>";
	$penampilan=array('Baik','Biasa','Buruk');
	foreach($penampilan as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
	/*for ($i=0;$i<2;$i++){
		if($kode==""){
			echo "<option value='$jk[$i]'>" . ucwords($jk[$i]) . "</option>";	
		}else{
			echo "<option value='$jk[$i]'>" . selected($jk[$i],$kode) . "> " . ucwords($jk[$i]) . "</option>";
		}
	}*/
	
}

function combo_attitude($kode){
	echo"<option value='' selected>- Pilih Attitude -</option>";
	$attitude=array('Baik','Biasa','Buruk');
	foreach($attitude as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
	/*for ($i=0;$i<2;$i++){
		if($kode==""){
			echo "<option value='$jk[$i]'>" . ucwords($jk[$i]) . "</option>";	
		}else{
			echo "<option value='$jk[$i]'>" . selected($jk[$i],$kode) . "> " . ucwords($jk[$i]) . "</option>";
		}
	}*/
	
}

function combo_album($kode){
	echo"<option value='' selected>- Pilih Jumlah Album -</option>";
	$album=array('>1','1','Kosong');
	foreach($album as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
	/*for ($i=0;$i<2;$i++){
		if($kode==""){
			echo "<option value='$jk[$i]'>" . ucwords($jk[$i]) . "</option>";	
		}else{
			echo "<option value='$jk[$i]'>" . selected($jk[$i],$kode) . "> " . ucwords($jk[$i]) . "</option>";
		}
	}*/
	
}

function combo_akses($kode){
	echo"<option value='' selected>- Pilih hak akses -</option>";
	$jk=array('Panitia','Ketua Akademik');
	foreach($jk as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
	
}

function combo_cari($kode){
	echo"<option value='' selected>- Pilih pencarian -</option>";
	$jk=array('No test','Nama','Kota');
	foreach($jk as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
	/*for ($i=0;$i<2;$i++){
		if($kode==""){
			echo "<option value='$jk[$i]'>" . ucwords($jk[$i]) . "</option>";	
		}else{
			echo "<option value='$jk[$i]'>" . selected($jk[$i],$kode) . "> " . ucwords($jk[$i]) . "</option>";
		}
	}*/
	
}



function pagination($halaman, $jumlah_halaman, $tabel) {
	$baselink = "index.php?mod=" . $tabel . "&pg=" . $tabel . "_view&halaman=";
	if($halaman > 1) {
		$previous = $halaman - 1;
		echo "<li><a href='" . $baselink . "1'><i class='icon-fast-backward'></i></a></li>";
		echo "<li><a href='" . $baselink . $previous . "'><i class='icon-step-backward'></i></a></li>";
	} else {
		echo "<li><a href=''><i class='icon-fast-backward'></i></a></li><li><a href=''><i class='icon-step-backward'></i></a></li>";
	}
	
	$angka = ($halaman > 3) ? "<li><a href=''>...</a></li>" : " ";
	for($i = $halaman - 2; $i < $halaman; $i++) {
		if($i < 1)
			continue ;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= "<li> <a href='' class='btn btn-primary'>".$halaman."</a></li>";
	for($i = $halaman + 1; $i < $halaman + 3; $i++) {
		if($i > $jumlah_halaman)
			break;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= ($halaman + 2 < $jumlah_halaman ? "<li><a href=''>...</a></li>
	<li><a href='" . $baselink . $jumlah_halaman . "'>$jumlah_halaman</a></li>" : "");
	echo $angka;
	
	/*
	 for($i = 1; $i <= $jumlah_halaman; $i++) {
	 if($halaman != $i) {
	 echo "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	 } else {
	 echo "<li><a href='' class='btn btn-primary'><b>$i</b></a></li>";
	 }
	 }
	 *
	 */

	if($halaman < $jumlah_halaman) {
		$next = $halaman + 1;
		echo "<li><a href='" . $baselink . $next . "'><i class='icon-step-forward'></i></a></li>";
		echo "<li><a href='" . $baselink . $jumlah_halaman . "'><i class='icon-fast-forward'></i></a></li>";
	} else {
		echo "<li>	<a href=''><i class='icon-step-forward'></i></a></li><li><a href=''> <i class='icon-fast-forward'></i></a></li>";
	}

}

function combo_nilai($kode){
if($kode==0){
		echo "<option value='0' selected>- Pilih nilai -</option>";	
	}else{
		echo "<option value='$kode' selected>$kode</option>";
	}
	for($i=1;$i<=9;$i++){
			echo "<option>".$i."</option>";	
		}
}

function combo_hari($tgl) {
	/*echo "<option value='0' selected>-  hari -</option>";
	$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
	foreach($hari as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}*/
	if($tgl==""){
		echo "<option value='0' selected>- Tgl -</option>";
	}else{
		echo "<option value='$tgl' selected>$tgl</option>";
	}
		for($i=1;$i<=9;$i++){
			echo "<option>0".$i."</option>";	
		}
		for($i=10;$i<=31;$i++){
			echo "<option>".$i."</option>";	
		}
}

function combo_bulan($bln) {
	/*echo "<option value='' selected>Bulan</option>";
	$hari = array('Januari', 'Febuari', 'maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	foreach($hari as $key => $value) {
		if($kode == "")
			echo "<option value='$key'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$key'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}*/
	if($bln==""){
		echo "<option value='0' selected>- Bln -</option>";
	}else{
		echo "<option value='$bln' selected>$bln<option>";
	}
	
	for($i=1;$i<=9;$i++){
			echo "<option>0".$i."</option>";	
		}
		for($i=10;$i<=12;$i++){
			echo "<option>".$i."</option>";	
		}
}


function combo_tahun($thn) {
	/*echo "<option value='' selected>Tahun</option>";
	$tahun = array('2011', '2012', '2013');
	foreach($tahun as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}*/
	
	if($thn==""){
		echo "<option value='0' selected>- Thn -</option>";
	}else{
		echo "<option value='$thn' selected>$thn<option>";
	}
	
	for($i=2015;$i<=2020;$i++){
			echo "<option>".$i."</option>";	
		}
		
	
}

function combo_camaba($kode) {
	echo "<option value='' selected>- Pilih no test -</option>";
	$query = query("SELECT * FROM tb_band");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[0]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[0]) . " </option>";
	}
}

function combo_nilai_test($kode){
	echo"<option value='' selected>- Pilih Nilai -</option>";
	
	for($i = 1; $i <= 99; $i++) {
		echo "<option value='$i' " . selected($i) . ">$i</option>";
	}
	
	/*for($i=1;$i<=99;$i++){
			
		if($kode == "")
			echo "<option value='$i'> " . ucwords($i) . " </option>";
		else
			echo "<option value='$i'" . selected($kode, $kode) . "> " . ucwords($value) . " </option>";
	}*/
	
}

function konversi_bulan($bln) {
	switch($bln) {
		case "1" :

		case "01" :
			$bulan = "Januari";
			break;
		case "2" :

		case "02" :
			$bulan = "Februari";
			break;
		case "3" :

		case "03" :
			$bulan = "Maret";
			break;
		case "4" :

		case "04" :
			$bulan = "April";
			break;
		case "5" :

		case "05" :
			$bulan = "Mei";
			break;
		case "6" :

		case "06" :
			$bulan = "Juni";
			break;
		case "7" :

		case "07" :
			$bulan = "Juli";
			break;
		case "8" :

		case "08" :
			$bulan = "Agustus";
			break;
		case "9" :

		case "09" :
			$bulan = "September";
			break;
		case "10" :
			$bulan = "Oktober";
			break;
		case "11" :
			$bulan = "November";
			break;
		case "12" :
			$bulan = "Desember";
			break;
		default :
			$bulan = "Nooooooot..!!";
	}
	return $bulan;
}

function konversi_tanggal($time) {
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time) {
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

function get_date($tgl = '') {
	if($tgl == "")
		$now = date("d");
	else
		$now = $tgl;
	$jum_hr = date("t");
	for($i = 1; $i <= $jum_hr; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">$i</option>";
	}
}

function get_month($bln = '') {
	if($bln == "")
		$now = date("m");
	else
		$now = $bln;
	$jum_bl = 12;
	for($i = 1; $i <= $jum_bl; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">" . konversi_bulan($i) . "</option>";
	}
}

function get_year($thn = '') {
	if($thn == "") {
		$now = date("Y");
		$thn = date("Y");
	} else {
		$now = date("Y");
		$thn = $thn;
	}
	$jum_th = 3;
	for($i = 1; $i <= $jum_th; $i++) {
		echo "<option value='$now' " . selected($thn, $now) . ">" . $now . "</option>";
		$now--;
	}
}

function format_tanggal($date){
	$exp = explode('/',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}



?>