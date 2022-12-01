<header>
<link rel="stylesheet" href="{{asset('css/Pages/carousel.css')}}">
<script src="{{asset('js/carousel.js')}}"></script>
 <!-- Slideshow container -->
 <div class="slideshow-container fade">

<!-- Full images with numbers and message Info -->
<div class="Containers">
  
  <img src="{{asset('storage/products/58e38d1b204d556bbd97b165 (1).png')}}"  class=centerImage>
  <div class="Info">Grey Hoodie</div>
</div>

<div class="Containers">
  
  <img src="{{asset('storage/products/aPngtreeapremium_white_t-shirt_mockup_3635949.png')}}" class=centerImage>
  <div class="Info">white T-shirt</div>
</div>

<div class="Containers">
  <img src="{{asset('storage/products/pngegg-4.png')}}" class=centerImage>
  <div class="Info">Purple Jumper</div>
</div>

<!-- Back and forward buttons -->
<a class="Back" onclick="plusSlides(-1)">&#10094;</a>
<a class="forward" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The circles/dots -->
<div style="text-align:center">
<span class="dots" onclick="currentSlide(1)"></span>
<span class="dots" onclick="currentSlide(2)"></span>
<span class="dots" onclick="currentSlide(3)"></span>
</div> 
<script>
 var slidePosition = 1;
SlideShow(slidePosition);

// forward/Back controls
function plusSlides(n) {
  SlideShow(slidePosition += n);
}

//  images controls
function currentSlide(n) {
  SlideShow(slidePosition = n);
}

function SlideShow(n) {
  var i;
  var slides = document.getElementsByClassName("Containers");
  var circles = document.getElementsByClassName("dots");
  if (n > slides.length) {slidePosition = 1}
  if (n < 1) {slidePosition = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < circles.length; i++) {
      circles[i].className = circles[i].className.replace(" enable", "");
  }
  slides[slidePosition-1].style.display = "block";
  circles[slidePosition-1].className += " enable";
} 
</script>
</header>