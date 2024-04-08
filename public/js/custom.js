let slideIndex = 0;
  showSlides();

  function showSlides() {
    let slides = document.querySelectorAll(".slide");
    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }

  function prevSlide() {
    let slides = document.querySelectorAll(".slide");
    if (slideIndex === 1) {
      slideIndex = slides.length;
    } else {
      slideIndex--;
    }
    showSlides();
  }

  function nextSlide() {
    let slides = document.querySelectorAll(".slide");
    if (slideIndex === slides.length) {
      slideIndex = 1;
    } else {
      slideIndex++;
    }
    showSlides();
  }


   