<?php
	function formatnpwp($npwp) {
    $ret = substr($npwp,0,2)
    .substr($npwp,2,3)
    .substr($npwp,5,3)
    .substr($npwp,8,1)."-"
    .substr($npwp,9,3)."."
    .substr($npwp,12,3);
    return $ret;
    }
	
	function unformatnpwp($npwp) {
	$strStrip = array("-", ".");
	if (!is_array($npwp)) {
		$ret = trim(str_replace($strStrip, "", $npwp));
	} else {
		for ($i=0; $i<sizeof($npwp); $i++) {
		$npwp[$i] = trim(str_replace($strStrip, "", $npwp[$i]));
	}
	$ret = $npwp;
	}
	return $ret;
	}
	
	function converttanggal($value, $delimiter="-"){
    if ($value=="0000-00-00" || $value=="") $ret = ""; else {
    if ($delimiter=="-") $changeto = "/"; else $changeto = "-";
    $arr = explode($delimiter, $value);
    $ret = $arr[2].$changeto.$arr[1].$changeto.$arr[0];
    }
    return $ret;
    }
	
	function convertbulan($value, $delimiter="-"){
    if ($value=="0000-00-00" || $value=="") $ret = ""; else {
    if ($delimiter=="-") $changeto = "/"; else $changeto = "-";
    $arr = explode($delimiter, $value);
	$bulanp = $arr[1];
	switch($bulanp){
		case "01":
			$bulant = "Januari";
		break;
		case "02":
			$bulant = "Febuari";
		break;
		case "03":
			$bulant = "Maret";
		break;
		case "04":
			$bulant = "April";
		break;
		case "05":
			$bulant = "Mei";
		break;
		case "06":
			$bulant = "Juni";
		break;
		case "07":
			$bulant = "Juli";
		break;
		case "08":
			$bulant = "Agustus";
		break;
		case "09":
			$bulant = "September";
		break;
		case "10":
			$bulant = "Oktober";
		break;
		case "11":
			$bulant = "November";
		break;
		case "12":
			$bulant = "Desember";
		break;
	}
    }
	return $arr[2]." ".$bulant." ".$arr[0];
    }
	
	function converttgltomysql($tanggal){
	$ret = substr($tanggal,6,4)."-".substr($tanggal,3,2)."-".substr($tanggal,0,2);
	return $ret;
	}
	
	$tahun = date("Y");
	$bulan = date("m");
	$tanggal = date("d");
	
	function formatrupiah($angka){
	$returnangka =number_format($angka,0,'','.');
	return $returnangka;
	}
	
	function formatpersen($angka){
	$returnangka =number_format($angka,2,',','.');
	return $returnangka;
	}
	
	function formatbulat($angka){
	$returnangka =number_format($angka,2,'.',',');
	return $returnangka;
	}
	
	switch($bulan){
		case "01":
			$bulanini = "Januari";
		break;
		case "02":
			$bulanini = "Febuari";
		break;
		case "03":
			$bulanini = "Maret";
		break;
		case "04":
			$bulanini = "April";
		break;
		case "05":
			$bulanini = "Mei";
		break;
		case "06":
			$bulanini = "Juni";
		break;
		case "07":
			$bulanini = "Juli";
		break;
		case "08":
			$bulanini = "Agustus";
		break;
		case "09":
			$bulanini = "September";
		break;
		case "10":
			$bulanini = "Oktober";
		break;
		case "11":
			$bulanini = "November";
		break;
		case "12":
			$bulanini = "Desember";
		break;
	}
	
	function namahari($tanggal){
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
			);
		return $dayList[$day];
	}
	
	///////batas fungsi
	
	function ambilnomorbps(){
	require "settings.php";
	$querybps=mysqli_query($connection, "select nomorbps from bps order by nomorbps desc limit 1");
	$row = mysqli_fetch_assoc($querybps);
	$returnbps = $row['nomorbps'];
	return ($returnbps+1);
	}
	
	function cariperekam($nip){
	require "settings.php";
	$queryperekam=mysqli_query($connection, "select * from user where nip = '$nip' limit 1");
	$row = mysqli_fetch_assoc($queryperekam);
	$nippanjang = $row['nippanjang'];
	return $nippanjang;
	}
	
	function carinamaperekam($nip){
	require "settings.php";
	$queryperekam=mysqli_query($connection, "select * from user where nip = '$nip' limit 1");
	$row = mysqli_fetch_assoc($queryperekam);
	$nama = $row['nama'];
	return strtoupper($nama);
	}
	
	function jenisspt($id){
		switch($id){
		case "1":
			$jenissptdef = "SPT Tahunan PPh OP 1770";
		break;
		case "2":
			$jenissptdef = "SPT Tahunan PPh OP 1770 S";
		break;
		case "3":
			$jenissptdef = "SPT Tahunan PPh OP 1770 SS";
		break;
		case "4":
			$jenissptdef = "SPT Tahunan PPh Badan 1771 Rupiah";
		break;
		case "5":
			$jenissptdef = "SPT Tahunan PPh Badan 1771 USD";
		break;
		}
		return strtoupper($jenissptdef);
	}
	
	function kodespt($id){
		switch($id){
		case "1":
			$kodesptdef = "PPTOP";
		break;
		case "2":
			$kodesptdef = "PPTOPS";
		break;
		case "3":
			$kodesptdef = "PPTOPSS";
		break;
		case "4":
			$kodesptdef = "PPWBIDR";
		break;
		case "5":
			$kodesptdef = "PPWBUSD";
		break;
		}
		return strtoupper($kodesptdef);
	}
	
	function statusbayar($id){
		switch($id){
		case "1":
			$statusbayardef = "Nihil";
		break;
		case "2":
			$statusbayardef = "Kurang Bayar";
		break;
		case "3":
			$statusbayardef = "Lebih Bayar";
		break;
		}
		return strtoupper($statusbayardef);
	}
	
	function nominalcurr($id){
		switch($id){
		case "0":
			$nominalcurrdef = "Rp";
		break;
		case "1":
			$nominalcurrdef = "USD";
		break;
		}
		return $nominalcurrdef;
	}
	
	function reskom($id){
		switch($id){
		case "0":
			$reskomdef = "";
		break;
		case "1":
			$reskomdef = "Kompensasi";
		break;
		case "2":
			$reskomdef = "Restitusi";
		break;
		}
		return $reskomdef;
	}
	function cetak($id){
		$path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$workpath = explode("index.php",$path);
		return $workpath[0]."bps.php?id=".$id;
	}
?>