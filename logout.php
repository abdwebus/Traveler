<?php 
	session_start();
	$_SESSION['userid'] = NULL;
	$_SESSION['userRole'] = NULL;
    $_SESSION['userName'] = NULL;
	header('Location: index.php');
?>