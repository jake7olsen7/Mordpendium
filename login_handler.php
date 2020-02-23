<?php
	session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$password_in_the_database = $dao->getUserPassword($_POST["username"]);
	$enterPass = hash('sha256', $_POST["password"]);
  if ($password_in_the_database != $enterPass) {
    $_SESSION['message'] = "Error, the password or username was incorrect.";
    header("Location: warbands.php");
	echo $enterPass . " " . $password_in_the_database;
    exit();
  } else {
    $_SESSION['logged_in'] = true;
	$_SESSION['message'] = "Logged in user.";
	$_SESSION['loginname'] = $_POST["username"];
    header("Location: warbands.php");
  }
?>
