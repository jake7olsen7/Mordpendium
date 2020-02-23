<?php
$thisPage="";
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="warband.css">
	<link rel="icon" href="favi.png" type="image/gif" sizes="16x16">
</head>

	<div id="banner">
		<span id="headspan">
			<h1 id="header1">
				MORDPENDIUM
			</h1>
			<h2 id="header2">
				Mordheim Warband Builder
			</h2>
		</span>
		<?php
			if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
				echo"<span id=\"loginbox\" class=\"hide\">";
			} else {
				echo"<span id=\"loginbox\">";
			}
		?>
		
			<form method="post" action="login_handler.php">
				<div class="inputbox" ><input name="username" type="text" placeholder="Username"></div>
				<div class="inputbox" ><input name="password" type="password" placeholder="Password"></div>
				<div>
					<input id="loginbutton" type="submit" value="Login">
				</div>
			</form>
			<form action="create.php">
				<input id="createbutton" type="submit" value="Create">
			</form>
		</span>
		<?php
			if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
				echo"<span id=\"warbandbox\">";
			} else {
				echo"<span id=\"warbandbox\" class=\"hide\">";
			}
		?>
			<form action="profile.php">
				<input id="profilebutton" type="submit" value="Edit Profile">
			</form>
			<form action="createUnit.php">
				<input id="createUnitbutton" type="submit" value="Create Unit">
			</form>
			<form action="logout_handler.php">
				<input id="logoutbutton" type="submit" value="Logout">
			</form>
		</span>
	</div>
	
	
	<div id="navigation">
		<ul>
			<li<?php if ($thisPage=="index") 
				echo " id=\"currentpage\""; ?>><a href="index.php">Home</a></li>
			<li<?php if ($thisPage=="warbands") 
				echo " id=\"currentpage\""; ?>><a href="warbands.php">Warbands</a></li>
		</ul>
	</div>
	
    <div>
	</div>
	<body>
		<?php
		require_once 'Dao.php';
		$dao = new Dao();
		$unit = $dao->getUnit($_POST['deleteUnitID']);
		?>
		<form method="post" class="nobounds" action="delete_unit_handler.php">
			<div id ="main_stats" class ="create_flex_container">
				<div class ='title_type'>
					<label for="unitName">Unit / Hero name:</label> <input name="unitName" type="text"
					value="<?php echo $unit['0']['unitName'];?>">
				</div>
				<div class ='title_type'>
					<label for="unitType">Type:</label> <input name="unitType" type="text"
					value="<?php echo $unit['0']['unitType'];?>">
				</div>
				<table>
					<tr>
						<td id ='stat_header'>M</td>
						<td id ='stat_header'>WS</td>
						<td id ='stat_header'>BS</td>
						<td id ='stat_header'>S</td>
						<td id ='stat_header'>T</td>
						<td id ='stat_header'>W</td>
						<td id ='stat_header'>I</td>
						<td id ='stat_header'>A</td>
						<td id ='stat_header'>LD</td>
						<td id ='stat_header'>Sv</td>
					</tr>
					<tr>
						<td><input class = "inputStat" name="Movement" type="number"
					value="<?php echo $unit['0']['m'];?>"></td>
						<td><input class = "inputStat" name="WeaponSkill" type="number"
					value="<?php echo $unit['0']['ws'];?>"></td>
						<td><input class = "inputStat" name="BalisticSkill" type="number"
					value="<?php echo $unit['0']['bs'];?>"></td>
						<td><input class = "inputStat" name="Strength" type="number"
					value="<?php echo $unit['0']['s'];?>"></td>
						<td><input class = "inputStat" name="Toughness" type="number"
					value="<?php echo $unit['0']['t'];?>"></td>
						<td><input class = "inputStat" name="Wounds" type="number"
					value="<?php echo $unit['0']['w'];?>"></td>
						<td><input class = "inputStat" name="Initiative" type="number"
					value="<?php echo $unit['0']['i'];?>"></td>
						<td><input class = "inputStat" name="Attacks" type="number"
					value="<?php echo $unit['0']['a'];?>"></td>
						<td><input class = "inputStat" name="Leadership" type="number"
					value="<?php echo $unit['0']['ld'];?>"></td>
						<td><input class = "inputStat" name="ArmorSave" type="number"
					value="<?php echo $unit['0']['sv'];?>"></td>
					</tr>
					<tr>
						<td class ='stat_font'><input class = "inputStat" name="MaxMovement" type="number"
					value="<?php echo $unit['0']['Mm'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxWeaponSkill" type="number"
					value="<?php echo $unit['0']['Mws'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxBalisticSkill" type="number"
					value="<?php echo $unit['0']['Mbs'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxStrength" type="number"
					value="<?php echo $unit['0']['Ms'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxToughness" type="number"
					value="<?php echo $unit['0']['Mt'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxWounds" type="number"
					value="<?php echo $unit['0']['Mw'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxInitative" type="number"
					value="<?php echo $unit['0']['Mi'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxAttacks" type="number"
					value="<?php echo $unit['0']['Ma'];?>"></td>
						<td class ='stat_font'><input class = "inputStat" name="MaxLeadership" type="number"
					value="<?php echo $unit['0']['Mld'];?>"></td>
						<td class ='stat_font'></td>
					</tr>
				</table>
				<div>
					<span id ='skills'>
						<label for="unitname">Skill Lists:</label> <input name="skillList" type="text"
					value="<?php echo $unit['0']['skills'];?>">
					</span>
					<span id ='xpspan' class ='large_bold'>
						Starting EXP:
					</span>
					<span id = "xp">
					<Table>
						<tr><td><input class = "inputEXP" name="exp" type="number"
					value="<?php echo $unit['0']['experience'];?>"></td></tr>
					</Table>
					</span>
				</div>
			</div>
			<div class ="create_flex_container">
				<div class = 'large_bold'>
					skills/spells
				</div>
					<textarea name="skills"><?php echo $unit['0']['abilities'];?></textarea>
			</div>
			<div class ="create_flex_container">
				<div class = 'large_bold'>
					items/injuries
				</div>
					<textarea name="items"><?php echo $unit['0']['equipment'];?></textarea>
			<div>
				<input id='hiddenfield' name='unitID' type='text' value="<?php echo $unit['0']['0'];?>">
				<label id="deleteUnitSubmit" for="deleteUnit">THIS IS Permanent:</label><input name='deleteUnit' id="deleteUnitSubmit" type="submit" value="DELETE">
			</div>
			</div>
		</form>
	</body>
  	<footer>
		<p class="text-center">2019 Razed Tech ALL RIGHTS RESERVED auradeft@gmail.com</p>
    </footer>
</html>
