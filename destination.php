<?php include('header.php');  ?>

<?php 
    $DestID = $_GET['link'];
    $sql = "SELECT d.Name, d.Description, d.Picture, c.Name, co.Name, con.Name, d.ViewedIndex
            FROM Destination AS d
            JOIN City AS c ON d.CityID = c.CityID
            JOIN Country AS co ON co.CountryID = c.CountryID
            JOIN Continent AS con ON con.ContinentID = co.ContinentID
            WHERE DestinationID='$DestID'";
        $stmt = $dbConn->prepare($sql);
        $stmt->bind_result($destName, $destDes, $destPic, $cityName, $countryName, $continentName, $vIndex);
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

        mysqli_query($dbConn, $sql1);

        //Getting info from travelbriefing API for the specific country
        $url = "https://travelbriefing.org/".$countryName."?format=json";
        $response = callAPI($url);
?>

<div class="destination-page">
    <div class="destination-top-div">
        <h2 class="destination-header"> Welcome to <?php echo $destName ?> !</h2>
            <div class="destination-info-div"> 
                    <table class="destination-table"> 
                        <tr>
                            <th>Continent:</th> <td><?php echo $continentName ?></td>
                        </tr>
                        <tr>
                            <th>Country:</th> <td><?php echo $countryName ?></td>
                        </tr>
                        <?php
                        //fetching all the neighbours from the API
                        $allNeighbours = "";
                        for ($i = 0; $i < count($response->neighbors); $i++) {
                            //If there are more left, add a comma to seperate them otherwise a dottelidott
                            if($i+1 == count($response->neighbors)) {
                                $allNeighbours = $allNeighbours . $response->neighbors[$i]->name . ".";
                            }
                           else {
                                $allNeighbours = $allNeighbours . $response->neighbors[$i]->name . ", ";
                            }                            
                        }
                        ?>
                        <tr>
                           <th>Neighbours:</th> <td><?php echo $allNeighbours; ?></td>
                        </tr>
                        <tr>
                            <th>City:</th> <td><?php echo $cityName; ?></td>
                        </tr>
                        <?php
                        //fetching all the languages from the API
                        $allLang = "";
                        for ($i = 0; $i < count($response->language); $i++) {
                            if($i+1 == count($response->language)) {
                                $allLang = $allLang . $response->language[$i]->language . ".";
                               }
                               else {
                                $allLang = $allLang . $response->language[$i]->language . ", ";    
                                }
                        }
                        ?>
                        <tr>
                            <th>Languages:</th> <td><?php echo $allLang; ?></td>
                        </tr>
                        <tr>
                            <th>Currency:</th> <td><?php echo $response->currency->name . " (".$response->currency->symbol.")";?></td>
                        </tr>
                        <?php
                        if (empty($response->vaccinations)) {
                            $allvacc = "No specific vaccines needed";
                        } 
                        else {
                            //fetching all the vaccines from the API
                            $allvacc = "";
                            for ($i = 0; $i < count($response->vaccinations); $i++) {
                               if($i+1 == count($response->vaccinations)) {
                                $allvacc = $allvacc . $response->vaccinations[$i]->name . ".";
                               }
                               else {
                                $allvacc = $allvacc . $response->vaccinations[$i]->name . ", ";
                               }
                            }
                        }
                        ?>
                        <tr>
                            <th>Necessary vaccines:</th> <td><?php echo $allvacc; ?></td>
                        </tr>
                        <tr>
                            <th>Calling code:</th> <td><?php echo $response->telephone->calling_code; ?></td>
                        </tr>
                        <tr>
                            <th>Emergency numbers:</th>
                                <td>
                                    <?php echo "Police: " . $response->telephone->police . ", " .
                                    "Ambulance: " . $response->telephone->ambulance . ", " .
                                    "Fire: " . $response->telephone->fire . "." ;?>
                                </td>
                            </tr>
                        <tr>
                            <th>Water:</th> <td><?php echo $response->water->short; ?></td>
                        </tr>
                    </table>
        </div>

        <div class="destination-img-div">
                <?php
                $sql = "SELECT Picture FROM Destination WHERE DestinationID='$DestID'";
                $stmt = $dbConn->prepare($sql);
                $stmt->bind_result($Picture);
                $stmt->execute();
                    
                    echo '<img src="img/'.$destPic.'" class="destination-img" /></a>';
                ?>
        </div>

            <div class="destination-text-div">
                <p> <?php echo $destDes ?></p>
            </div>
     </div>
                        
<hr class="destination-divider">
    
  <div class="comments-div">
        <?php
            // if($_SESSION["loggedin"] === "true"){    
            //     echo '<form class="comment-form" action="" method="POST">';
                            
            //     echo   '<h3> Write a comment</h3>';
            //     echo       '<input type="text" name="comName" placeholder="Your Name">';
                        
            //     echo     '<input type="email" name="comEmail" placeholder="Email">';
                
            //     echo     '<textarea class="commment_textarea"name="comment"placeholder="Type your comment here"> </textarea>';
                    
            //     echo      '<button type="submit" value="Submit" name="comSubmit">Submit</button>
            //         </form>';
        ?>
            <form class="comment-form" action="" method="POST">
                            
                <h3> Write a comment</h3>
                    <input type="text" name="comName" placeholder="Your Name">
                                        
                    <input type="email" name="comEmail" placeholder="Email">
                                
                    <textarea class="commment_textarea"name="comment"placeholder="Type your comment here"> </textarea>
                    <button type="submit" value="1" name="comSubmit">Submit</button>
                         </form>

                         <?php
                        
                         if (isset($_POST['comSubmit'])) {
                            setComment($_POST['comName'], $_POST['comEmail'], $_POST['comment']);
        }
        ?>

<hr class="destination-divider">        
        <div class='posted-comments'>
            <h3> Latest comments</h3>
            <table class='posted-comments-table'>
            <?php
            //Opening connection again to fetch comments
            $dbConn = mysqli_connect($host, $user, $password, $database);

            $sql = "SELECT Name, Comment FROM Comment WHERE DestinationID='$DestID'";
            $stmt = $dbConn->prepare($sql);
            $stmt->bind_result($comName, $comment);
            $stmt->execute();
            while ($stmt->fetch()) {
                
                echo "<tr>
                        <th>".$comName."</th> <td>".$comment."</td>
                    </tr>";
            
            }

           
            $dbConn->close();
            ?>
            </table>
           
        </div>   
    </div>
</div> 
<?php include('footer.php');?>