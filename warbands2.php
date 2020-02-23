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
			echo "<tr><td class='dumb-container' valign='top'>
				<table border='0' class='table-clear'><tr><td width=300 rowspan='2'>";
			echo "
	     
		 Name: ";
		 echo $unit['0']['unitName'];
			echo "	<br>	
		
		 Type: ";
		 echo $unit['0']['unitType']."<br>";
		 
		 echo "<table><tr>";
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
		
		

		</td>
		<td width=300 class ='flex-container'>";
			echo "	  
	  skills/spells
	  <br>";
			echo $unit['0']['abilities'];
			echo $unit['0']['skills'];
			echo "	  </div>
	  </td><td width=300 class ='flex-container'>
	  items/injuries
	  <br>";
			echo $unit['0']['equipment']."</td><td>";
			
			echo "<form method='post' action='deleteUnit.php'>
				<input id='hiddenfield' name='deleteUnitID' type='text' value=" . $unit['0']['0'] . ">
				<input id='deletebutton' type='submit' value='Delete'>
			</form><br><br>";
			echo "<form method='post' action='updateUnit.php'>
				<input id='hiddenfield' name='updateUnitID' type='text' value=" . $unit['0']['0'] . ">
				<input id='updatebutton' type='submit' value='Update'>
			</form><br><br>";
			
			echo "
				<input class='luckButton' type='button' value='Charm'>
			<br><br>";
			echo "
				<input class='deadButton' type='button' value='Dead'>
			";
			echo "</td></tr>";
			echo "<tr><td colspan='2'>
				<table border='0' >";
			//make the xp boxes
			$checks = array(2,4,6,8,11,14,17,20,24,28,32,36,41,46,51,57,63,69,76,83,90); // to bold the level up boxes
			$counter = 1;
			  for ($r = 1; $r <= 3; $r++){
				
				echo '<tr>';
				for ($e = 1; $e <= 30; $e++){ // 
					echo '<td width="5" ';
					  for ($n = 1; $n < count($checks); $n++){
						  if ($counter == $checks[$n]){ //if counter is equal to a # from the array then bold the box
							  echo 'bgcolor="#008833"';
						  }
						  else {
							  echo 'border="0"'; //else just a normal box
						  }
					  }
					  if ($counter <= $unit['0']['experience']){ // gray the box if exp is had
						echo 'bgcolor="#666666"';  
					  }
					echo ' height="5">&nbsp;</td>';
					$counter++; 
				}
				echo '</tr>';
				$counter + 30;
			  }
			echo "</table></td><td>Total Experience<br>".$unit['0']['experience']."</td></tr>
			</td></tr></table>";

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
