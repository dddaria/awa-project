<?php
include('header.php');

if($_SESSION["UserType"] !== "Admin")
{
    header("location:/awa-project/account.php");
};

?>

<main>
    <h1>Upload new destination:</h1>
    <form id="destinationUpload" name="destinationUpload" method="post" enctype="multipart/form-data">
        <label for="destName">Name:</label>
        <input type="text" name="destName" id="destName"> <br>
        
        <label for="destDes">Description:</label>
        <textarea type="text" name="destDes" id="destDes"></textarea> <br>
        
        <label for="destCity">City:</label>
        <select name="destCity" id="destCity">
            <?php
                $stmt = $dbConn->prepare("SELECT CityID, Name FROM City");
                $stmt->bind_result($CityID, $Name);
                $stmt->execute();

                while ($stmt->fetch()) {
                    echo "<option value=".$CityID.">".$Name."</option>";
                };
            ?>
        </select><br>
        
        <label for="destImg">Select image to upload:</label>
        <input type="file" name="destImg" id="destImg"> <br>
        
        <button type="submit" value="1" name="submitDest">Upload destination</Button>
    </form>
    <?php 
        if (isset($_POST['submitDest'])) {
            destUpload($_POST['destName'], $_POST['destDes'], $_POST['destCity'], $_FILES['destImg']);
        }
        
        /* test to see if connection to DB works
        $stmt = $dbConn->prepare("SELECT Name FROM Destination");
        $stmt->bind_result($Name);
        $stmt->execute();

        while ($stmt->fetch()) {
            echo "<p>".$Name."</p>";
        };
        */
    ?>
</main>

<?php include('footer.php');?>