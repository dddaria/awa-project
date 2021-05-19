<?php include('header.php');?>

<?php
    if($_SESSION["loggedin"] !== "true"){
    header("location:/awa-project/login.php"); //kollar om man är inloggad. annars flyttar till login
    }
?>

<form class="LogOutButt" action="" method="POST">
    <input type="submit" name="LogOut" value="Log Out">
</form>

<?php
    if(isset($_POST['LogOut'])){
    session_unset(); 
    $_SESSION["loggedin"] = "false";
    header("location:/awa-project/login.php");
    }      
?>


<div class="profile-page">
    <div class="profile-info-div"> 
        <!-- <?php
        echo '        <h2 class="profile-header"> Welcome $name !</h2>
        <table class="profile-table"> 
                <tr>
                    <th>Username:</th> <td>$username</td>
                </tr>
                <tr>
                    <th>Password:</th> <td>$pwd</td>
                </tr>
                <tr>
                    <th>Email:</th> <td>$mail</td>
                </tr>
                <tr>
                    <th>Phone:</th> <td>$phone</td>
                </tr>
                <tr>
                    <th>Nationality:</th> <td>Östgötsk</td>
                </tr>
        </table>
    </div>';
?> -->

        <h1 class="profile-header"> Welcome Cajsa!</h1>
                <table class="profile-table"> 
                        <tr>
                            <th>Username:</th> <td>lica18</td>
                        </tr>
                        <tr>
                            <th>Password:</th> <td>hemligt</td>
                        </tr>
                        <tr>
                            <th>Email:</th> <td>lång</td>
                        </tr>
                        <tr>
                            <th>Phone:</th> <td>siffror</td>
                        </tr>
                        <tr>
                            <th>Nationality:</th> <td>Östgötsk</td>
                        </tr>
                </table>
                <p class="change-profile-info"><a>Edit info</a></p>
    </div>

    <div class="profile-right-div">
        <div class="profile-img-div">
            <img class="profile-img" src="img/eiffel.jpeg">
        </div> 
        <p class="change-profile-img" ><a>Change profile picture</a></p>
    </div>
</div> 

<?php include('footer.php');?>