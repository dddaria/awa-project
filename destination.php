<?php 
include('header.php');  ?>

<?php 
    $DestID = $_GET['link'];
    $sql = "SELECT d.Name, d.Description, d.Picture, c.Name, co.Name, con.Name
            FROM Destination AS d
            JOIN City AS c ON d.CityID = c.CityID
            JOIN Country AS co ON co.CountryID = c.CountryID
            JOIN Continent AS con ON con.ContinentID = co.ContinentID
            WHERE DestinationID='$DestID'";
        $stmt = $dbConn->prepare($sql);
        $stmt->bind_result($destName, $destDes, $destPic, $cityName, $countryName, $contentName);
        $stmt->execute();
        $stmt->fetch();
?>
<div class="destination-page">
    <div class="destination-top-div">
        <div class="destination-info-div"> 
            <?php
                echo ' <h2 class="destination-header"> Welcome to '.$destName.' !</h2>
                    <table class="destination-table"> 
                        <tr>
                            <th>Country:</th> <td>'.$countryName.'</td>
                        </tr>
                        <tr>
                            <th>City:</th> <td>'.$cityName.'</td>
                        </tr>
                    </table> ';
            ?> 
         </div>

            <div class="destination-text-div"> 
                   <?php 
                   echo' <p> '.$destDes.'</p>';
           
                ?>
           </div>
           <div class="destination-image-div"> 
                   <?php 
                   echo' <div> '.$destPic.'</div>';
           
                ?>
           </div>
            
       
        <?php
            echo "<form class='comment-form' action='' method='POST'>
                
                <h3> Write a comment</h3>
                    <input style='display:hidden;' type='hidden' name='comDate' value='".date('Y-m-d H:i')."'>
                    <input type='text' name='comName' placeholder='Your Name'>
                    <input type='email' name='comEmail' placeholder='Email'>
            
                    <textarea class='commment_textarea'name='comment'placeholder='Type your comment here'>
                     </textarea>
                
                <button type='submit' value='Submit' name='comSubmit'>Submit</button>
            </form>";
        ?>

        <div class='posted-comments'>
            <h3> Latest comments</h3>
            <!-- <?php
           $query= "SELECT Comment, Name, Data FROM Comment WHERE destinationID="
            ?>
            -->
        </div>  
</div> <!-- destination page div -->
<?php include('footer.php');?>