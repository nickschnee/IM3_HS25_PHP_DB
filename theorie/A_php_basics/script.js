const slides = [...document.querySelectorAll('.slide')];
const currentSlide = document.querySelector('#current-slide');
const totalSlides = document.querySelector('#total-slides');
const dayLabel = document.querySelector('#day-label');
const progressBar = document.querySelector('#progress-bar');
const previousButton = document.querySelector('#previous');
const nextButton = document.querySelector('#next');

let activeIndex = 0;

totalSlides.textContent = slides.length;

function showSlide(index) {
  activeIndex = Math.max(0, Math.min(index, slides.length - 1));
  slides[activeIndex].scrollIntoView({ behavior: 'smooth', block: 'start' });
  updateStatus(activeIndex);
}

function updateStatus(index) {
  activeIndex = index;
  currentSlide.textContent = index + 1;
  dayLabel.textContent = slides[index].dataset.day;
  progressBar.style.width = `${((index + 1) / slides.length) * 100}%`;
  previousButton.disabled = index === 0;
  nextButton.disabled = index === slides.length - 1;
}

previousButton.addEventListener('click', () => showSlide(activeIndex - 1));
nextButton.addEventListener('click', () => showSlide(activeIndex + 1));

document.addEventListener('keydown', (event) => {
  if (['ArrowRight', 'ArrowDown', 'PageDown', ' '].includes(event.key)) {
    event.preventDefault();
    showSlide(activeIndex + 1);
  }

  if (['ArrowLeft', 'ArrowUp', 'PageUp'].includes(event.key)) {
    event.preventDefault();
    showSlide(activeIndex - 1);
  }

  if (event.key === 'Home') {
    event.preventDefault();
    showSlide(0);
  }

  if (event.key === 'End') {
    event.preventDefault();
    showSlide(slides.length - 1);
  }

  if (event.key.toLowerCase() === 'f') {
    if (document.fullscreenElement) {
      document.exitFullscreen();
    } else {
      document.documentElement.requestFullscreen();
    }
  }
});

const observer = new IntersectionObserver((entries) => {
  const visibleSlide = entries
    .filter((entry) => entry.isIntersecting)
    .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];

  if (!visibleSlide) return;
  updateStatus(slides.indexOf(visibleSlide.target));
}, { threshold: [0.55, 0.75] });

slides.forEach((slide) => observer.observe(slide));
updateStatus(0);
