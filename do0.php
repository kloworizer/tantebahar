<?php
include('session.php'); 
if($login_role == "1"){
	$npwp = $_POST["npwp"];
	$namawp = $_POST["namawp"];
	$tanggalterima = converttgltomysql($_POST["tanggalterima"]);
	$jenisspt = $_POST["jenisspt"];
	$tahunpajak = $_POST["tahunpajak"];
	$statusbayar = $_POST["statusbayar"];
	$nominal = $_POST["nominal"];
	$nominalcurr = $_POST["nominalcurr"];
	$tanggalbayar = converttgltomysql($_POST["tanggalbayar"]);
	$reskom = $_POST["reskom"];
	$pembetulan = $_POST["pembetulan"];
	$angsuranps25 = $_POST["angsuranps25"]; 
	if(isset($_POST["espt"]) && $_POST["espt"] == 1) {
    $espt = 1;
	}else{
    $espt = 0;
	}
	$perekam = $login_nip;
	
	$sanity = 0;
	
	if($npwp == "" or strlen($npwp)<15){
		$message =  '<script>bootbox.alert({message: "NPWP tidak boleh kosong/kurang dari 15 digit",title: "Error", callback: function(){window.location.replace("index.php?menu=forminput")}});</script>';
		$sanity = 1;
	}
	
	if($statusbayar==2 and $tanggalbayar=="--"){
		$message =  '<script>bootbox.alert({message: "Status SPT Kurang Bayar tetapi tanggal bayar kosong",title: "Error", callback: function(){window.location.replace("index.php?menu=forminput")}});</script>';
		$sanity = 1;
	}
	
	if($statusbayar==3 and $reskom==0){
		$message =  '<script>bootbox.alert({message: "Status SPT Lebih Bayar tetapi tidak dipilih restitusi/kompensasi",title: "Error", callback: function(){window.location.replace("index.php?menu=forminput")}});</script>';
		$sanity = 1;
	}
	
	if($sanity==0){
		$nomorbps = ambilnomorbps();
		$insert = mysqli_query($connection,"
		INSERT INTO 
		bps 
		(`id`, `npwp`, `namawp`, `tanggalterima`, `jenisspt`, `tahunpajak`, `statusbayar`, `nominal`, `nominalcurr`, `tanggalbayar`, `reskom`, `pembetulan`, `angsuranps25`, `perekam`, `nomorbps`, `espt`) 
		VALUES 
		(NULL, '$npwp', '$namawp', '$tanggalterima', '$jenisspt', '$tahunpajak', '$statusbayar', '$nominal', '$nominalcurr', '$tanggalbayar', '$reskom', '$pembetulan', '$angsuranps25', '$perekam', '$nomorbps', '$espt');");
		if($insert){
			echo '<script>window.open("'.cetak($nomorbps).'", "", "width=800, height=600")</script>';
			$message =  '<script>
						bootbox.alert({message: "Data berhasil disimpan",title: "Berhasil", callback: function(){window.location.replace("index.php?menu=forminput")}});
						</script>';
		} else {
			$message =  '<script>bootbox.alert({message: "Data gagal disimpan",title: "Error", callback: function(){window.location.replace("index.php?menu=forminput")}});</script>';
		}
	}
	echo $message;
}
?>