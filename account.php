<?php include('header.php');?>

<?php
    if($_SESSION["loggedin"] !== "true"){
    header("location:/awa-project/login.php"); //kollar om man är inloggad. annars flyttar till login
    }


?>

<form class="LogOutButt" action="" method="POST">
    <input type="submit" name="LogOut" value="Log Out">
    <?php
        if($_SESSION["UserType"] === "Admin"){
            echo "<a class='newDestButt' href='/awa-project/add-new-destination.php'>Add new destination</a>";}
    ?>
</form>


<?php
    if(isset($_POST['LogOut'])){
    session_unset(); 
    $_SESSION["loggedin"] = "false";
    header("location:/awa-project/login.php");
    }      
    
?>
   <?php
   
   $user = $_SESSION["UserID"];

    $sql = "SELECT Username, Password, Email, Fullname FROM User WHERE UserID ='$user'";
        $stmt = $dbConn->prepare($sql);
        $stmt->bind_result($username, $password, $email, $fullname);
        $stmt->execute();
        $stmt->fetch();

        $dbConn->close();

?>
<div class="profile-page">
    <div class="profile-info-div"> 
        <?php
        echo '        <h2 class="profile-header"> Welcome!</h2>
        <table class="profile-table"> 
                <tr>
                    <th>Fullname:</th> <td>'.$fullname.'</td>
                </tr>
                <tr>
                    <th>Username:</th> <td>'.$username.'</td>
                </tr>
                <tr>
                    <th>Password:</th> <td>'.$password.'</td>
                </tr>
                <tr>
                    <th>Email:</th> <td>'.$email.'</td>
                </tr>
               
        </table>
        <p class="change-profile-info"><a>Edit info</a></p>
    </div>';
?> 


    <div class="profile-right-div">
        <div class="profile-img-div">
            <img class="profile-img" src="img/person.png">
        </div> 
          </div>
</div> 
 



<?php include('footer.php');?>