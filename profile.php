<?php
$thisPage="";
session_start();
require_once 'Dao.php';
$dao = new Dao();
$userArray = $dao->getUserEmail($_SESSION['loginname']);
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
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
    <h1>Update Profile</h1>
    <form method="post" action="update_user_handler.php" enctype="multipart/form-data">
		<div><label for="email">Change Email:</label>
			<input value="<?php echo $userArray['email']?>" type="email" id="email" name="email"></div>
		<div><label for="passwordOLD">Old Password:</label> <input type="password" id="passwordOLD" name="passwordOLD"></div>
		<div><label for="password1">New Password:</label> <input type="password" id="password1" name="password1"></div>
		<div><label for="password2">New Retype Password:</label> <input type="password" id="password2" name="password2"></div>
      <?php
      if (isset($_SESSION['message'])) {
        echo "<div>" . $_SESSION['message'] . "</div>";
      }
      unset($_SESSION['message']);
      ?>
      <div><input type="submit" value="Update User"></div>
    </form>
  </body>
  	<footer>
		<p class="text-center">2019 Razed Tech ALL RIGHTS RESERVED auradeft@gmail.com</p>
    </footer>
</html>
