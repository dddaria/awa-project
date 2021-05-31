<?php include('header.php');?>

<main>
<?php
	if(isset($_SESSION["loggedin"])){
		if($_SESSION["loggedin"] === "true"){
			header("location:/awa-project/account.php");
			}
	}
?>
		<div class=loginBox>
			
			<h1>SIGN IN</h1>

				<form class="LoginForm" action="" method="POST"> <!-- Form för login. POST skickar info, ej via url-->
					<input type="text" placeholder="Username" name="uname" required> <br>
					<input type="password" placeholder="Password" name="pass" required> <br>
					<a href="sign-up.php" class="SignUpHere"> Don't have an account yet? Sign up here!</a>
					<input type="submit" name="Login">
				</form>

		</div>


		<?php
				if(isset($_POST['uname']) && isset($_POST['pass'])){ //kollar så att både uname och pw är set i form
					$uname = $_POST['uname']; //om användaren fyllt i båda fälten så lägger vi in värdena i variabeln
					$pass = $_POST['pass'];

				$uname = htmlspecialchars($uname, ENT_QUOTES,'UTF-8'); //skyddar från att attackera hemsidan. hindrar script. 
				$pass = htmlspecialchars($pass, ENT_QUOTES,'UTF-8');

				
				$query = "SELECT * from User WHERE Username = ? AND Password = ?"; //hämtar värden från db ? så att man inte kan hämta hela listan
			

				$stmt = $dbConn->prepare($query);
				$stmt->bind_param('ss',$uname, $pass);//ss- två strings från input skyddar oss från SQL injection
				$stmt->bind_result($UserID,$Username,$Password,$Usertype,$Email,$Fullname); //lägger ihop de värden som hämtats
				$stmt->execute();

				while($stmt->fetch());
				$stmt->close();


				if($uname !== $Username && $pass !== $Password){ 
				 	echo "Sorry wrong credentials. Please try again.";
				
				}else if($uname === $Username && $pass === $Password && $Usertype === "Admin"){ //kollar så att input är lika med databasen. Admin?
					
					$_SESSION["loggedin"] = "true";
					$_SESSION["UserID"] = $UserID;
					$_SESSION["UserType"] = $Usertype;
					$_SESSION["UserIP"] = $_SERVER['REMOTE_ADDR'];


					header("location:/awa-project/account.php");
					

				}else if($uname === $Username && $pass === $Password && $Usertype === "Normal"){ 
				 	
					$_SESSION["loggedin"] = "true";
					$_SESSION["UserID"] = $UserID;
					$_SESSION["UserType"] = $UserType;
					$_SESSION["UserIP"] = $_SERVER['REMOTE_ADDR'];

					header("location:/awa-project/account.php");
					
				}

			}

		?>



</main>




<?php include('footer.php');?>