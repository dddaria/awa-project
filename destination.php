<?php 
include('header.php');  ?>

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
            
       

        <form class="comment-form"action="" method="post">
        <div>
            <h3> Make a comment</h3>
        <textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em;">
        Hey... say something!
        </textarea>
        </div>
        <input type="submit" value="Submit">
        </form>

        <div class="comment-box">
        </div
</div> 
<?php 
include('footer.php');?>