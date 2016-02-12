<?php
	error_reporting(-1);
	include('settings.php');
	include('login.php');
	include('fungsi.php');
	include('session.php'); 

	$id = $_GET["id"];

	$query=mysqli_query($connection, "select * from bps where id like '$id' limit 1");
	$row = mysqli_fetch_array($query);
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
?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $namaapp; ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<script src="./js/jquery-2.1.3.min.js"></script>
		<script src="./js/jquery-barcode.min.js"></script>
		<style>
		body {
			font-family: arial;
		}
		td {
			vertical-align: top;
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
		<table border="1" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<td style="width: 378px;">
						<p align="center">BUKTI PENERIMAAN SURAT (BPS)</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p align="center">Nomor : S-<?php echo $nomorbps; ?>M/<?php echo $kodespt; ?><?php echo $kodesurat; ?><?php echo $tahun; ?><br>
		Tanggal : <?php echo $tanggalterima; ?></p>
		<table border="0" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<td style="width: 119px;">
						<p>Nama</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p><?php echo $namawp; ?></p>
					</td>
					<td style="width: 119px;">
						<p>NPWP</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p><?php echo $npwp; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 119px;">
						<p>Alamat</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p>-</p>
					</td>
					<td style="width: 119px;">
						<p>KPP Terdaftar</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p>-</p>
					</td>
				</tr>
				<tr>
					<td style="width: 119px;">
						<p>Jenis Pajak</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p><?php echo $jenisspt; ?><?php if($espt==1){ echo " - <b>E-SPT</b>"; } ?></p>
					</td>
					<td style="width: 119px;">
						<p>Tahun Pajak</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p><?php echo $tahunpajak; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 119px;">
						<p>Status SPT</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p><?php echo $statusbayar; ?>
						<?php 
						if($row["statusbayar"]!=1){
							echo "<br>".$nominalcurr." ".$nominal;
						}
						if($row["statusbayar"]==3){
							echo "<br>".$reskom;
						}
						?>
						</p>
					</td>
					<td style="width: 119px;">
						<p>Pembetulan Ke</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p><?php echo $pembetulan; ?></p>
					</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<table border="0" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<td style="width: 461px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 251px;">
						<p>PETUGAS PENERIMA,</p>
					</td>
				</tr>
				<tr>
					<td style="width: 461px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 251px;">
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="width: 461px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 251px;">
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="width: 461px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 251px;">
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="width: 461px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 251px;">
						<p><?php echo $namaperekam; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 461px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 251px;">
						<p>NIP <?php echo $nipperekam; ?></p>
					</td>
				</tr>
			</tbody>
		</table><hr>
		<p align="center">KANTOR PELAYANAN PAJAK PRATAMA CIKARANG SELATAN</p>
		<table border="1" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<td style="width: 378px;">
						<p align="center">LEMBAR PENGAWASAN ARUS DOKUMEN</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p align="center">Nomor : S-<?php echo $nomorbps; ?>M/<?php echo $kodespt; ?><?php echo $kodesurat; ?><?php echo $tahun; ?><br>
		Tanggal : <?php echo $tanggalterima; ?></p>
		<table border="0" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<td style="width: 119px;">
						<p>Nama</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p><?php echo $namawp; ?></p>
					</td>
					<td style="width: 119px;">
						<p>NPWP</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p><?php echo $npwp; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 119px;">
						<p>Alamat</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p>-</p>
					</td>
					<td style="width: 119px;">
						<p>KPP Terdaftar</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p>-</p>
					</td>
				</tr>
				<tr>
					<td style="width: 119px;">
						<p>Jenis Pajak</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p><?php echo $jenisspt; ?><?php if($espt==1){ echo " - <b>E-SPT</b>"; } ?></p>
					</td>
					<td style="width: 119px;">
						<p>Tahun Pajak</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p><?php echo $tahunpajak; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 119px;">
						<p>Status SPT</p>
					</td>
					<td style="width: 21px;">
						<p>:</p>
					</td>
					<td style="width: 216px;">
						<p><?php echo $statusbayar; ?>
						<?php 
						if($row["statusbayar"]!=1){
							echo "<br>".$nominalcurr." ".$nominal;
						}
						if($row["statusbayar"]==3){
							echo "<br>".$reskom;
						}
						?>
						</p>
					</td>
					<td style="width: 119px;">
						<p>Pembetulan Ke</p>
					</td>
					<td style="width: 18px;">
						<p>:</p>
					</td>
					<td style="width: 219px;">
						<p><?php echo $pembetulan; ?></p>
					</td>
				</tr>
			</tbody>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<td style="width: 120px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 19px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 592px;">
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="width: 120px;">
						<p>Penerima SPT</p>
					</td>
					<td style="width: 19px;">
						<p>:</p>
					</td>
					<td style="width: 592px;">
						<p><?php echo $namaperekam; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 120px;">
						<p>NIP</p>
					</td>
					<td style="width: 19px;">
						<p>:</p>
					</td>
					<td style="width: 592px;">
						<p><?php echo $nipperekam; ?></p>
					</td>
				</tr>
				<tr>
					<td style="width: 120px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 19px;">
						<p>&nbsp;</p>
					</td>
					<td style="width: 592px;">
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="width: 120px;">
						<p>Barcode</p>
					</td>
					<td style="width: 19px;">
						<p>:</p>
					</td>
					<td style="width: 592px;">
						<p><div id="barcode" align="center"></div></p>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
<script>
$("#barcode").barcode(
"<?php echo $nomorbps; ?>",
"code39"
);     
window.onload = function() {
	window.print();
	window.close();
	}
</script>
</html>
