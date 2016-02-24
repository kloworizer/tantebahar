<?php 
include('session.php'); 

if($login_role!="1"){
header('Location: index.php?menu=home');
}
?>
<div class="container">
<div class="page-header text-center">
<h3>Register Harian</h3>
</div>
<table id="daftarpem" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Tanggal Terima</th>
				<th class="text-center">SPT Nihil</th>
				<th class="text-center">SPT Kurang Bayar</th>
				<th class="text-center">SPT Lebih Bayar</th>
				<th class="text-center">Jumlah SPT</th>
				<th class="text-center">Aksi</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th class="text-center">Tanggal Terima</th>
				<th class="text-center">SPT Nihil</th>
				<th class="text-center">SPT Kurang Bayar</th>
				<th class="text-center">SPT Lebih Bayar</th>
				<th class="text-center">Jumlah SPT</th>
				<th class="text-center">Aksi</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php
			$query=mysqli_query($connection, "select tanggalterima, count(nomorbps) as jumlah from bps where perekam = '$login_nip' group by tanggalterima");
			while($row = mysqli_fetch_array($query)){
			$tanggalterima = converttanggal($row["tanggalterima"]);
			$jumlah = formatrupiah($row["jumlah"]);
			
			$querynihil=mysqli_query($connection, "select count(nomorbps) as jumlah from bps where statusbayar = '1' and perekam = '$login_nip' and tanggalterima = '$row[tanggalterima]'");
			$rownihil = mysqli_fetch_array($querynihil);
			$nihil = formatrupiah($rownihil["jumlah"]);
			
			$querykb=mysqli_query($connection, "select count(nomorbps) as jumlah from bps where statusbayar = '2' and perekam = '$login_nip' and tanggalterima = '$row[tanggalterima]'");
			$rowkb = mysqli_fetch_array($querykb);
			$kb = formatrupiah($rowkb["jumlah"]);
			
			$querylb=mysqli_query($connection, "select count(nomorbps) as jumlah from bps where statusbayar = '3' and perekam = '$login_nip' and tanggalterima = '$row[tanggalterima]'");
			$rowlb = mysqli_fetch_array($querylb);
			$lb = formatrupiah($rowlb["jumlah"]);

			echo '
				<tr>
                <td class="text-center">'.$tanggalterima.'</td>
				<td class="text-center">'.$nihil.'</td>
				<td class="text-center">'.$kb.'</td>
				<td class="text-center">'.$lb.'</td>
				<td class="text-center">'.$jumlah.'</td>
				<td class="text-center"><a href=register.php?tanggalterima='.$row["tanggalterima"].' target="_blank">Cetak</td>
				</tr>';
			}
			?>
        </tbody>
    </table>
</div>