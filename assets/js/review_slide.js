const container = document.querySelector('.reviews-container');
const reviews = document.querySelectorAll('.review');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let index = 0;
let itemsPerView = window.innerWidth >= 768 ? 4 : 1;

function updateSlider() {
    const slideWidth = reviews[0].offsetWidth + 20; // review width + gap
    container.style.transform = `translateX(-${index * slideWidth}px)`;
}

// Next button
nextBtn.addEventListener('click', () => {
    if (index < reviews.length - itemsPerView) {
        index++;
    } else {
        index = 0; // loop back
    }
        updateSlider();
});

// Prev button
prevBtn.addEventListener('click', () => {
    if (index > 0) {
        index--;
    } else {
        index = reviews.length - itemsPerView; // loop to end
    }
    updateSlider();
});

// Update items per view on resize
window.addEventListener('resize', () => {
    itemsPerView = window.innerWidth >= 768 ? 4 : 1;
    index = 0;
    updateSlider();
});