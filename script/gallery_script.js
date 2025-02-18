const tabs = document.querySelectorAll('.tab-btn');
const contents = document.querySelectorAll('.tab-content');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('bg-blue-600', 'text-white'));
        tab.classList.add('bg-blue-600', 'text-white');

        contents.forEach(content => content.classList.add('hidden'));
        contents[index].classList.remove('hidden');
    });
});
// JavaScript for carousel functionality
const carousel = document.getElementById('carousel');
const slides = carousel.children;
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');

let currentIndex = 0;

function updateCarousel() {
const offset = currentIndex * -100; // Slide width percentage
carousel.style.transform = `translateX(${offset}%)`;
}

prevButton.addEventListener('click', () => {
currentIndex = (currentIndex - 1 + slides.length) % slides.length;
updateCarousel();
});

nextButton.addEventListener('click', () => {
currentIndex = (currentIndex + 1) % slides.length;
updateCarousel();
});