<?php include('header.php');?>

<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body> 

		<div class=loginBox>
			
			<h1>SIGN UP</h1>

				<form class="SignUpForm" action="" method="POST"> <!-- Form för login. POST skickar info, ej via url-->
					<input type="text" name="uname" placeholder="Username*"> <br>
					<input type="password" name="pass1" placeholder="Password*"> <br>
					<input type="password" name="pass2" placeholder="Repeat Password*"> <br>
					<input type="text" name="email" placeholder="Email*"> <br>
					<input type="text" name="phone" placeholder="Phone"> <br>
					<input type="text" name="nationality" placeholder="Nationality"> <br>
					<input type="submit" name="Login">
				</form>

				

		</div>


	</body>

</html>

<?php include('footer.php');?>