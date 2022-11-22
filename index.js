// the is the responsive javascript hamburger viewport code -Alex

const hamburger = document.querySelector(".hamburger");

hamburger.addEventListener("click", function () {
  this.classList.toggle("is-active");
})

// some product item code i found

var ProductImg = document.getElementByID("ProductImg");
var SmallImg = Document.getElementByIdClassName("small-img");

SmallImg[0].onclick = function() 
{
  ProductImg.src = SmallImg[0].src;
}
SmallImg[1].onclick = function() 
{
  ProductImg.src = SmallImg[1].src;
}
SmallImg[2].onclick = function() 
{
  ProductImg.src = SmallImg[2].src;
}
SmallImg[3].onclick = function() 
{
  ProductImg.src = SmallImg[3].src;
}
