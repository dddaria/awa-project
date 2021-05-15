<?php 
include ('connect.php');

$currentPage = basename($_SERVER['PHP_SELF']);

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
    if (isset($_POST['commentSubmit'])){
        $comName = $_POST['comName'];
        $comDate = $_POST['comDate'];
        $comEmail = $_POST['comEmail'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO Comment (Name, Date, Email, Comment) VALUES ('$comName','$comDate', '$comEmail', '$comment'";
        $result = $dbConn->query($sql);
    }

}

function getComments($dbConn){
$sql ="SELECT * FROM Comments";
$result = $dbConn->query($sql);
while ($row = $result->fetch_assoc()){
echo"<div class='single-comment'><p>";
    echo $row['name']. "<br>";
    echo $row['email']. "<br>";
    //inserts HTML line breaks before all newlines in a string
    echo nl2br($row['comment']);
    echo"</p></div>";
        }