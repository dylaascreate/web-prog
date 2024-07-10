<?php
session_start();

include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$mysqllogin = "SELECT * FROM admins WHERE username='$username' and password='$password'";
$cek = $conn->query($mysqllogin);

if ($cek->num_rows > 0) {
	$_SESSION['username'] = $username;
	header("location:admin.php?login=success");
} else {
    header("location:index.php?login=failed");
}
?>