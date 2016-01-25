<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = '<script>bootbox.alert({message: "Username atau Password salah",title: "Error"});</script>';
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
$query = mysqli_query($connection, "select * from user where password='$password' AND nip='$username' limit 1");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$queryrole=mysqli_query($connection, "select role from user where nip='$username' limit 1");
$roles = mysqli_fetch_array($queryrole);
$role = $roles['role'];
$_SESSION['login_user']=$username;
$_SESSION['role']=$role;

header("profile.php");
} else {
$error = '<script>bootbox.alert({message: "Username atau Password salah",title: "Error"});</script>';
}
mysqli_close($connection);
}
}
?>