<?php
session_start();
$unitID = $_POST['unitID'];

require_once 'Dao.php';
$dao = new Dao();

$dao->deleteUnit($unitID);
header("Location: warbands.php");
?>