<?php include('header.php');?>

<main>
    <h1>WELCOME ADMIN!</h1>
    <p>Add new destination:</p><br>
    <form id="desinationUpload" name="destinationUpload" method="post" enctype="multipart/form-data">
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
        
        <label for="destImg">Select image to upload:</label> <br>
        <input type="file" name="destImg" id="destImg"> <br>
        
        <input type="submit" value="Upload destination" name="submitDest">
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