<?php
	// Author: Abdulwahab Alansari

	// Clear all sessions and redirect to index.php
	session_start();
	$_SESSION['userid'] = NULL;
	$_SESSION['userRole'] = NULL;
    $_SESSION['userName'] = NULL;
	header('Location: index.php');
?>