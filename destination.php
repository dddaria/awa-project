<?php 
include('header.php');  ?>

<?php 
    $DestID = $_GET['link'];
    $sql = "SELECT d.Name, d.Description, d.Picture, c.Name, co.Name, con.Name, d.ViewedIndex
            FROM Destination AS d
            JOIN City AS c ON d.CityID = c.CityID
            JOIN Country AS co ON co.CountryID = c.CountryID
            JOIN Continent AS con ON con.ContinentID = co.ContinentID
            WHERE DestinationID='$DestID'";
        $stmt = $dbConn->prepare($sql);
        $stmt->bind_result($destName, $destDes, $destPic, $cityName, $countryName, $contentName, $vIndex);
        $stmt->execute();
        $stmt->fetch();
        
        $dbConn->close();

        //Opening the connection again
        $dbConn = mysqli_connect($host, $user, $password, $database);
        //adding one click to viewed index
        $vIndex++;
        $sql1 = "UPDATE Destination
                SET ViewedIndex='$vIndex'
                WHERE DestinationID='$DestID'";
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
                <?php      
                   echo' <div class="destination-text-div">
                   <p> '.$destDes.'</p>
                   </div>';
           
                ?>
           </div>
            
                   <?php 
                   echo' <div class="destination-image-div">'.$destPic.'</div>';
           
                ?>
           
    
  <div class="comments-div" 
       
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
            <?php
        // $DestID = $_GET['link'];
        // $sql = "SELECT Comment, name FROM Comment WHERE DestinationID='$DestID'";
        //     $stmt = $dbConn->prepare($sql);
        //     $stmt->bind_result($comment, $name);
        //     $stmt->execute();
        //     $stmt->fetch();

        //     echo $comment;
        //     ?>
           
        </div>   
    </div>
</div> <!-- destination page div -->
<?php include('footer.php');?>