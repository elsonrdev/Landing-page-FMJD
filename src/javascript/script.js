let currentSlideIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");

    if (index >= slides.length) {
        currentSlideIndex = 0;
    } else if (index < 0) {
        currentSlideIndex = slides.length - 1;
    } else {
        currentSlideIndex = index;
    }

    slides.forEach((slide, i) => {
        slide.classList.remove("active");
        dots[i].classList.remove("active");
        if (i === currentSlideIndex) {
            slide.classList.add("active");
            dots[i].classList.add("active");
        }
    });

    document.querySelector(".slides").style.transform = `translateX(-${currentSlideIndex * 100}%)`;
}

function currentSlide(index) {
    showSlide(index - 1);
}

// Auto-slide (opcional)
setInterval(() => {
    showSlide(currentSlideIndex + 1);
}, 4000);  // Muda a cada 4 segundos
