<?php
	session_start();

    $_SESSION['logged_in'] = false;
	unset($_SESSION['loginname']);
	unset($_SESSION['message']);
    header("Location: index.php");
	exit();
?>
