<?php

error_reporting(-1);
include('settings.php');
include('login.php');
include('fungsi.php');
include('session.php');

$nipperekam = cariperekam($login_nip);
$namaperekam = carinamaperekam($login_nip);

$tanggalterima = $_GET["tanggalterima"];
$tanggalterimas = converttanggal($tanggalterima);
?>

<html>
	<head>
		<title></title>
		<style>
		body {
			font-family: arial;
		}
		.register  {
			border-collapse:collapse;
			border-spacing:0;
		}
		td {
			vertical-align: top;
		}
		table { 
			page-break-inside:auto;
		}
		tr    { 
			page-break-inside:avoid; 
			page-break-after:auto;
		}
		</style>
	</head>
	<body>
<p align="center">
		KEMENTERIAN KEUANGAN REPUBLIK INDONESIA
		<br>DIREKTORAT JENDERAL PAJAK
		<br><?php echo strtoupper($kanwil); ?>
		<br><?php echo strtoupper($kantor); ?>
		<br><small><?php echo strtoupper($alamat); ?>
		<br>LAYANAN INFORMASI DAN KELUHAN KRING PAJAK (021) 1500200
		<br>EMAIL pengaduan@pajak.go.id</small></p><hr>
<p align="center">REGISTER HARIAN PENERIMAAN SPT TAHUNAN<br>DALAM KEAADAN DARURAT ATAU GANGGUAN TEKNIS<br>Tanggal Terima SPT :<?php echo $tanggalterimas; ?></p>
	
<table class="register" border="1" cellpadding="0" cellspacing="0" align="center" width="100%">
  <tr>
    <th>No.</th>
    <th>Nomor BPS<br></th>
    <th>Nama WP / NPWP<br></th>
    <th>Status SPT<br></th>
  </tr>
  
<?php
$no = 0;
$query=mysqli_query($connection, "select * from bps where perekam = '$login_nip' and tanggalterima = '$tanggalterima' order by statusbayar desc,nomorbps asc");
while($row = mysqli_fetch_array($query)){
	$no++;
	$npwp = formatnpwp($row["npwp"]);
	$namawp = strtoupper($row["namawp"]);
	$tanggalterima = converttanggal($row["tanggalterima"]);
	$jenisspt = jenisspt($row["jenisspt"]);
	$kodespt = kodespt($row["jenisspt"]);
	$tahunpajak = $row["tahunpajak"];
	$statusbayar = statusbayar($row["statusbayar"]);
	$nominal = formatrupiah($row["nominal"]);
	$nominalcurr = nominalcurr($row["nominalcurr"]);
	$tanggalbayar = $row["tanggalbayar"];
	$reskom = reskom($row["reskom"]);
	$pembetulan = $row["pembetulan"];
	$angsuranps25 = $row["angsuranps25"]; 
	$espt = $row["espt"];
	$perekam = $row["perekam"];
	$nipperekam = cariperekam($perekam);
	$namaperekam = carinamaperekam($perekam);
	$nomorbps = str_pad($row["nomorbps"], 8, '0', STR_PAD_LEFT);
	
	if($espt==1){
		$statespt = "/e-SPT";
	}else{
		$statespt = "";
	}
	
	echo '
	<tr>
    <td align="right">'.$no.'</td>
    <td>.S-'.$nomorbps.'M/'.$kodespt.$kodesurat.$tahun.'</td>
    <td>'.$namawp.'<br>'.$npwp.'</td>
    <td>'.$tahunpajak.'/Pemb-'.$pembetulan.'/'.$statusbayar.$statespt.'</td>
	</tr>
	';
	
}
?>
</table>
	
	<table border="0" cellpadding="0" cellspacing="0" align="center" width="80%">
    <tbody>
		<tr>
            <td valign="top" width="356">&nbsp;
            </td>
            <td valign="top" width="356">&nbsp;
            </td>
        </tr>
		<tr>
            <td valign="top" width="356">&nbsp;
            </td>
            <td valign="top" width="356">&nbsp;
            </td>
        </tr>
        <tr>
            <td valign="top" width="356">
            </td>
            <td valign="top" width="356">
                <p>
                    <?php echo $lokasiba; ?>, <?php echo $tanggal." ".$bulanini." ".$tahun; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="356">
                <p>
                    Diterima Oleh,
                </p>
            </td>
            <td valign="top" width="356">
                <p>
                    Dibuat Oleh,
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="356">&nbsp;
            </td>
            <td valign="top" width="356">&nbsp;
            </td>
        </tr>
        <tr>
            <td valign="top" width="356">&nbsp;
            </td>
            <td valign="top" width="356">&nbsp;
            </td>
        </tr>
		<tr>
            <td valign="top" width="356">&nbsp;
            </td>
            <td valign="top" width="356">&nbsp;
            </td>
        </tr>
        <tr>
            <td valign="top" width="356">
                <p>
                    ..............................
                </p>
            </td>
            <td valign="top" width="356">
                <p>
                    <?php echo $namaperekam; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="356">
                <p>
                    NIP .......................
                </p>
            </td>
            <td valign="top" width="356">
                <p>
                    NIP <?php echo $nipperekam; ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<script>
window.onload = function() {
	window.print();
	window.close();
	}
</script>