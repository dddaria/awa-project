<?php 
include ('connect.php');

$currentPage = basename($_SERVER['PHP_SELF']);

function signUp($uname,$pass1,$email,$fullname){
    $dbConn = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['database']);
    $sql="INSERT INTO User (Username, Password, Usertype, Email, Fullname) VALUES ('$uname', '$pass1', 'Normal', '$email', '$fullname')";
     if(mysqli_query($dbConn, $sql)) {
        echo "<br><p>You successfully signed up. Welcome!</p>";
    }
    else {
        echo "<br><p class='warning'>Failed to sign up, please try again.</p>";
    }

};

function fileUpload($file) {
    $filename = $_FILES['destImg']['name'];
    $destination = 'img/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    //The file on a temp directory on the server
    $file = $_FILES['destImg']['tmp_name'];
    $size = $_FILES['destImg']['size'];

    if (!in_array($extension, ['jpeg', 'png','jpg', 'PNG', 'JPG', 'JPEG'])) {
        echo "<br><p class='warning'>Allowed image types are: .jpeg, .png, .jpg</p>";
    }
    else if ($size > 10000000) {
        echo "<br><p class='warning'>Your image is too large.</p>";
    }
    else {
        //Moving the file to the server
        move_uploaded_file($file, $destination);
    }
};

function destUpload($destName, $destDes, $destCity, $destImg) {
    fileUpload($destImg);
    $destImg = $_FILES['destImg']['name'];

    $dbConn = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['database']);

    $sql="INSERT INTO Destination (CityID, Name, Description, Picture) VALUES ('$destCity', '$destName', '$destDes', '$destImg')";
    if(mysqli_query($dbConn, $sql)) {
        echo "<br><p>Destination uploaded</p>";
    }
    else {
        echo "<br><p class='warning'>Failed to upload destination. Try again.</p>";
    }
};

function setComments($dbConn){
    //if the submit button for comment is clicked this info is inserted into the database
    if (isset($_POST['comSubmit'])){
        // if(empty($comName) || empty($comEmail) || empty($comment)) {
        //     echo "<p class='warning'> Be sure that you have filled in every field!s</p>";
        // }
        // else  {
            $comName = $_POST['comName'];
            $comEmail = $_POST['comEmail'];
            $comment = $_POST['comment'];
    
            $sql = "INSERT INTO Comment (Name, Email, Comment) VALUES ('$comName', '$comEmail', '$comment'";
            $result = $dbConn->query($sql);
    
            echo "<p> Thank you for commenting!</p>";
        // }
        
     }  
};

// function getComments($dbConn){
// $sql ="SELECT * FROM Comments";
// $result = $dbConn->query($sql);
// while ($row = $result->fetch_assoc()){
//     echo"<div class='posted-comments'><p>";  
//         echo $row['name']. "<br>";
//         //inserts HTML line breaks before all newlines in a string
//         echo nl2br($row['comment']);
//     echo"</p></div>";
//     }
// }


function getRandomDestination() {
    $dbConn = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['database']);
    $sql = "SELECT destinationID FROM Destination";
    $allDest = array();
    
    $stmt = $dbConn->prepare($sql);
    $stmt->bind_result($dest);
    $stmt->execute();

    while ($stmt->fetch()) {
        array_push($allDest, $dest);
    }

    $randomDest = rand(0, count($allDest)-1);
    return $allDest[$randomDest];
}



function callAPI($url) {
    //starting the call
    $cURLconn = curl_init();

    //Setting headers
    curl_setopt($cURLconn, CURLOPT_URL, $url);
    curl_setopt($cURLconn, CURLOPT_RETURNTRANSFER, true);

    //recieving response
    $JSONresponse = curl_exec($cURLconn);
    curl_close($cURLconn);
    
    //decoding the response
    $response = json_decode($JSONresponse);

    return $response;
};