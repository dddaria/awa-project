<?php include('header.php');?>

<!DOCTYPE html>

<html>
	<body>

	<div class="slideshow-container">

 
		  <div class="mySlides fade">
			    <img src="img/eiffeltower.jpeg">
			    <div class="textSlider">EIFFEL TOWER</div>
		  </div>

		  <div class="mySlides fade">
			    <img src="img/machupicchu.jpeg">
			    <div class="textSlider">MACHU PICCHU</div>
		  </div>

		  <div class="mySlides fade">
			    <img src="img/angkorWat.jpeg">
			    <div class="textSlider">ANGKOR WAT</div>
		  </div>

		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>


		<script>
			var slideIndex = 1;
				showSlides(slideIndex);

			function plusSlides(n) {
			  	showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  	showSlides(slideIndex = n);
			}

			function showSlides(n) {
				  var i;
				  var slides = document.getElementsByClassName("mySlides");
				  var dots = document.getElementsByClassName("dot");
				  if (n > slides.length) {slideIndex = 1}    
				  if (n < 1) {slideIndex = slides.length}
				  for (i = 0; i < slides.length; i++) {
				      slides[i].style.display = "none";  
				  }
				  for (i = 0; i < dots.length; i++) {
				      dots[i].className = dots[i].className.replace(" active", "");
				  }
				  slides[slideIndex-1].style.display = "block";  
				  dots[slideIndex-1].className += " active";
			}
		</script>






	</body>
</html>


<?php include('footer.php');?>