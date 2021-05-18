<?php include('header.php');?>

<main class="randomize">
    <form method="get">
        <button name="randomize" id="randomize-btn" value="1">Show me a<br>random destination</button>
    <form>

    <?php
        if(isset($_GET['randomize'])) {
            $randomDestID = getRandomDestination();

            $sql = "SELECT Name, Picture FROM destination WHERE DestinationID =".$randomDestID;
            $stmt = $dbConn->prepare($sql);
            $stmt->bind_result($name, $pic);
            $stmt->execute();
            $stmt->fetch();

            echo "<div id='random-destination'>";
            echo "<h1>You should check out ".$name."</h1>";
            echo "<img src='".$pic."' alt='pic of destination'/><br>";
            echo "<a href='destination.php'>Read more...</a>";
            echo "</div>";
        };
    ?>
</main>

<?php include('footer.php');?>