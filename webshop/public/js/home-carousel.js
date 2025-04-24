document.addEventListener("DOMContentLoaded", function () {
    const carousels = document.querySelectorAll('.carousel-section');

    carousels.forEach((carouselSection) => {
        const wrapper = carouselSection.querySelector('.carousel-content');
        const cards = wrapper.querySelectorAll('.product-card');
        const leftArrow = carouselSection.querySelector('.arrow.left');
        const rightArrow = carouselSection.querySelector('.arrow.right');

        const visibleCount = 3;
        const cardWidth = 150 + 20; // width + margin
        const totalItems = cards.length;
        let currentIndex = 0;

        function updateCarousel() {
            const maxIndex = Math.max(0, totalItems - visibleCount);
            currentIndex = Math.max(0, Math.min(currentIndex, maxIndex));
            const offset = -currentIndex * cardWidth;
            wrapper.style.transform = `translateX(${offset}px)`;
        }

        leftArrow.addEventListener('click', () => {
            currentIndex--;
            updateCarousel();
        });

        rightArrow.addEventListener('click', () => {
            currentIndex++;
            updateCarousel();
        });

        updateCarousel();
    });
});
