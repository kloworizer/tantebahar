<?php 
include('session.php'); 

if($login_role!="1"){
header('Location: index.php?menu=home');
}
?>
<div class="container">
<div class="page-header text-center">
<h3>Cetak BA Kahar</h3>
</div>
<table id="daftarpem" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Tanggal Terima</th>
				<th class="text-center">Jumlah SPT</th>
				<th class="text-center">Aksi</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th class="text-center">Tanggal Terima</th>
				<th class="text-center">Jumlah SPT</th>
				<th class="text-center">Aksi</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php
			$query=mysqli_query($connection, "select tanggalterima, count(nomorbps) as jumlah from bps group by tanggalterima");
			while($row = mysqli_fetch_array($query)){
			$tanggalterima = converttanggal($row["tanggalterima"]);
			$jumlah = formatrupiah($row["jumlah"]);
			echo '
				<tr>
                <td class="text-center">'.$tanggalterima.'</td>
				<td class="text-center">'.$jumlah.'</td>
				<td class="text-center"><a href=ba.php?tanggalterima='.$row["tanggalterima"].' target="_blank">Cetak</td>
				</tr>';
			}
			?>
        </tbody>
    </table>
</div>