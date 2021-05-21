<?php include('header.php');?>

<!DOCTYPE html>

<html>
	

  <main class="destGrid">
    <ul>
      <?php 
        $sql = "SELECT DestinationID, Name, Picture FROM Destination";
        $stmt = $dbConn->prepare($sql);
        $stmt->bind_result($DestID, $Name, $Picture);
        $stmt->execute();
        
        while ($stmt->fetch()) {
          echo "<li>";
          echo "<div class='text-on-img'>";
          echo '<a href="/awa-project/destination.php?link=' . $DestID . '">';
         	echo '<img src="'.$Picture.'" class="img-fix" /></a>';
        	echo "</div>";
      	  echo "</li>";
        };
      ?>
    </ul>
  </main>
	

</html>

<?php include('footer.php');?>