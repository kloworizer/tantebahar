<div class="container">
<div class="page-header text-center">
<h3>Input BPS Manual</h3>
</div>
<form action="index.php?menu=do0" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
<div class="modal-body">
	<div class="form-group">
		<label class="control-label col-sm-2" for="npwp">NPWP:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="npwp" id="npwp" maxlength="15" placeholder="__.___.___._-___.___">
		</div>
	</div>
	<div class="form-group" id="tanggalterima">
		<label class="control-label col-sm-2" for="tanggalterima">Tanggal Terima:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="tanggalterima" id="tanggalterima" data-date-format="dd-mm-yyyy" value="<?php echo $tanggal."-".$bulan."-".$tahun; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="jenisspt">Jenis SPT:</label>
		<div class="col-sm-4">
			<select class="form-control" name="jenisspt" id="jenisspt">
			<option value="3">SPT Tahunan PPh OP 1770 SS</option>
			<option value="2">SPT Tahunan PPh OP 1770 S</option>
			<option value="1">SPT Tahunan PPh OP 1770</option>
			<option value="4">SPT Tahunan PPh Badan 1771 Rupiah</option>
			<option value="5">SPT Tahunan PPh Badan 1771 USD</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="tahunpajak">Tahun Pajak:</label>
		<div class="col-sm-2">
			<select class="form-control" name="tahunpajak" id="tahunpajak">
			<?php
				for ($i=($tahun-1);$i>=($tahun-20);$i--){
					echo '<option>'.$i.'</option>';
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="statusbayar">Status N/KB/LB:</label>
		<div class="col-sm-4">
			<select class="form-control" name="statusbayar" id="statusbayar">
			<option value="1">Nihil</option>
			<option value="2">Kurang Bayar</option>
			<option value="3">Lebih Bayar</option>
			</select>
		</div>
	</div>
	<div class="form-group" id="nominal">
		<label class="control-label col-sm-2" for="nominal">Nominal:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="nominal" id="nominal">
		</div>
		<div class="col-sm-1">
			<select class="form-control" name="nominalcurr" id="nominalcurr">
			<option value="0">Rupiah</option>
			<option value="1">USD</option>
			</select>
		</div>
	</div>
	<div class="form-group" id="tanggalbayar">
		<label class="control-label col-sm-2" for="tanggalbayar">Tanggal Bayar:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="tanggalbayar" id="tanggalbayar" data-date-format="dd-mm-yyyy">
		</div>
	</div>
	<div class="form-group" id="reskom">
		<label class="control-label col-sm-2" for="reskom">Restitusi/Kompensasi:</label>
		<div class="col-sm-2">
			<select class="form-control" name="reskom" id="reskom">
			<option value="0"></option>
			<option value="1">Kompensasi</option>
			<option value="2">Restitusi</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pembetulan">Status Pembetulan:</label>
		<div class="col-sm-1">
			<select class="form-control" name="pembetulan" id="pembetulan">
			<?php
				for ($i=0;$i<=5;$i++){
					echo '<option>'.$i.'</option>';
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group" id="angsuranps25">
		<label class="control-label col-sm-2" for="angsuranps25">Angsuran ps 25:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="angsuranps25" id="angsuranps25">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="espt">e-SPT:</label>
		<div class="col-sm-4">
			<input type="checkbox" name="espt" id="espt" value="1"><br>file e-spt harap diview dulu menggunakan viewer e-SPT kemudian disimpan untuk dikumpulkan ke petugas perekam TPT Online<br>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2"></label>
		<div class="col-sm-3">
	<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Tips</div>
  <div class="panel-body">
  gunakan tombol TAB untuk berpindah ke isian selanjutnya
  </div>
</div>
</div>

<script>
$(function() {
	 $("#npwp").focus();
    $('#nominal').hide();
	$('#tanggalbayar').hide();
	$('#reskom').hide();
	$('#angsuranps25').hide();
    $('#statusbayar').change(function(){
		if($('#statusbayar').val() == '2' || $('#statusbayar').val() == '3') {
            $('#nominal').show();
			if($('#statusbayar').val() == '2') {
				$('#reskom').hide();
				$('#tanggalbayar').show();
			}else{
				$('#reskom').hide();
			}
			if($('#statusbayar').val() == '3') {
				$('#reskom').show();
				$('#tanggalbayar').hide();
			}else{
				$('#reskom').hide();
			}
        } else {
            $('#nominal').hide();
			$('#tanggalbayar').hide();
			$('#reskom').hide();
        } 
    });
	$('#jenisspt').change(function(){
		if($('#jenisspt').val() == '1' || $('#jenisspt').val() == '4' || $('#jenisspt').val() == '5') {
            $('#angsuranps25').show();
        } else {
            $('#angsuranps25').hide();
        } 
    });
});
$('#tanggalterima input').datepicker({todayBtn: "linked",language: "id",daysOfWeekDisabled: "0,6",todayHighlight: true});
$('#tanggalbayar input').datepicker({todayBtn: "linked",language: "id",todayHighlight: true});

</script>
