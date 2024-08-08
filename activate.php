<?php
session_start();
ob_start();

require 'connection.php';

if (isset($_GET['token'])) {

	$token = $_GET['token'];
	
	$sql = "update users set active = '1' where token = '$token'";

	if (mysqli_query($conn, $sql)) {
		$_SESSION['errors'] = "Account Activated. you can login";
      	header('Location: login.html');
      	exit;
	}

} else {
	$_SESSION['errors'] = "Activation Failed!";
    header('Location: register.php');
    exit;
}
