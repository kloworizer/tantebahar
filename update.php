<?php
 
$query1=mysqli_query($connection, 
"
ALTER TABLE bps ADD namawp VARCHAR(50) NOT NULL AFTER npwp;
"
);

$query2=mysqli_query($connection, 
"
INSERT INTO menu (id, parent, link, definisi, seksi, role) VALUES (NULL, '3', 'listregister', 'Register Harian', '1', '1');
"
);

if($query1){
	if($query2){
		$message =  '<script>bootbox.alert({message: "Update Berhasil",title: "Berhasil", callback: function(){window.location.replace("index.php")}});</script>';
	}
} else {
	$message =  '<script>bootbox.alert({message: "Update Gagal",title: "Error", callback: function(){window.location.replace("index.php")}});</script>';
}
echo $message;

?>
