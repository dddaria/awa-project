<?php include('header.php');?>

<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body> 

		<div class=loginBox>
			
			<h1>SIGN IN</h1>

				<form class="LoginForm" action="" method="POST"> <!-- Form för login. POST skickar info, ej via url-->
					<input type="text" name="uname" placeholder="Username"> <br>
					<input type="password" name="pass" placeholder="Password"> <br>
					<a href="sign-up.php" class="SignUpHere"> Don't have an account yet? Sign up here!</a>
					<input type="submit" name="Login">
				</form>

				

		</div>

		<?php


			if(empty($_POST['uname']) && isset($_POST['pass'])){
				echo"Please enter username";
			}
			else if(empty($_POST['pass']) && isset($_POST['uname'])){
				echo"Please enter password";
			}
			else if(isset($_POST['uname']) && isset($_POST['pass'])){ //kollar så att både uname och pw är set i form
				$uname = $_POST['uname']; //om användaren fyllt i båda fälten så lägger vi in värdena i variabeln
				$pass = $_POST['pass'];
				//$query = "SELECT * from person WHERE Username = '$uname' AND Password = '$pass'"; //osäkert sätt

				$uname = htmlspecialchars($uname, ENT_QUOTES,'UTF-8'); //skyddar från att attackera hemsidan. hindrar script. 
				$pass = htmlspecialchars($pass, ENT_QUOTES,'UTF-8');

				
				$query = "SELECT * from person WHERE Username = ? AND Password = ?"; //hämtar värden från db ? så att man inte kan hämta hela listan

				//echo "the input was: $uname";

				

				$stmt = $dbConn->prepare($query);
				$stmt->bind_param('ss',$uname, $pass);//ss- två strings från input skyddar oss från SQL injection
				$stmt->bind_result($PersonSecNr,$FirstName,$LastName,$Usr,$Pw,$UserType); //lägger ihop de värden som hämtats
				$stmt->execute();


					echo '<br><table style="margin-left:auto; margin-right:auto;" bgcolor="dddddd" cellpadding="15">';
					echo '<tr><b><th>Username</th> <th>Password</th></b></tr>';
						while($stmt->fetch()){
							echo "<tr>";
							echo "<td> $Usr </td><td> $Pw </td>";
							echo "</tr>";
						}
					echo "</table>";

				$stmt->close();

				if($uname === $Usr && $pass===$Pw && $UserType==="Admin"){ //kollar så att input är lika med databasen. Admin?
					session_start();

					$_SESSION["loggedin"]=true;
					$_SESSION["UserName"]=$Usr;
					$_SESSION["UserType"]=$UserType;


					header("location:/awa-project/admin.php");
				 }else if($uname === $Usr && $pass===$Pw && $UserType==="Normal"){ 
				 	session_start();

					$_SESSION["loggedin"]=true;
					$_SESSION["UserName"]=$Usr;
					$_SESSION["UserType"]=$UserType;

					header("location:/awa-project/account.php");
				 }
				 else{
				 	echo"You entered the wrong login. Please try again!";
				 }

			

			}

		?>




	</body>

</html>

<?php include('footer.php');?>