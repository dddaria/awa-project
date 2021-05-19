<?php include('header.php');?>

			<h1>SIGN UP</h1>

				<form class="SignUpForm" action="" method="POST"> <!-- Form för login. POST skickar info, ej via url-->
					<input type="text" name="uname" placeholder="Username*"> <br>
					<input type="password" name="pass1" placeholder="Password*"> <br>
					<input type="password" name="pass2" placeholder="Repeat Password*"> <br>
					<input type="text" name="email" placeholder="Email*"> <br>
					<input type="text" name="phone" placeholder="Phone"> <br>
					<input type="text" name="nationality" placeholder="Nationality"> <br>
					<input type="submit" name="Login">
					<input type="text" name="uname" placeholder="Username*" required> <br>
					<input type="password" name="pass1" placeholder="Password*" required> <br>
					<input type="password" name="pass2" placeholder="Repeat Password*"required> <br>
					<input type="text" name="email" placeholder="Email*"required> <br>
					<input type="text" name="phone" placeholder="Phone*" required> <br>
					<input type="text" name="nationality" placeholder="Nationality*" required> <br>
					<input type="submit" name="Login" value="Sign Up">
				</form>
		</div>

<?php

	if(isset($_POST['uname']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['nationality']) ){
		
		$uname = $_POST['uname']; //om användaren fyllt i båda fälten så lägger vi in värdena i variabeln
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$nationality = $_POST['nationality'];

				$uname = htmlspecialchars($uname, ENT_QUOTES,'UTF-8');
				$pass1 = htmlspecialchars($pass1, ENT_QUOTES,'UTF-8');
				$pass2 = htmlspecialchars($pass2, ENT_QUOTES,'UTF-8');
				$email = htmlspecialchars($email, ENT_QUOTES,'UTF-8');
				$phone = htmlspecialchars($phone, ENT_QUOTES,'UTF-8');
				$nationality = htmlspecialchars($nationality, ENT_QUOTES,'UTF-8');


	$query = "SELECT * from User WHERE Username = '$uname'  AND Email = '$email'";


	$stmt = $dbConn->prepare($query);
		$stmt->bind_result($UserID,$Username,$Password,$Usertype,$Email,$Fullname); //lägger ihop de värden som hämtats
		
		$stmt->execute();

		while($stmt->fetch());
		$stmt->close();


	if($pass1 !== $pass2){
		echo"Passwords doesn't match. Please try again.";
	}else if($uname === $Username){
		echo"Sorry this username already exists. Please try another one.";
	}else if($email === $Email){
		echo"Sorry this email already exists. Please try another one.";
	}



echo $stmt; 


}

?>



				

		</div>





<?php include('footer.php');?>