<?php include('header.php');?>

<main class="randomize">
    <form method="get">
        <button name="randomize" id="randomize-btn" value="1">Show me a<br>random destination</button>
    <form>

    <?php
        if(isset($_GET['randomize'])) {
            echo "<p>".getRandomDestination()."</p>";
        }
    ?>
    
    <!-- Denna ska endast visas efter man klickat på knappen -->
    <div id="random-destination">
        <h1>You should check out *namn på destination*</h1>
        <img arc="" alt="bild på destination"/><br>
        <button>Read more...</button>
    </div>
</main>

<?php include('footer.php');?>