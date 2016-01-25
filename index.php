<?php
error_reporting(-1);
include('settings.php');
include('login.php');
include('fungsi.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $namaapp; ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./DataTables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" href="./css/animsition.min.css">
		<link rel="stylesheet" href="./css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="./css/custom.css">
		
		<script src="./js/jquery-2.1.3.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/bootbox.min.js"></script>  
		<script src="./DataTables/media/js/jquery.dataTables.js"></script>
		<script src="./js/jquery.animsition.min.js"></script>
		<script src="./js/highcharts.js"></script>
		<script src="./js/bootstrap-datepicker.min.js"></script>
		<script src="./js/bootstrap-datepicker.id.min.js"></script>
	</head>
	
	<body>
	
	<?php include('menubar.php'); ?>
	<br><br><br>
	<div class="animsition">
	<?php
	if(!isset($_GET['menu'])){
		include('home.php');
	}else{
		$halaman = $_GET['menu'];
		include $halaman.".php";
	}
	?>
	</div>
	
	<script>
	$(document).ready(function() {
  
	$(".animsition").animsition({
  
    inClass               :   'fade-in-up',
    outClass              :   'fade-out-up',
    inDuration            :    1500,
    outDuration           :    800,
    linkElement           :   '.animsition-link',
    // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    loading               :    true,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ],
    //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    
    overlay               :   false,
    
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
	});
	});
	
	$(document).ready(function() {
    $('#daftarpem').DataTable({
		"processing": true,
		"order": [0,'asc'],
		"pageLength": 50,
		"language": {    "decimal": ",",    "thousands": "."  }
	});
	} );

	</script>

	</body>
</html>