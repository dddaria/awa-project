<?php include('header.php');?>

			<h1>SIGN UP</h1>

				<form class="SignUpForm" action="" method="POST"> <!-- Form för login. POST skickar info, ej via url-->
					<input type="text" name="uname" placeholder="Username*" required> <br>
					<input type="password" name="pass1" placeholder="Password*" required> <br>
					<input type="password" name="pass2" placeholder="Repeat Password*"required> <br>
					<input type="text" name="email" placeholder="Email*"required> <br>
					<input type="text" name="fullname" placeholder="Full Name*" required> <br>
					<input type="submit" name="Login" value="Sign Up">
				</form>
		</div>

<?php

	if(isset($_POST['uname']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['email']) && isset($_POST['fullname']) ){
		
		$uname = $_POST['uname']; //om användaren fyllt i båda fälten så lägger vi in värdena i variabeln
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];

				$uname = htmlspecialchars($uname, ENT_QUOTES,'UTF-8');
				$pass1 = htmlspecialchars($pass1, ENT_QUOTES,'UTF-8');
				$pass2 = htmlspecialchars($pass2, ENT_QUOTES,'UTF-8');
				$email = htmlspecialchars($email, ENT_QUOTES,'UTF-8');
				$fullname = htmlspecialchars($fullname, ENT_QUOTES,'UTF-8');

	if($pass1 !== $pass2){
		echo"Passwords doesn't match. Please try again.";
	}

	$query = "SELECT Username, Email from User";


	$stmt = $dbConn->prepare($query);
		$stmt->bind_result($Username,$Email); //lägger ihop de värden som hämtats
		
		$stmt->execute();

	while($stmt->fetch()){
	if($uname === $Username){
		echo"Sorry this username already exists. Please try another one.";
	}else if($email === $Email){
		echo"Sorry this email already exists. Please try another one.";
	}else{
		//add user to database if it does not exist before
		$sql="INSERT INTO User (Username, Password, Usertype, Email, Fullname) VALUES ('$uname', '$pass1', 'normal', '$email', 'fullname')";

	}

	}
		




$stmt->close();


}

?>



				

		</div>





<?php include('footer.php');?>