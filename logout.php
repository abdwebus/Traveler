<?php 
	session_start();
	$_SESSION['userid'] = NULL;
	header('Location: index.php');
?>