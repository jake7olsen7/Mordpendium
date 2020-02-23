<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$valid = true;
$messages = array();
if (empty($username)) {
  $messages[] = "Please enter a username";
  $valid = false;
}
if ($password1 != $password2) {
  $messages[] = "Passwords dont match";
  $valid = false;
  unset($_SESSION['message']);
}
if (!$valid) {
    $_SESSION['messages'] = $messages;
    $_SESSION['form_input'] = $_POST;
    header("Location: create.php");
    exit();
}
require_once 'Dao.php';
$hashpass = hash('sha256', $password1);
$dao = new Dao();
$dao->createUser ($username, $email, $hashpass);
header("Location: warbands.php");
exit;
?>