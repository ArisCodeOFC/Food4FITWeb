var sliderCount = 1;
var count = 0;
showSlides(sliderCount);
carousel();
function plusSlides(n) {
  showSlides(sliderCount += n);
}
function currentSlide(n) {
  showSlides(sliderCount = n);
}
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slider");
    if (n > slides.length) {
        sliderCount = 1;
    }
    if (n < 1) {
        sliderCount = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[sliderCount-1].style.display = "block";
}
function carousel() {
    var i;
    var x = document.getElementsByClassName("slider");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    count++;
    if (count > x.length) {
        count = 1
    }
    x[count-1].style.display = "block";
    setTimeout(carousel, 3000);
}
