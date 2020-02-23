<?php
session_start();
$email = $_POST['email'];
$passwordOLD = $_POST['passwordOLD'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$valid = true;
$message;

require_once 'Dao.php';
$dao = new Dao();
$userEmailArray = $dao->getUserEmail($_SESSION['loginname']);
$password_in_the_database = $dao->getUserPassword($_SESSION['loginname']);
if ($userEmailArray['email'] != $email) {
	$dao->updateUserEmail($_SESSION['loginname'],$email);
}
if ($passwordOLD){
	if ($passwordOLD == $password_in_the_database){
		if ($password1 != $password2) {
			$message = "Passwords dont match";
			$valid = false;
		} else {
			$dao->updateUserPassword($_SESSION['loginname'],$password1);
		}
	} else {
		$valid = false;
		$message = "Old Password Invalid";
	}
}

if (!$valid) {
    $_SESSION['message'] = $message;
    header("Location: profile.php");
    exit();
}

header("Location: profile.php");
exit();
?>