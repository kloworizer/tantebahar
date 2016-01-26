<?php
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($connection, "select nip,nama,seksi,role from user where nip='$user_check' limit 1");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['nama'];
$login_nip =$row['nip'];
$login_seksi =$row['seksi'];
$login_role = $_SESSION['role'];
if(!isset($login_session)){
header('Location: index.php?menu=home'); // Redirecting To Home Page
}
?>