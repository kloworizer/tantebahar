<?php

error_reporting(-1);
include('settings.php');
include('login.php');
include('fungsi.php');
include('session.php');

$nipperekam = cariperekam($login_nip);
$namaperekam = carinamaperekam($login_nip);

$tanggalterima = $_GET["tanggalterima"];

$query=mysqli_query($connection, "select tanggalterima, count(nomorbps) as jumlah from bps where tanggalterima = '$tanggalterima'");
$row = mysqli_fetch_array($query);
$jumlah = formatrupiah($row["jumlah"]);
$tanggalpanjang = convertbulan($tanggalterima);
?>

<html>
	<head>
		<title></title>
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
<p align="center">BERITA ACARA PENERIMAAN SPT TAHUNAN<br>DALAM KEAADAN DARURAT ATAU GANGGUAN TEKNIS</p>
<p>
    Pada hari ini <?php echo namahari(date("Y-m-d")); ?>, tanggal <?php echo $tanggal." ".$bulanini." ".$tahun; ?> kami menyatakan telah terjadi gangguan berupa tidak dapat diaksesnya aplikasi TPT Online pada tanggal <?php echo $tanggalpanjang; ?> pukul 07.30 sampai dengan pukul 17.00 di <?php echo $lokasiba; ?> yang menyebabkan tidak dapat melakukan penerimaan SPT Tahunan melalui aplikasi TPT Online.
</p>
<p>
    Berkenaan dengan kejadian tersebut, pemberian Bukti Penerimaan SPT Tahunan kepada Wajib Pajak sejumlah <?php echo $jumlah; ?> lembar dilakukan secara manual.
</p>
<p>
    Demikian Berita Acara ini dibuat menurut keaadan yang sebenarnya dan penuh rasa tanggung jawab.
</p>
	<table border="0" cellpadding="0" cellspacing="0" align="center" width="80%">
    <tbody>
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
                    Kepala <?php echo $kantor; ?>,
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
                    <?php echo strtoupper($kepalakantor); ?>
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
                    NIP <?php echo $nipkepala; ?>
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