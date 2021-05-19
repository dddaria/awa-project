<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!---MY CSS LINKS--->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!-- Fonts -->	
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

<!-- For responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Explore & More</title>
</head>
<body>
	
	<header>
			<div id="topnavDIV">
				<ol class="top-nav">
					<div class="header_right">
						<li>
							<div class="logodiv">
								<a href="index.php"><img src="img/logo.png" class="logoheader" class="
								<?php 
								// current or '' because it is the Index page
								echo($currentPage == 'index.php' || $currentPage == '') ? 'activelink' :''?>"> </a>
							</div>
						</li>
					</div>
				
					<div class="header_middle">
						<li>
							<h1><a href="popular-destinations.php" class="<?php
							echo ($currentPage == 'popular-destinations.php')?'activelink' :''
							?>">Popular </a> </h1>
						</li>
						<li>
							<h1><a href="all-destinations.php"  class="<?php echo($currentPage == 'all-destinations.php') ? 'activelink' :''?>">All Destinations</a></h1>
						</li>
						<li>
							<h1><a href="random-destination.php" class="<?php
							echo ($currentPage == 'random-destination.php' )?'activelink' :''
							?>">Randomize</a></h1>
						</li>

						<li>
							<h1><a href="about-us.php" class="<?php
							echo ($currentPage == 'about-us.php' )?'activelink' :''
							?>">About Us</a></h1>
						</li>
					</div>
				
					<div class="header_left">
						<li>
							<div class="search-container">
								<form action="">
									<input type="text" placeholder="Search.." name="search">
								</form>
						</div>
						</li>
						
						<li>
							<div class="fav-div">
								<a href="favorite-destinations.php"><img src="img/favorite-icon.png" class="fav-icon" class="
								<?php
								echo ($currentPage == 'favorite-destinations.php' )?'activelink' :''
								?>"> </a>
								</div>
							</li>
						<li>
							<h1><a href="login.php" class="<?php
							echo ($currentPage == 'login.php' )?'activelink' :''
							?>">Log in</a></h1>
						</li>
						
					</div>
				</ol>
			</div> <!-- end of header div -->
		</header>
<?php include ('config.php'); ?>
<?php include ('connect.php'); ?>
