<?php include('header.php');?>

<main>
    <h1>WELCOME ADMIN!</h1>
    <p>Add new destination:</p><br>
    <form id="desinationUpload" name="destinationUpload" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="destName" id="destName"> <br>
        Description: <textarea type="text" name="destDes" id="destDes"></textarea> <br>
        City: <select name="destCity" id="destCity">
                <option value="" selected="selected"></option>
            </select> <br>
        Select image to upload: <br>
        <input type="file" name="destImg" id="destImg"> <br>
        <input type="submit" value="Upload destination" name="submitDest">
    </form>
    <?php 
        if (isset($_POST['submitImage'])) {
            fileUpload($_FILES['myFile']);
        }
    ?>
</main>

<?php include('footer.php');?>