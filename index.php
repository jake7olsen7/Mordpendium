<?php
$thisPage="index";
session_start();
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
  
  <body>
    <div class="main-container">
    <div class="leftcolumn">
		<div class="card">
        <h2>ReIgnited Hope</h2>
        <h5>Feb 22, 2020</h5>
        <p>Gondor calls for aid, and my website will answer the call!  Rebooting the website
		   New features to come.</p>
      </div>
		<div class="card">
        <h2>Hash Purge</h2>
        <h5>Apr 21, 2019</h5>
        <p>Everything was reset in order to make it more secure, if you made an account, do it again.</p>
		<h3> Username:test </h3>
		<h4> Password:guest </h4>
      </div>
		<div class="card">
        <h2>HW6 Grading help</h2>
        <h5>Title description, Apr 13, 2019</h5>
        <p>Since you would have to know whats going on in this game to effectively create a warrior, I have created a test account with a premade warband. Username:test Password:guest</p>
		<h3> Username:test </h3>
		<h4> Password:guest </h4>
      </div>
	  	<div class="card">
        <h2>HW6 Grading help</h2>
        <h5>Title description, Apr 13, 2019</h5>
        <p>Trimmed down my sites futured planned content areas.  Main features are this Home Section that still needs work, but is a place for admins to post news on upcoming games, and Leading Warbands. Then the warbands area is the main reason for this site, including the spot to build and develop a Mordheim Warband.</p>
      </div>
      <div class="card">
        <h2>Border Town Burning</h2>
        <h5>Title description, Dec 12, 2018</h5>
        <p>Last Recorded Game.</p>
      </div>
      <div class="card">
        <h2>Wagons Catching Fire?</h2>
        <h5>Title description, Nov 25, 2018</h5>
        <p>Probably Not, its not in the Rules Kurt...</p>
      </div>
	  <div class="card">
        <h2>Monks Devistate Everything</h2>
        <h5>Title description, Nov 18, 2018</h5>
        <p>Improvised weapons better than actual weapons?</p>
      </div>
	  <div class="card">
        <h2>Out of Control Rolls</h2>
        <h5>Title description, Sep 2, 2018</h5>
        <p>Find out how the Possessed can still suck.</p>
      </div>
	  <div class="card">
        <h2>Needed another</h2>
        <h5>Title description, Sep 1, 2007</h5>
        <p>Just to test my footer..</p>
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card">
        <h2>Leading Warbands</h2>
		<div>
        <ol>
		  	<li><span class="bold_bigger">301</span> - Dis Wagon</li>
			<li><span class="bold_bigger">254</span> - Mikes Monkey Monks</li>
			<li><span class="bold_bigger">205</span> - The Purge</li>
		</ol>
		</div>
      </div>
	  	        <div class="card">
	          <h2>Links</h2>
		<div>
        <ul id='linksList'>
		  	<li><a href="https://www.dragonclawforge.com/">Claw Forge</a></li>
			<li><a href="http://broheim.net/">Broheim</a></li>
			<li><a href="https://drive.google.com/open?id=0B9y94d4M-MYUWVQzb21xdG16M3c">Mordheim Drive</a></li>
		</ul>
		</div>
      </div>

    </div>

	<footer>
		<p class="text-center">2019 Razed Tech ALL RIGHTS RESERVED auradeft@gmail.com</p>
    </footer>
	</div>
  </body>
</html>
