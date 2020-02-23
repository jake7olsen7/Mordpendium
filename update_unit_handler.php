<?php
session_start();
$unitID = $_POST['unitID'];
$unitName = $_POST['unitName'];
$unitType = $_POST['unitType'];

$unitM = $_POST['Movement'];
$unitWS = $_POST['WeaponSkill'];
$unitBS = $_POST['BalisticSkill'];
$unitS = $_POST['Strength'];
$unitT = $_POST['Toughness'];
$unitW = $_POST['Wounds'];
$unitI = $_POST['Initiative'];
$unitA = $_POST['Attacks'];
$unitL = $_POST['Leadership'];
$unitAS = $_POST['ArmorSave'];

$MunitM = $_POST['MaxMovement'];
$MunitWS = $_POST['MaxWeaponSkill'];
$MunitBS = $_POST['MaxBalisticSkill'];
$MunitS = $_POST['MaxStrength'];
$MunitT = $_POST['MaxToughness'];
$MunitW = $_POST['MaxWounds'];
$MunitI = $_POST['MaxInitative'];
$MunitA = $_POST['MaxAttacks'];
$MunitL = $_POST['MaxLeadership'];

$unitSL = $_POST['skillList'];
$unitEXP = $_POST['exp'];
$unitSkills = $_POST['skills'];
$unitItems = $_POST['items'];

require_once 'Dao.php';
$dao = new Dao();

$dao->updateUnit($unitID, $unitName, $unitType, $unitM, $unitWS, $unitBS, $unitS, $unitT, $unitW, $unitI, $unitA, $unitL, $unitAS, $MunitM, $MunitWS, $MunitBS, $MunitS, $MunitT, $MunitW, $MunitI, $MunitA, $MunitL, $unitSL, $unitEXP, $unitSkills, $unitItems);
header("Location: warbands.php");
?>