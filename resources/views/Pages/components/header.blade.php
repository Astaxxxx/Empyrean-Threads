<header>
<link rel="stylesheet" href="{{asset('css/Pages/carousel.css')}}">
<script src="{{asset('js/carousel.js')}}"></script>

 <div class="slideshow-container fade">

 <div class="Containers">
  <img src="{{asset('storage/products/image.png')}}"  class=centerImage>
</div>

<div class="Containers">
  
  <img src="{{asset('storage/products/1669961591.jpg')}}"  class=centerImage>
</div>

<div class="Containers">
  
  <img src="{{asset('storage/products/Product3img1.jpg')}}" class=centerImage>
  
</div>

<div class="Containers">
  <img src="{{asset('storage/products/Product4img1.jpg')}}"  class=centerImage>
  
</div>


<a class="Back" onclick="plusSlides(-1)">&#10094;</a>
<a class="forward" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<script>
 var slidePosition = 1;
SlideShow(slidePosition);


function plusSlides(n) {
  SlideShow(slidePosition += n);
}


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