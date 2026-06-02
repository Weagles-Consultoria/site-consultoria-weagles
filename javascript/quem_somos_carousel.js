document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.quem-somos-carousel');
    if (!carousel) return;

    const images = carousel.querySelectorAll('.carousel-image');
    const textSlides = carousel.querySelectorAll('.carousel-text-slide');
    const dots = carousel.querySelectorAll('.carousel-dot');
    const prevButton = carousel.querySelector('.carousel-prev');
    const nextButton = carousel.querySelector('.carousel-next');
    let currentSlide = 0;

    function showSlide(index) {
        currentSlide = (index + images.length) % images.length;

        images.forEach(function (image, slideIndex) {
            const isActive = slideIndex === currentSlide;
            image.classList.toggle('active', isActive);
            image.setAttribute('aria-hidden', String(!isActive));
        });

        textSlides.forEach(function (textSlide, slideIndex) {
            const isActive = slideIndex === currentSlide;
            textSlide.classList.toggle('active', isActive);
            textSlide.setAttribute('aria-hidden', String(!isActive));
        });

        dots.forEach(function (dot, slideIndex) {
            const isActive = slideIndex === currentSlide;
            dot.classList.toggle('active', isActive);
            dot.setAttribute('aria-selected', String(isActive));
        });
    }

    prevButton.addEventListener('click', function () {
        showSlide(currentSlide - 1);
    });

    nextButton.addEventListener('click', function () {
        showSlide(currentSlide + 1);
    });

    dots.forEach(function (dot, slideIndex) {
        dot.addEventListener('click', function () {
            showSlide(slideIndex);
        });
    });

    carousel.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowLeft') showSlide(currentSlide - 1);
        if (event.key === 'ArrowRight') showSlide(currentSlide + 1);
    });

    showSlide(currentSlide);
});
