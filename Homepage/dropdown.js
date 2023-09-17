// ImageSlider Start
  // var slideIndex = 1;

  // var myTimer;

  // var slideshowContainer;

  // window.addEventListener("load", function () {
  //   showSlides(1);
  //   myTimer = setInterval(function () { plusSlides(1) }, 4000);

  // })

  // // NEXT AND PREVIOUS CONTROL
  // function plusSlides(n) {
  //   clearInterval(myTimer);

  //   if (n < 0) {
  //     showSlides(slideIndex -= 1);
  //   } else {
  //     showSlides(slideIndex += 1);
  //   }

  //   if (n === -1) {
  //     myTimer = setInterval(function () { plusSlides(n + 2) }, 4000);
  //   } else {
  //     myTimer = setInterval(function () { plusSlides(n + 1) }, 4000);
  //   }
  // }

  // //Controls the current slide and resets interval if needed
  // function currentSlide(n) {
  //   clearInterval(myTimer);
  //   showSlides(slideIndex = n);
  //   myTimer = setInterval(function () { plusSlides(n + 1) }, 4000);
  // }

  // function showSlides(n) {
  //   var i;
  //   var slides = document.getElementsByClassName("mySlides");
  //   var dots = document.getElementsByClassName("dot");
  //   if (n > slides.length) { slideIndex = 1 }
  //   if (n < 1) { slideIndex = slides.length }
  //   for (i = 0; i < slides.length; i++) {
  //     slides[i].style.display = "none";
  //   }
  //   for (i = 0; i < dots.length; i++) {
  //     dots[i].className = dots[i].className.replace(" active", "");
  //   }
  //   slides[slideIndex - 1].style.display = "block";
  //   dots[slideIndex - 1].className += " active";
  // }
// ImageSlider End


// Navbar Start 
  const menuBtn = document.querySelector(".menu-icon span");
  const searchBtn = document.querySelector(".search-icon");
  const cancelBtn = document.querySelector(".cancel-icon");
  const items = document.querySelector(".nav-items");
  const form = document.querySelector("form");
  const mainlogo = document.querySelector(".logo");


  // menuBtn.style.color = "#ff3d00";
  // searchBtn.style.color = "#ff3d00";
  // cancelBtn.style.color = "#ff3d00";

  menuBtn.onclick = () => {
    items.classList.add("active");
    menuBtn.classList.add("hide");
    searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");

  }
  cancelBtn.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
  }
  searchBtn.onclick = () => {
    form.classList.add("active");
    searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");
  }
// Navbart End