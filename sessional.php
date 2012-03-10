<?php

session_start();
if($_GET['ref'] == 'ime'){
	$_SESSION['connected'] = 'editor';
	header('Location:eventform.php');
}
else if($_GET['ref'] = 'imu'){
	$_SESSION['connected'] = 'user';
	header('Location:home.php');
}
else if($_GET['ref'] = 'ima'){
	$_SESSION['connected'] = 'admin';
	header('Location:home.php');
}
?>