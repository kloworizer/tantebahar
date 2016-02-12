<?php
 
$query=mysqli_query($connection, "ALTER TABLE bps ADD namawp VARCHAR(50) NOT NULL AFTER npwp");

if($query){
	$message =  '<script>bootbox.alert({message: "Update Berhasil",title: "Berhasil", callback: function(){window.location.replace("index.php")}});</script>';
} else {
	$message =  '<script>bootbox.alert({message: "Update Gagal",title: "Error", callback: function(){window.location.replace("index.php")}});</script>';
}
echo $message;

?>
