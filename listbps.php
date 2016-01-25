<?php 
include('session.php'); 

if($login_role!="1"){
header('Location: index.php?menu=home');
}
?>
<div class="container">
<div class="page-header text-center">
<h3>Cetak Ulang BPS</h3>
</div>
<table id="daftarpem" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">No BPS</th>
                <th class="text-center">Tanggal Terima</th>
                <th class="text-center">NPWP</th>
                <th class="text-center">Jenis SPT</th>
                <th class="text-center">Status SPT</th>
				<th class="text-center">Aksi</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th class="text-center">No BPS</th>
                <th class="text-center">Tanggal Terima</th>
                <th class="text-center">NPWP</th>
                <th class="text-center">Jenis SPT</th>
                <th class="text-center">Status SPT</th>
				<th class="text-center">Aksi</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php
			$query=mysqli_query($connection, "select * from bps");
			while($row = mysqli_fetch_array($query)){
			$npwp = formatnpwp($row["npwp"]);
			$tanggalterima = converttanggal($row["tanggalterima"]);
			$jenisspt = jenisspt($row["jenisspt"]);
			$tahunpajak = $row["tahunpajak"];
			$statusbayar = statusbayar($row["statusbayar"]);
			$nominal = formatrupiah($row["nominal"]);
			$nominalcurr = nominalcurr($row["nominalcurr"]);
			$tanggalbayar = $row["tanggalbayar"];
			$reskom = reskom($row["reskom"]);
			$pembetulan = $row["pembetulan"];
			$angsuranps25 = $row["angsuranps25"]; 
			$perekam = $row["perekam"];
			$nipperekam = cariperekam($perekam);
			$namaperekam = carinamaperekam($perekam);
			$nomorbps = str_pad($row["nomorbps"], 8, '0', STR_PAD_LEFT);
			echo '
				<tr>
                <td class="text-left">'.$nomorbps.'</td>
				<td class="text-center">'.$tanggalterima.'</td>
                <td class="text-center">'.$npwp.'</td>
				<td class="text-left">'.$jenisspt.'</td>
				<td class="text-left">'.$statusbayar.'</td>
				<td class="text-center">
				<a href=bps.php?id='.$row['id'].' target="_blank">Cetak</td>
				</tr>';
			}
			?>
        </tbody>
    </table>
</div>