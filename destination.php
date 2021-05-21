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
            <!-- <?php
                echo '        <h2 class="destination-header"> Welcome to $place !</h2>
                    <table class="destination-table"> 
                        <tr>
                            <th>Country:</th> <td>$country</td>
                        </tr>
                        <tr>
                            <th>Place:</th> <td>$place</td>
                        </tr>
                        <tr>
                            <th>Money</th> <td>$money</td>
                        </tr>
                    </table>
        </div>';
            ?> -->

            <h2 class="destination-header"> Welcome to France!</h2>
                    <table class="destination-table"> 
                            <tr>
                                <th>Country:</th> <td>France</td>
                            </tr>
                            <tr>
                                <th>Place:</th> <td>towah</td>
                            </tr>
                            <tr>
                                <th>Money</th> <td>none</td>
                            </tr>
                    </table>
        </div>
                <div class="destination-img-div">
                    <img class="destination-img" src="img/eiffel.jpeg">
                </div> 
    </div>

            <div class="destination-text-div"> 
                    <p> destinationText France, in Western Europe, encompasses medieval cities, alpine villages and Mediterranean beaches. Paris, its capital, is famed for its fashion houses, classical art museums including the Louvre and monuments like the Eiffel Tower. The country is also renowned for its wines and sophisticated cuisine. Lascaux’s ancient cave drawings, Lyon’s Roman theater and the vast Palace of Versailles attest to its rich history.</p>
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