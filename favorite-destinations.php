<?php include('header.php');?>

<main class="destGrid">
    <ul>
      <?php 

      if(isset($_SESSION['UserID'])){      
      $user = $_SESSION['UserID'];
    }
        $sql = "SELECT d.Picture, d.DestinationID
            FROM Destination AS d
            JOIN SavedDestination AS sd ON sd.DestinationID = d.DestinationID
            JOIN User AS u ON u.UserID = sd.UserID
            WHERE sd.DestinationID = d.DestinationID AND sd.UserID = '$user'";

        $stmt = $dbConn->prepare($sql);
        $stmt->bind_result($Picture, $DestID);
        $stmt->execute();
      
        
        while ($stmt->fetch()) {
          echo "<li>";
          echo "<div class='text-on-img'>";
          echo '<a href="/awa-project/destination.php?link=' . $DestID . '">';
         	echo '<img src="img/'.$Picture.'" class="img-fix" /></a>';
          echo "</div>";
      	  echo "</li>";
        };
      ?>
    </ul>
    
  </main>


<?php include('footer.php');?>