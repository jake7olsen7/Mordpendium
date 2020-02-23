<?php
$thisPage ="warbands";
session_start();
include("Unit.php");
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="warband.css">
	<link rel="icon" href="favi.png" type="image/gif" sizes="16x16">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/charm.js"></script>
	<script src="js/dead.js"></script>
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
  <table id='unitRow'>
	<?php
		require_once 'Dao.php';
		$dao = new Dao();
		if (isset($_SESSION['loginname']) && $_SESSION['loginname']) {
			$login_name = $dao->getUserID($_SESSION['loginname']);
				$unitIDList = $dao->getUserUnits($login_name);
			if (!empty($unitIDList))
			{
			$numberUnits = sizeof($unitIDList);
			$units = array();
			for ($x = 0; $x < $numberUnits; $x++) {
				$units[$x] = $dao->getUnit($unitIDList[$x]);
			} 
			}else {
				echo "please create a warband using the create unit option";
			}
		} else {
			if (isset($_SESSION['message'])) {
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			}
			else {
				echo "Please login to create a warband!";
			}
			
		}
		if (isset($_SESSION['loginname']) && $_SESSION['loginname'] && !empty($unitIDList)) {
		foreach ($units as $unit) {
			echo "<tr><td>";
			echo "	  <div id ='main_stats' class ='flex-container'>
	     <div class ='title_type'>
		 Name: ";
		 echo $unit['0']['unitName'];
			echo "		 </div>
		 <div class ='title_type'>
		 Type: ";
		 echo $unit['0']['unitType'];
		 
		 echo "</div><table><tr>";
		 echo "<td id ='stat_header'>M</td>
			<td id ='stat_header'>WS</td>
			<td id ='stat_header'>BS</td>
			<td id ='stat_header'>S</td>
			<td id ='stat_header'>T</td>
			<td id ='stat_header'>W</td>
			<td id ='stat_header'>I</td>
			<td id ='stat_header'>A</td>
			<td id ='stat_header'>LD</td>
			<td id ='stat_header'>Sv</td>";
		echo "</tr><tr>";
			echo "<td>" . $unit['0']['m'] . "</td>";
			echo "<td>" . $unit['0']['ws'] . "</td>";
			echo "<td>" . $unit['0']['bs'] . "</td>";
			echo "<td>" . $unit['0']['s'] . "</td>";
			echo "<td>" . $unit['0']['t'] . "</td>";
			echo "<td>" . $unit['0']['w'] . "</td>";
			echo "<td>" . $unit['0']['i'] . "</td>";
			echo "<td>" . $unit['0']['a'] . "</td>";
			echo "<td>" . $unit['0']['ld'] . "</td>";
			echo "<td>" . $unit['0']['sv'] . "</td>";
			echo "</tr><tr>";
			echo "<td class ='stat_font'>" . $unit['0']['Mm'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Mws'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Mbs'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Ms'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Mt'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Mw'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Mi'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Ma'] . "</td>";
			echo "<td class ='stat_font'>" . $unit['0']['Mld'] . "</td>";
			echo "</tr>";
			echo "</table>
		<div>
		<span id ='skills'>
		Skills: ";
			echo $unit['0']['skills'];
			echo "		</span>
		<span id ='xpspan' class ='large_bold'>
		EXP:
		</span>
		<span id = 'xp'>
		<Table>
			<tr><td>";
			echo $unit['0']['experience'] . "</td></tr>";
			echo "		</Table>
		</span>
		</div>
	  </div>";
			echo "	  <div class ='flex-container'>
	  <div class = 'large_bold'>
	  skills/spells
	  </div>";
			echo $unit['0']['abilities'];
			echo "	  </div>
	  <div class ='flex-container'>
	  <div class = 'large_bold'>
	  items/injuries
	  </div>";
			echo $unit['0']['equipment'];
			
			echo "<div><form method='post' action='deleteUnit.php'>
				<input id='hiddenfield' name='deleteUnitID' type='text' value=" . $unit['0']['0'] . ">
				<input id='deletebutton' type='submit' value='Delete'>
			</form></div>";
			echo "<div><form method='post' action='updateUnit.php'>
				<input id='hiddenfield' name='updateUnitID' type='text' value=" . $unit['0']['0'] . ">
				<input id='updatebutton' type='submit' value='Update'>
			</form></div>";
			
			echo "<div>
				<input class='luckButton' type='button' value='Charm'>
			</div>";
			echo "<div>
				<input class='deadButton' type='button' value='Dead'>
			</div>";
			echo "</tr></td>";
			echo "</div>";
		}
		}
	?>
	</table>
	<div id="spaceDIV"></div>
  </body>
    <footer>
		<p class="text-center">2019 Razed Tech ALL RIGHTS RESERVED auradeft@gmail.com</p>
    </footer>
</html>
