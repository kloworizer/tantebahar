<?php
include('session.php');

if($login_role > 0){
$querymenu = mysqli_query($connection, "select * from menu where parent = 0 and seksi = '$login_seksi' and role = '$login_role' order by id desc");
while($rowmenu = mysqli_fetch_assoc($querymenu)){
	$menuid = $rowmenu['id'];
	$menulink = $rowmenu['link'];
	$menudef = $rowmenu['definisi'];
	echo '
	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$menudef.'<span class="caret"></span></a>
	<ul class="dropdown-menu">
	';
	
	$querysubmenu = mysqli_query($connection, "select * from menu where parent = '$menuid' and seksi = '$login_seksi' and role = '$login_role' order by id asc");
	while($rowsubmenu = mysqli_fetch_assoc($querysubmenu)){
		$submenuid = $rowsubmenu['id'];
		$submenulink = $rowsubmenu['link'];
		$submenudef = $rowsubmenu['definisi'];
		echo '<li><a href="index.php?menu='.$submenulink.'" class="animsition-link">'.$submenudef.'</a></li>';
	}
	echo '</ul>';
}

echo '</li>';

}
?>