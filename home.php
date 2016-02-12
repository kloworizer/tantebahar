<?php 
if(isset($login_session)){
	if($login_role==1){
		//include "home-resumekasi.php";
	}
}
?>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">Boleh Dibaca</div>
  <div class="panel-body">
  Aplikasi ini digunakan untuk merekam BPS Manual dalam keadaan kahar selama tidak mati listrik dan jaringan LAN kantor dalam keaadan normal. 
  Apabila terjadi mati listrik maka komputer dan tidak bisa menyala, otomatis aplikasi ini tidak bisa digunakan. 
  Validasi NPWP tidak dapat dilakukan karena di aplikasi ini tidak terdapat data dan/atau koneksi ke masterfile wajib pajak.
  Penelitian dan Penerimaan SPT Tahunan tetap mengacu ke SE-01.PJ.2016.
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Changelog</div>
  <div class="panel-body">
  versi 0.4 - tambah kolom npwp di tanda terima, cetak register harian<br>
  versi 0.3 - tambah barcode, perbaikan bug<br>
  versi 0.2 - perbaikan bug, penambahan menu cetak BA kahar<br>
  versi 0.1 - versi awal, hanya bisa merekam dan cetak ulang BPS
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Todolist</div>
  <div class="panel-body">
  <strike>cetak BA Keadaan kahar<br>
  cetak register harian</strike><br>
  ekspor csv untuk imacros<br>
  </div>
</div>
</div>