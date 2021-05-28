<?php include('header.php');?>


	<div class="slideshow-container">
 
		  <div class="mySlides fade">
			    <img src="img/eiffel.jpg">
			    <div class="textSlider">EIFFEL TOWER</div>
		  </div>

		  <div class="mySlides fade">
			    <img src="img/bigben.jpg">
			    <div class="textSlider">BIG BEN</div>
		  </div>

		  <div class="mySlides fade">
			    <img src="img/forbiddencity.jpg">
			    <div class="textSlider">FORBIDDEN CITY</div>
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


	




<?php include('footer.php');?>